<template>
  <div class="container">
    <div v-if="hasJoined">
      <game :api="this.api" :roomid="this.roomid"></game>
    </div>
    <div v-else>
      <join :api="this.api" :roomid="this.roomid" @joined="handleJoin"></join>
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
  data: function() {
    return {
      hasJoined: false,
      api: null
    };
  },
  created() {
    this.api = new Api(this.routes);
    Echo.channel("room").listen("UserJoined", function(e) {
      console.log(e.players);
    });
  },
  methods: {
    handleJoin: function(data) {
      if (data !== "error") {
        this.hasJoined = true;
        return;
      }

      console.log("Error creating users!");
    }
  }
};
</script>
