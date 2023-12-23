<script setup>
import { Head, Link, usePage } from '@inertiajs/vue3';
import TagList from '@/Components/TagList.vue';

const page = usePage()

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
                <template v-if="page.props.auth.user">
                  <li><Link :href="route('bookmark.index')">Dashboard</Link></li>
                </template>
                <template v-else>
                  <li><Link :href="route('login')">login</Link></li>
                </template>
            </ul>
        </div>

    </header>

    <main class="sm:flex md:justify-between">

        <div class="content w-4/6">

            <ul class="pl-3">
              <li class="py-2" v-for="bookmark in bookmarks.data">
                <a class="text-lg text-blue-600" :href="`${bookmark.uri}`">{{ bookmark.title }}</a>
                <ul class="flex flex-row space-x-1">
                  <li v-for="tag in bookmark.tags"><Link class="bg-gray-100 rounded-full text-blue-400 px-2" :href="`/tag/${tag.name.en}`">{{ tag.name.en }}</Link></li>
                </ul>
              </li>
            </ul>


        </div>

        <div class="tags pt-4 md:pt-2 pl-3 w-2/6">

            <h2 class="text-xl font-semibold">Tags</h2>

            <TagList :tagList="tagList" />

        </div>

    </main>

</template>
