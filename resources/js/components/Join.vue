<template>
  <div class="w-full max-w-xs m-auto">
    <div class="my-10 text-3xl text-center">Register for room</div>

    <label for="room_name">Enter your name</label>
    <input
      v-model="username"
      type="text"
      required
      name="name"
      class="block w-full px-4 py-2 leading-normal bg-white border border-gray-300 rounded-lg appearance-none focus:outline-none focus:shadow-outline"
    />
    <span v-if="msg">{{msg}}</span>

    <div class="my-6 text-center">
      <p class="my-4 text-center">Enter room as:</p>
      <button
        v-on:click="join(1)"
        class="px-4 py-2 font-bold text-white bg-green-600 rounded hover:bg-green-400"
        type="submit"
      >
        Player
        <svg class="inline" fill="currentColor" viewBox="0 0 20 20" width="22" height="22">
          <path
            d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
            clip-rule="evenodd"
            fill-rule="evenodd"
          />
        </svg>
      </button>
      <span class="inline-block w-12"></span>
      <button
        v-on:click="join(0)"
        class="px-4 py-2 font-bold text-white bg-green-600 rounded hover:bg-green-400"
        type="submit"
      >
        Observer
        <svg class="inline" fill="currentColor" viewBox="0 0 20 20" width="22">
          <path
            d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"
          />
        </svg>
      </button>
    </div>
  </div>
</template>

<script>
export default {
  name: "Join",
  props: {
    api: {
      type: Object,
    },
    roomid: {
      type: String,
    },
  },
  data: function () {
    return {
      username: "",
      msg: "",
      userid: null,
    };
  },
  mounted() {
    if (localStorage.getItem("agile_pointer_userid"))
      this.userid = localStorage.getItem("agile_pointer_userid");
  },
  methods: {
    join: function (type) {
      this.api
        .join(this.username, type, this.roomid, this.userid)
        .then((data) => {
          this.saveUserId(data.user.id);
          this.$emit("joined", data.user);
        })
        .catch(function (error) {
          console.log(error);
        });
    },
    saveUserId: function (userid) {
      if (typeof userid !== "undefined") {
        localStorage.setItem("agile_pointer_userid", userid);
      }
    },
  },
};
</script>
