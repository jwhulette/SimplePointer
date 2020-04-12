<template>
  <div class="row justify-content-center">
    <div class="col-4">
      <div class="card">
        <div class="card-header">Register for room</div>
        <div class="card-body">
          <div class="form-group">
            <label for="room_name">Enter your name</label>
            <input v-model="username" class="form-control" type="text" required />
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
</template>

<script>
export default {
  name: "Join",
  props: {
    api: {
      type: Object
    },
    roomid: {
      type: String
    }
  },
  data: function() {
    return {
      username: "",
      msg: ""
    };
  },
  methods: {
    join: function(type) {
      this.api.join(this.username, type, this.roomid).then(data => {
        this.$emit("joined", data);
      });
    }
  }
};
</script>

<style>

</style>
