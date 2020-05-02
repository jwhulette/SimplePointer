<template>
  <div v-if="this.observers.length > 0">
    <div class="card">
      <div class="card-header text-center">Observers</div>
      <div class="card-body">
        <span v-for="(observer, index) in this.observers" v-bind="index">
          <span>{{observer.name}}</span>
          <span v-if="index+1 < observers.length">,</span>
        </span>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Observers",
  props: {
    users: {
      type: Array
    }
  },
  data() {
    return {
      observers: []
    };
  },
  watch: {
    users: function(users) {
      this.observers = users.filter(user => {
        if (user.type === "0") {
          return user;
        }
      });
    }
  }
};
</script>
