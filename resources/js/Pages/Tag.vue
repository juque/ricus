<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { ref } from 'vue';

const props = defineProps({
  tagged: {
    type: String,
    default: ''
  },
  bookmarks: {
    type: Array,
    default: []
  }
})

</script>

<template>
  <Head title="Ricus" />
    <header class="p-2 bg-gray-100 flex justify-between">

        <div>
            <h1 class="font-black text-3xl text-blue-600"><Link href="/">ri.cu.s</Link></h1>
        </div>

        <div>
            <ul>
                <li><Link :href="route('login')">login</Link></li>
            </ul>
        </div>

    </header>

  <main class="sm:flex md:justify-between">
  <div class="pl-2 pt-2">
    <h1>Tagged with: <span class="font-bold">{{ tagged }}</span></h1>
    <ul class="pt-2">
      <li class="pb-3" v-for="bookmark in bookmarks"><a class="text-blue-600" :href="`${bookmark.uri}`">{{ bookmark.title }}</a></li>
    </ul>
  </div>
  </main>
</template>

<style scoped>
</style>

