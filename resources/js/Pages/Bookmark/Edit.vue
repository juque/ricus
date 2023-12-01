<script setup>
import { useForm } from '@inertiajs/vue3';
import sharedFuncions from '@/utils.js';
import AppLayout from '@/Layouts/AppLayout.vue';
import FormSection from '@/Components/FormSection.vue';
import InputLabel from '@/Components/InputLabel.vue';
import InputError from '@/Components/InputError.vue';
import Checkbox from '@/Components/Checkbox.vue';
import TextInput from '@/Components/TextInput.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

const { sanitizeTags } = sharedFuncions();

const props = defineProps({
  bookmark: Object,
  tags: Array
})


const form = useForm({
  title: props.bookmark.title,
  uri: props.bookmark.uri,
  description: props.bookmark.description,
  private: props.bookmark.private ? true : false,
  tags: props.tags.map(x => x.name.en).join(" ")
});

const updateBookmark = () => {
  form
    .transform(data => ({
      ... data,
      tags: sanitizeTags(form.tags)
      })
    ).put(route('bookmark.update', props.bookmark.id), {
    errorBag: 'updateBookmark',
    preserveScroll: true,
    onSuccess: () => {}
  });
}

</script>

<template>
  <AppLayout title="Bookmarks">
  <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Bookmark</h2>
  </template>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <h1>Editing record: <em>{{ bookmark.title }}</em></h1>
        <FormSection @submitted="updateBookmark">
          
          <template #form>

            <div class="col-span-6 sm:col-span-4">
              <label class="flex items-center">
              <Checkbox 
                 id="private"
                 v-model:checked="form.private"
              />
              <span class="ml-2 ms-2 text-sm text-gray-600 dark:text-gray-400">
                ¿Privado?
              </span>
              </label>
            </div>

            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="title" value="Title" />
                <TextInput
                    id="title"
                    :message="form.errors.title"
                    v-model="form.title"
                    type="text"
                    class="mt-1 block w-full"
                    autocomplete="none"
                />
                <InputError class="mt-2" :message="form.errors.title" />
            </div>
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="uri" value="URI" />
                <TextInput
                    id="uri"
                    v-model="form.uri"
                    type="text"
                    class="mt-1 block w-full"
                    autocomplete="none"
                />
                <InputError class="mt-2" :message="form.errors.uri" />
            </div>
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="description" value="Description" />
                <TextInput
                    id="description"
                    v-model="form.description"
                    type="text"
                    class="mt-1 block w-full"
                    autocomplete="none"
                />
                <InputError class="mt-2" :message="form.errors.description" />
            </div>
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="tags" value="Tags" />
                <TextInput
                    id="tags"
                    v-model="form.tags"
                    type="text"
                    class="mt-1 block w-full"
                    autocomplete="none"
                />
                <InputError class="mt-2" :message="form.errors.tags" />
            </div>

          </template>

        <template #actions>
            <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">Save</PrimaryButton>
        </template>

        </FormSection>
      </div>
    </div>
  </div>

  </Applayout>
</template>
