<template>
  <div class="container">
    <div v-if="hasJoined">
      <!-- <game :api="api" :roomid="roomid"></game> -->
      <div class="row justify-content-center">
        <div class="col-2">
          <!-- Players -->
          <div class="card">
            <div class="card-header text-center">Players</div>
            <div class="card-body">
              <ul class="list-group list-group-flush">
                <li
                  class="list-group-item"
                  v-for="player in this.players"
                  :key="player.uuid"
                >{{ player.name }}</li>
              </ul>
            </div>
          </div>
          <!-- Observers -->
          <div class="card">
            <div class="card-header text-center">Observers</div>
            <div class="card-body">
              <ul class="list-group list-group-flush">
                <li
                  class="list-group-item"
                  v-for="observer in this.observers"
                  :key="observer.uuid"
                >{{ observer.name }}</li>
              </ul>
            </div>
          </div>
        </div>
        <!-- Votes -->
        <div class="col-2">
          <div class="card">
            <div class="card-header text-center">Votes</div>
            <div class="card-body">
              <ul class="list-group">
                <li class="list-group-item text-center">3</li>
              </ul>
            </div>
            <div v-if="votes > 0">
              <div class="card-footer text-center">Average: {{ averageVotes }}</div>
            </div>
          </div>
        </div>
        <!-- Votes -->
      </div>
    </div>
    <div v-else>
      <join :api="api" :roomid="roomid" @joined="handleJoin"></join>
    </div>
  </div>
</template>

<script>
import Api from "../support/api";
import Join from "./Join.vue";
import Game from "./Game.vue";

export default {
  name: "Room",
  components: {
    Join,
    Game
  },
  props: {
    roomid: {
      type: String
    },
    routes: {
      type: String
    }
  },
  data() {
    return {
      hasJoined: false,
      api: null,
      players: [],
      observers: [],
      votes: 0
    };
  },
  created() {
    this.api = new Api(this.routes);
    // let vm = this;
    // Echo.join("room" + this.roomid).here("UserJoined", function(e) {
    //   vm.handleUserJoin(e.users);
    // });
  },
  mounted() {},
  computed: {
    averageVotes: function() {
      return this.votes / this.players.length;
    }
  },
  methods: {
    monitor: function() {
      let vm = this;
      Echo.join("room" + this.roomid).here("UserJoined", function(e) {
        vm.handleUserJoin(e.users);
      });
    },

    handleUserJoin: function(users) {
      this.players = users.filter(user => {
        if (user.type === "1") {
          return user;
        }
      });

      this.observers = users.filter(user => {
        if (user.type === "0") {
          return user;
        }
      });
    },

    handleJoin: function(data) {
      if (data === "success") {
        this.monitor();
        this.hasJoined = true;
      }
      console.log("Error creating users!");
    }
  }
};
</script>
