<template>
  <div class="container">
    <div v-if="hasJoined">
      <div class="row justify-content-center">
        <div class="col-2">
          <!-- Players -->
          <div class="card">
            <div class="card-header text-center">Players</div>
            <div class="card-body">
              <ul class="list-group list-group-flush">
                <li class="list-group-item">Bob</li>
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
                  :key="observer"
                >{{ observer }}</li>
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
            <div class="card-footer text-center">4.3 Average</div>
          </div>
        </div>
        <!-- Votes -->
      </div>
    </div>
    <div v-else>
      <!-- join -->
      <join :api="this.api" :roomid="this.roomid" @joined="handleJoin"></join>
    </div>
    <!-- end join -->
  </div>
</template>

<script>
import Api from "../support/api";
import Join from "./Join.vue";

export default {
  name: "Room",
  components: {
    Join
  },
  props: {
    roomid: {
      type: String
    },
    routes: {
      type: String
    }
  },
  data: function() {
    return {
      hasJoined: false,
      players: [],
      observers: [],
      api: null
    };
  },
  created() {
    this.api = new Api(this.routes);
  },
  mounted() {
    // console.log(this.roomid);
  },
  methods: {
    handleJoin: function(data) {
      this.hasJoined = true;
      this.getPlayers();
    },
    getPlayers: function() {
      let players = this.api.getPlayers(this.roomid);
      console.log(players);
    }
    // join: function(playerType) {
    //   //   console.log("Player: " + playerType);
    //   //   const api = new Api(this.routes);
    //   this.api.join().then(data => {
    //     console.log(data);
    //   });
    //   console.log(player.join());
    //   axios
    //     .put(this.routes.player_join)
    //     .then(response => (this.info = response.data.bpi))
    //     .catch(error => console.log(error));
    //   if (this.username.length == 0) {
    //     this.msg = "A username is required";
    //     return;
    //   }
    //   this.hasJoined = true;
  }
};
</script>
