<script setup>

import { ref, watch } from 'vue';
import { useForm } from '@inertiajs/vue3';
import FormSection from '@/Components/FormSection.vue';
import InputLabel from '@/Components/InputLabel.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

const form = useForm({
  title: '',
  uri: '',
  description: '',
  tags: ''
});

watch(() => form.tags, (newValue, oldValue) => {
  const processedTags = sanitizeTags(newValue);
  form.tags = processedTags;
});

const sanitizeTags = (tags) => {
  const re = /\s+|,\s*/;
  return tags.split(re).filter(tag => tag !== '');
};

const createBookmark = () => {
  form.post(route('bookmark.store'), {
    errorBag: 'createBookmark',
    preserveScroll: true,
    onSuccess: () => {}
  });
}

</script>

<template>

      <div class="p-4 lg:p-6 bg-white border-b border-gray-200">
          <h1 class="mt-2 text-2xl font-medium text-gray-900">Add new Bookmark</h1>
      </div>

      <FormSection @submitted="createBookmark">
        <template #form>
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
</template>

<style scoped>
</style>
