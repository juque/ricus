<script setup>
import { Head, Link } from '@inertiajs/vue3';
import TagList from '@/Components/TagList.vue';

// import Componente from "./components/Componente.vue";

defineProps({
    bookmarks: Object,
    tagList: {
      type: Object,
      default: {}
    }
});

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

        <div class="content w-5/6">

            <ul class="pl-3">
                <li v-for="bookmark in bookmarks.data"><a class="text-lg text-blue-600" :href="`${bookmark.uri}`">{{ bookmark.title}}</a></li>
            </ul>


        </div>

        <div class="tags w-1/6">

            <h2 class="text-xl font-semibold">Tags</h2>

            <TagList :tagList="tagList" />

        </div>

    </main>

</template>
