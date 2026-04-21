<script setup>
import { useForm } from '@inertiajs/vue3';
import { Icon } from '@iconify/vue';
import TextEditor from '@/Components/TextEditor.vue';
const { faq, show, maxWidth, closeable } = defineProps({
    faq: [Array, Object],
    show: { type: Boolean, default: false },
    maxWidth: { type: String, default: '2xl' },
    closeable: { type: Boolean, default: true },
});

const emit = defineEmits(['close']);

const form = useForm({
    id: faq?.id ?? '',
    title: faq?.title ?? '',
    description: faq?.description ?? '',
    _method: faq?.id ? 'put' : 'post',
});

const submit = () => {
    if (form.id) {
        form.post(route('admin.faqs.update', form.id), {
            preserveState: true,
            onSuccess: () => emit('close'),
        });
    } else {
        form.post(route('admin.faqs.store'), {
            preserveState: true,
            onSuccess: () => emit('close'),
        });
    }
};
</script>

<template>
    <Modal :show="show" :max-width="maxWidth" :closeable="closeable" @close="emit('close')">
        <SectionCard class="rounded-none dark:rounded-none">

            <!-- Close -->
            <div class="flex items-center justify-end w-full px-3 pt-3 cursor-pointer" @click="emit('close')">
                <Icon icon="mdi:close" class="text-2xl dark:text-white" />
            </div>

            <!-- Header -->
            <header class="border-b border-secondary/10 dark:border-secondary mb-5 -mt-5">
                <div class="text-center px-14 mb-2">
                    <h1 class="text-dark text-xl font-bold">
                        {{ faq?.id ? 'Edit Faq' : 'New Faq' }}
                    </h1>
                </div>
            </header>

            <!-- Body -->
            <main class="px-14 pb-7">
                <ValidationErrors class="my-5" />

                <div class="grid grid-cols-1 gap-y-5">
                    <TextInput
                        label="Faq Title"
                        placeholder="Faq Title"
                        id="title"
                        v-model="form.title"
                        :error="form.errors.title"
                        class="w-full"
                    />

                    <TextEditor
                        label="Faq Description"
                        placeholder="Faq Description"
                        id="description"
                        v-model="form.description"
                        :error="form.errors.description"
                        class="w-full"
                    />
                </div>
            </main>

            <!-- Footer -->
            <footer class="border-t border-secondary/10 dark:border-secondary pb-5">
                <div class="mt-3 flex items-center justify-center px-14">
                    <Button
                        :processing="form.processing"
                        :disabled="form.processing"
                        intent="primary"
                        as="button"
                        class="mt-5 w-full"
                        @click="submit"
                    >
                        Save Changes
                    </Button>
                </div>
            </footer>

        </SectionCard>
    </Modal>
</template>