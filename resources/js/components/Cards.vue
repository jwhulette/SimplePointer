<template>
  <div class="flex justify-center">
    <div class="inline w-auto pr-4" col v-for="card in this.cards" :key="card">
      <button
        dusk="vote"
        type="button"
        class="w-16 px-1 py-1 font-semibold text-green-700 bg-transparent border border-green-500 rounded hover:bg-green-500 hover:text-white hover:border-transparent"
        @click="vote(card)"
      >{{ card }}</button>
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
        .catch(function(error) {
          console.log(error);
        });
    }
  }
};
</script>
