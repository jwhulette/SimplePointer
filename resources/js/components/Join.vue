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
              <button v-on:click="join(1)" class="btn btn-primary">
                Player
                <svg fill="currentColor" viewBox="0 0 20 20" width="22">
                  <path
                    d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                    clip-rule="evenodd"
                    fill-rule="evenodd"
                  />
                </svg>
              </button>
            </div>
            <div class="col-6 text-center">
              <button v-on:click="join(0)" class="btn btn-primary">
                Observer
                <svg fill="currentColor" viewBox="0 0 20 20" width="22">
                  <path
                    d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"
                  />
                </svg>
              </button>
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
      msg: "",
      userid: null
    };
  },
  mounted() {
    if (localStorage.getItem("agile_pointer_userid"))
      this.userid = localStorage.getItem("agile_pointer_userid");
  },
  methods: {
    join: function(type) {
      this.api
        .join(this.username, type, this.roomid, this.userid)
        .then(data => {
          this.saveUserId(data.user.id);
          this.$emit("joined", data.user);
        })
        .catch(function(error) {
          console.log(error);
        });
    },
    saveUserId: function(userid) {
      if (typeof userid !== "undefined") {
        localStorage.setItem("agile_pointer_userid", userid);
      }
    }
  }
};
</script>

<style>

</style>
