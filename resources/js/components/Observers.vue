<template>
  <div v-if="this.observers.length > 0">
    <div class="mt-6 overflow-hidden rounded rounded-lg">
      <div class="w-full border-b border-gray-400">
        <div class="mb-2 text-lg text-center">Observers</div>
      </div>
      <div class="p-2">
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
