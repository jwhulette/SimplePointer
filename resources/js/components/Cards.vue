<template>
  <div class="col-12 vote-btns">
    <div class="row justify-content-center">
      <div class="row btn-row">
        <div col v-for="card in this.cards" :key="card">
          <button type="button" class="btn btn-outline-info btn-sm" @click="vote(card)">{{ card }}</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Cards",
  props: {
    cardset: {
      type: String
    },
    api: {
      type: Object
    },
    user: {
      type: Object
    },
    roomid: {
      type: String
    }
  },
  data() {
    return {
      cards: []
    };
  },
  created() {
    this.cards = JSON.parse(this.cardset);
  },
  methods: {
    vote(vote) {
      this.api
        .vote(this.roomid, this.user.id, vote)
        .then(data => {
          //   this.saveUserId(data.userid);
          //   this.$emit("joined");
        })
        .catch(function(error) {
          console.log(error);
        });
    }
  }
};
</script>
