<script setup>
import { ref } from 'vue';
import AppLayout from '@/Layouts/AppLayout.vue';

// import Componente from "./components/Componente.vue";

const props = defineProps ({
 bookmark: {
    type: Object,
  }
});

</script>

<template>
    <AppLayout title="Bookmark">

    <template #header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Bookmark</h2>
    </template>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <h1 class="font-bold text-xl">Home</h1>
                <ul>
                    <li v-for="row in bookmark">{{ row.id }}. <a class="underline text-blue-600 hover:text-blue-800 visited:text-purple-600" :href="row.uri">{{ row.title }}</a></li>
                </ul>
            </div>
        </div>
    </div>
    </AppLayout>

</template>
