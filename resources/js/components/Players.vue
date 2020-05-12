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
          <tr class="leading-tight">
            <th
              scope="col"
              class="w-1/2 px-4 py-2 font-bold uppercase bg-gray-300 border-b border-grey-300"
            >Player</th>
            <th
              scope="col"
              class="w-1/4 px-4 py-2 font-bold text-center uppercase bg-gray-300 border-b border-grey-300"
            >Vote</th>
          </tr>
        </thead>
        <tbody>
          <tr class="leading-tight" v-for="player in this.players" :key="player.userid">
            <td class="px-4 py-2 border-b border-grey-light">{{ player.name }}</td>
            <td class="px-4 py-2 text-center border-b border-grey-light">
              <span v-if="player.voted === false">---</span>
              <span
                class="inline-block mt-1 text-center border-b border-grey-light"
                v-if="player.voted === true && shouldShowVote === false"
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
              <span v-if="shouldShowVote">{{ player.vote }}</span>
            </td>
          </tr>
          <tr v-if="this.shouldShowVote" class="text-right">
            <td class="pr-12" colspan="2">
              <b>Average:</b>
              {{ averageVotes }}
            </td>
          </tr>
        </tbody>
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
    vote: {
      type: Object
    },
    api: {
      type: Object
    },
    roomid: {
      type: String
    },
    showVote: {
      type: Boolean,
      default: false
    },
    clearVote: {
      type: Boolean,
      default: false
    }
  },
  data() {
    return {
      players: [],
      votetotal: 0,
      uservotecount: 0,
      shouldShowVote: this.showVote
    };
  },
  watch: {
    users: function(users) {
      // Only keep players
      this.players = users.filter(user => {
        if (user.type === "1") {
          return user;
        }
      });
    },
    vote: function(data) {
      // Register a players vote
      let voters = this.players.map(user => {
        if (user.userid === data.userid) {
          user.vote = data.vote;
          user.voted = true;
          return user;
        }
        return user;
      });

      this.players = voters;

      let vote = data.vote;
      if (isNaN(data.vote) === true) {
        vote = 0;
      }
      this.votetotal = this.votetotal + vote;

      // Check if all users have voted
      this.uservotecount++;
      if (this.uservotecount === this.players.length) {
        this.showVotes();
        this.shouldShowVote = true;
      }
    },
    clearVote: function() {
      let voters = this.players.map(user => {
        user.vote = null;
        user.voted = false;
        return user;
      });

      // reset values
      this.players = voters;
      this.votetotal = 0;
      this.uservotecount = 0;
      this.shouldShowVote = false;
    }
  },
  computed: {
    averageVotes: function() {
      if (this.votetotal > 0) {
        return this.votetotal / this.players.length;
      }
      return "";
    }
  },
  methods: {
    showVotes: function() {
      this.api.show(this.roomid);
    },
    clearVotes: function() {
      this.api.clear(this.roomid);
    }
  }
};
</script>
