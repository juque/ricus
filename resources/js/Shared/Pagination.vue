<script setup>
import { ref } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
  links: Array
})


</script>

<template>
  <div v-if="links.length > 3">
    <div class="flex flex-wrap -mb-1 my-10">
      <template v-for="(link, key) in links">
        <div v-if="link.url === null" :key="key" class="mb-1 mr-1 px-3 py-2" v-html="link.label" />    
        <Link v-else :key="`link-${key}`" class="mb-1 mr-1 px-3 py-2" :class="{'bg-red-200' : link.active }" :href="link.url" v-html="link.label" /> 
      </template>
    </div>
  </div>
</template>

<style scoped>
</style>
