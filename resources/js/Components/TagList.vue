<script setup>

import { ref } from 'vue';

const props = defineProps ({
  tagList: {
    type: Object,
    default: {}
  }
});

</script>

<template>
  <div>
    <ul>
      <li v-for="tag in tagList">{{ tag.name.en }} </li>
    </ul>
  </div>
</template>

<style scoped>
</style>
