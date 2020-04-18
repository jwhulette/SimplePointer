<template>
  <div class="row justify-content-center">
    <div class="col-2">
      <!-- Players -->
      <div class="card">
        <div class="card-header text-center">Players</div>
        <div class="card-body">
          <ul class="list-group list-group-flush">
            <li class="list-group-item" v-for="player in this.players" :key="player">{{ player }}</li>
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
</template>

<script>
export default {
  name: "Game",
  props: {
    api: {
      type: Object
    },
    roomid: {
      type: String
    },
    players: {
      type: Array,
      default: () => []
    },
    observers: {
      type: Array,
      default: () => []
    }
  },
  watch: {
    players() {
      console.log("The players has changed!");
    }
  },
  created() {},
  computed: {},
  mounted() {},
  data: function() {
    return {
      votes: []
    };
  }
};
</script>

<style>

</style>
