<template>
  <!-- Players -->
  <div class="col-6">
    <div class="col align-right">
      <input @click="clearVotes" class="btn btn-sm btn-primary" type="button" value="Clear Votes" />
      <input @click="showVotes" class="btn btn-sm btn-primary" type="button" value="Show Votes" />
    </div>
    <table class="table">
      <thead>
        <tr>
          <th scope="col" class="col-8">Player</th>
          <th scope="col" class="col-4 text-center">Vote</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="player in this.players" :key="player.userid">
          <td>{{ player.name }}</td>
          <td class="text-center">
            <span v-if="player.voted === false">---</span>
            <span v-if="player.voted === true && showVote === false">
              <svg fill="currentColor" viewBox="0 0 20 20" width="20" color="green">
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
        <tr v-if="this.showVote" class="text-right">
          <td colspan="2">Average: {{ averageVotes }}</td>
        </tr>
      </tbody>
    </table>
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
      votetotal: 0
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
      this.votetotal = this.votetotal + data.vote;
    },
    clearVote: function() {
      let voters = this.players.map(user => {
        user.vote = null;
        user.voted = false;
        return user;
      });

      this.players = voters;
      this.votetotal = 0;
      this.showVote = false;
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
