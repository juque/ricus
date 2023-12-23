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
    <ul class="flex flex-wrap gap-2">
      <li class="inline-block" v-for="tag in tagList"><Link class="px-3 text-sm font-bold bg-blue-100 rounded-full text-blue-600 hover:bg-blue-200 transition duration-300" :href="`/tag/${tag.name.en}`">{{ tag.name.en }}</Link></li>
    </ul>
  </div>
</template>

<style scoped>
</style>
