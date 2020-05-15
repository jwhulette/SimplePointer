<template>
  <div>
    <div class="grid grid-cols-2 gap-2">
      <div class="py-2 pr-3">
        <button
          @click="clearVotes"
          type="button"
          class="float-right px-1 py-1 font-semibold text-green-700 bg-transparent border border-green-500 rounded w-22 hover:bg-green-500 hover:text-white hover:border-transparent"
        >Clear Votes</button>
      </div>
      <div class="py-2 pl-3">
        <button
          @click="showVotes"
          type="button"
          class="px-1 py-1 font-semibold text-green-700 bg-transparent border border-green-500 rounded w-22 hover:bg-green-500 hover:text-white hover:border-transparent"
        >Show Votes</button>
      </div>
    </div>
    <div class="grid grid-cols-1">
      <table class="w-full p-6 border table-fixed border-grey-300">
        <thead>
          <tr class="h-12">
            <th
              class="w-1/2 px-4 py-2 font-bold uppercase bg-gray-300 border-b border-grey-300"
            >Player</th>
            <th
              class="w-1/4 px-4 py-2 font-bold text-center uppercase bg-gray-300 border-b border-grey-300"
            >Vote</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="player in this.players" :key="player.userid">
            <td class="px-4 py-2 border-b border-grey-light">{{ player.name }}</td>
            <td class="px-4 py-2 text-center border-b border-grey-light">
              <span v-if="player.voted === false">---</span>
              <span
                class="inline-block mt-1 text-center border-b border-grey-light"
                v-if="player.voted === true && showVote === false"
              >
                <svg
                  class="inline"
                  fill="currentColor"
                  viewBox="0 0 20 20"
                  width="20"
                  color="green"
                >
                  <path
                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                    clip-rule="evenodd"
                    fill-rule="evenodd"
                  />
                </svg>
              </span>
              <span v-if="showVote">{{ player.vote }}</span>
            </td>
          </tr>
        </tbody>
        <tfoot>
          <tr class="text-right">
            <td class="py-2 pr-12" colspan="2">
              <b>Vote Average:</b>
              <span v-if="showVote">{{ averageVotes }}</span>
              <span v-else>-----</span>
            </td>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>
</template>

<script>
export default {
  name: "Players",
  props: {
    users: {
      type: Array
    },
    api: {
      type: Object
    },
    roomid: {
      type: String
    },
    channel: {
      type: Object
    }
  },
  data() {
    return {
      players: [],
      vote: {},
      showVote: false,
      clearVote: false
    };
  },
  watch: {
    users: function(users) {
      // Only keep players
      this.players = users.filter(user => {
        if (Number(user.type) === 1) {
          return user;
        }
      });
    },
    vote: function(data) {
      // Register a players vote
      let voters = this.players.map(user => {
        // Only allow voting once
        if (user.userid === data.userid && user.voted === false) {
          user.vote = data.vote;
          user.voted = true;
        }
        return user;
      });

      this.players = voters;

      // Check if all users have voted
      let allUsersVoted = this.players.filter(player => {
        return player.voted === false;
      });

      if (allUsersVoted.length === 0) {
        this.showVotes();
        this.showVote = true;
      }
    },
    clearVote: function() {
      let voters = this.players.map(user => {
        user.vote = null;
        user.voted = false;
        return user;
      });

      // reset values
      this.resetBoard(voters);
    }
  },
  mounted() {
    this.channel
      .listen("UserVoted", e => {
        this.vote = e.vote;
      })
      .listen("ShowVotesEvent", e => {
        this.showVote = !this.showVote;
      })
      .listen("ClearVotesEvent", e => {
        this.clearVote = !this.clearVote;
      });
  },
  computed: {
    averageVotes: function() {
      // Get the player votes
      let votetotal = this.players.map(player => {
        let vote = player.vote;
        // Check to see if vote is question mark
        if (isNaN(player.vote) === true) {
          vote = 0;
        }
        return vote.toLocaleString(
          undefined, // leave undefined to use the browser's locale,
          // or use a string like 'en-US' to override it.
          { minimumFractionDigits: 1 }
        );
      });
      // Add up the number of votes
      let total = votetotal.reduce(function(total, vote) {
        return Number(total) + Number(vote);
      });

      return total / this.players.length;
    }
  },
  methods: {
    showVotes: function() {
      this.api.show(this.roomid);
    },
    clearVotes: function() {
      this.api.clear(this.roomid);
    },
    resetBoard: function(voters) {
      this.players = voters;
      this.showVote = false;
    }
  }
};
</script>