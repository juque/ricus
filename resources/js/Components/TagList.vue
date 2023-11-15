<script setup>
import { Link } from '@inertiajs/vue3';
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
      <li v-for="tag in tagList"><Link :href="`/tag/${tag.name.en}`">{{ tag.name.en }}</Link></li>
    </ul>
  </div>
</template>

<style scoped>
</style>
