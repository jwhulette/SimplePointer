<template>
  <div class="container">
    <div v-if="hasJoined">
      <Cards
        v-if="this.user.type == 1"
        :roomid="this.roomid"
        :user="this.user"
        :cardset="this.cardset"
        :api="this.api"
      ></Cards>

      <div class="row justify-content-center">
        <Players
          :clearVote="clearVote"
          :showVote="showVote"
          :api="api"
          :roomid="roomid"
          :users="users"
          :vote="this.vote"
        ></Players>
      </div>

      <div class="row justify-content-center">
        <div class="col-6">
          <Observers :users="users"></Observers>
        </div>
      </div>
    </div>

    <div v-else>
      <join :api="api" :roomid="roomid" @joined="handleJoin"></join>
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
      user: {},
      showVote: false,
      clearVote: false
    };
  },
  created() {
    this.api = new Api(this.routes);
  },
  mounted() {},
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
        )
        .listen("UserVoted", e => {
          this.vote = e.vote;
        })
        .listen("ShowVotesEvent", e => {
          this.showVote = true;
        })
        .listen("ClearVotesEvent", e => {
          this.clearVote = true;
        });
    }
  }
};
</script>
