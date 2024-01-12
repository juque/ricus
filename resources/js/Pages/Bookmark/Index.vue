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




							<div class="relative overflow-x-auto">
									<table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
											<thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
													<tr>
															<th scope="col" class="px-6 py-3">
																 Bookmark 
															</th>
															<th scope="col" class="px-6 py-3">
																 Público
															</th>
															<th scope="col" class="px-6 py-3">
																 Descripción 
															</th>
															<th scope="col" class="px-6 py-3">
																 Tags 
															</th>
															<th scope="col" class="px-6 py-3">
																 Acciones
															</th>
													</tr>
											</thead>
											<tbody>
													<tr v-for="row in bookmark" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
															<th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
																	<a class="underline text-blue-600 hover:text-blue-800 visited:text-purple-600" :href="row.uri">{{ row.title }}</a>
															</th>
															<td class="px-6 py-4">
																	{{ row.private }}
															</td>
															<td class="px-6 py-4">
																	{{ row.description }}
															</td>
															<td class="px-6 py-4">
																<ul class="flex flex-row space-x-1">
																	<li v-for="tag in row.tags"><span class="bg-gray-100 rounded-full text-blue-400 px-2">{{ tag.name.en }}</span></li>
																</ul>
															</td>
															<td class="px-6 py-4">
																	<a class="text-blue-600 underline" :href="route('bookmark.edit', row.id)">Edit</a>
															</td>
													</tr>
											</tbody>
									</table>
							</div>


            </div>
        </div>
    </div>
    </AppLayout>

</template>
