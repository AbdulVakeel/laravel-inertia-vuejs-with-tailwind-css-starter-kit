<script setup>
import { useForm, usePage } from '@inertiajs/vue3';
import { computed } from 'vue';
import useHelpersDate from '@/Utils/useHelpersDate.js';

const { timeAgo, formattedDateTime } = useHelpersDate();

const page = usePage();
const pageTitle = computed(() => page.props.pageTitle || 'Ticket View');

const props = defineProps({
  ticket: Object,
  messages: Array,
});

const form = useForm({
  message: '',
});

function reply() {
  form.post(route('admin.ticket.reply', props.ticket.id), {
    onSuccess: () => form.reset('message'),
  });
}

function closeTicket() {
  form.post(route('admin.ticket.close', props.ticket.id));
}
</script>

<template>
  <Head :title="__(pageTitle)"/>
    <AppContainer>
        <PageHeading>
			<template #title>{{ __(pageTitle) }}</template>
			
		</PageHeading>
    <div class="max-w-2xl mx-auto">
      <SectionCard class="p-6 space-y-4">

        <!-- Header -->
        <div class="flex justify-between items-center mb-4">
          <h1 class="text-xl md:text-2xl font-semibold">
            Ticket #{{ ticket.ticket }} - {{ ticket.subject }}
          </h1>

          <!-- FIXED: use button instead of Link-based Button -->
          <button
            @click="closeTicket"
            class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg text-sm"
          >
            Close Ticket
          </button>
        </div>

        <!-- Messages -->
        <div class="space-y-4">
          <div
            v-for="msg in messages"
            :key="msg.id"
            class="p-4 border border-violet-200/30 rounded-lg"
          >
            <!-- FIXED: render HTML properly -->
            <div
              v-html="msg.message"
              class="text-sm leading-relaxed"
            ></div>

            <div class="text-xs text-gray-500 mt-2">
              {{ timeAgo(msg.created_at) }} |
              {{ formattedDateTime(msg.created_at) }}
            </div>
          </div>
        </div>

        <!-- Reply Form -->
        <form @submit.prevent="reply" class="space-y-3 mt-4">

          <!-- FIXED: added required id -->
          <TextEditor
            id="message"
            v-model="form.message"
            placeholder="Write your reply..."
            class="w-full"
          />

          <!-- Validation -->
          <div v-if="form.errors.message" class="text-red-600 text-sm">
            {{ form.errors.message }}
          </div>

          <!-- FIXED: proper submit button -->
          <button
            type="submit"
            :disabled="form.processing"
            class="w-full bg-blue-500 hover:bg-blue-600 text-white py-2 rounded-lg transition"
          >
            <span v-if="form.processing">Sending...</span>
            <span v-else>Send Reply</span>
          </button>

        </form>

      </SectionCard>
    </div>
  </AppContainer>
</template>

<script>
import Layout from '@/Layouts/AdminLayout.vue';
import { defineComponent } from 'vue';

export default defineComponent({
  layout: Layout,
});
</script>