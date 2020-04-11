<template>
  <div class="container">
    <div v-if="hasJoined">
      <div class="row justify-content-center">
        <div class="col-3">
          <!-- Players -->
          <div class="card">
            <div class="card-header text-center">Players</div>
            <div class="card-body">
              <ul class="list-group list-group-flush">
                <li class="list-group-item">Bob</li>
                <li class="list-group-item">Tom</li>
                <li class="list-group-item">Pat</li>
                <li class="list-group-item">Kelly</li>
                <li class="list-group-item">Vikki</li>
              </ul>
            </div>
          </div>
          <!-- Observers -->
          <div class="card">
            <div class="card-header text-center">Observers</div>
            <div class="card-body">
              <ul class="list-group list-group-flush">
                <li class="list-group-item">Jenn</li>
                <li class="list-group-item">Pete</li>
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
                <li class="list-group-item text-center">8</li>
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
      <div class="row justify-content-center">
        <div class="col-4">
          <div class="card">
            <div class="card-header">Register for room</div>
            <div class="card-body">
              <div class="form-group">
                <label for="room_name">Enter your name</label>
                <input
                  v-model="username"
                  class="form-control"
                  type="text"
                  name="username"
                  id="username"
                  required
                />
                <span v-if="msg">{{msg}}</span>
              </div>
              <p class="text-center">Enter room as:</p>
              <div class="row">
                <div class="col-6 text-center">
                  <button v-on:click="join(1)" class="btn btn-primary">Player</button>
                </div>
                <div class="col-6 text-center">
                  <button v-on:click="join(0)" class="btn btn-primary">Observer</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end join -->
  </div>
</template>

<script>
import Api from "../support/api";

export default {
  props: ["roomid", "routes"],
  data: function() {
    return {
      hasJoined: false,
      username: "",
      msg: "",
      players: [],
      observers: [],
      api: null
    };
  },
  mounted() {
    console.log(this.roomid);
    this.api = new Api(this.routes);
  },
  methods: {
    join: function(playerType) {
      //   console.log("Player: " + playerType);
      //   const api = new Api(this.routes);

      this.api.join().then(data => {
        console.log(data);
      });

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
  }
};
</script>
