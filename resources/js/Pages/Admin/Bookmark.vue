<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Bookmark from '@/Components/Bookmark.vue';
</script>

<template>
    <AppLayout title="Bookmarks">

    <template #header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Bookmark</h2>
    </template>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <Bookmark />
            </div>
        </div>
    </div>

    </Applayout>

</template>
