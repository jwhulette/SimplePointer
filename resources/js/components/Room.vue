<template>
  <div class="container">
    <div class="flex flex-col mx-auto">
      <div v-if="hasJoined" class="mb-10">
        <Cards
          v-if="this.user.type == 1"
          :roomid="this.roomid"
          :user="this.user"
          :cardset="this.cardset"
          :api="this.api"
        ></Cards>
      </div>

      <div class="grid grid-cols-3 gap-2">
        <div class="m-auto bg-blue-300 w-300 h-250">ad</div>

        <div v-if="hasJoined">
          <Players :api="api" :roomid="roomid" :users="users" :channel="this.channel"></Players>

          <Observers :users="users"></Observers>
        </div>

        <div v-else>
          <join :api="api" :roomid="roomid" @joined="handleJoin"></join>
        </div>

        <div class="m-auto bg-blue-300 w-300 h-250">ad</div>
      </div>
    </div>
  </div>
</template>

<script>
import Api from "../support/api";
import Join from "./Join";
import Players from "./Players";
import Observers from "./Observers";
import Cards from "./Cards";

export default {
  name: "Room",
  components: {
    Join,
    Players,
    Observers,
    Cards
  },
  props: {
    roomid: {
      type: String
    },
    routes: {
      type: String
    },
    cardset: {
      type: String
    }
  },
  data() {
    return {
      hasJoined: false,
      api: null,
      channel: null,
      users: [],
      vote: null,
      cards: [],
      user: {}
    };
  },
  created() {
    this.api = new Api(this.routes);
  },
  methods: {
    handleJoin: function(user) {
      this.user = user;
      this.joined();
      this.hasJoined = true;
    },
    joined: function() {
      this.channel = Echo.join("room" + this.roomid)
        .here(users => (this.users = users))
        .joining(user => this.users.push(user))
        .leaving(
          user =>
            (this.users = this.users.filter(u => u.userid !== user.userid))
        );
    }
  }
};
</script>
