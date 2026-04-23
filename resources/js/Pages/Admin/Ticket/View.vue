<script setup>
import { useForm, usePage } from '@inertiajs/vue3';
import { computed, nextTick, onMounted } from 'vue';
import useHelpersDate from '@/Utils/useHelpersDate.js';

const { timeAgo } = useHelpersDate();

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
    onSuccess: async () => {
      form.reset('message');
      await nextTick();
      scrollBottom();
    },
  });
}

function closeTicket() {
  form.post(route('admin.ticket.close', props.ticket.id));
}

function scrollBottom() {
  const el = document.getElementById('chatBox');
  if (el) el.scrollTop = el.scrollHeight;
}

onMounted(() => {
  scrollBottom();
});
</script>

<template>
  <Head :title="__(pageTitle)" />

  <AppContainer>
    <PageHeading>
      <template #title>{{ __(pageTitle) }}</template>
    </PageHeading>

    <!--  Chat Wrapper -->
    <div class="max-w-3xl mx-auto">

      <SectionCard class="p-0 overflow-hidden rounded-2xl border border-gray-200 dark:border-gray-800">

        <!--  Header -->
        <div class="flex justify-between items-center px-6 py-4 border-b dark:border-gray-800 bg-white dark:bg-gray-900">
          <div>
            <h2 class="font-semibold text-gray-800 dark:text-gray-100">
              #{{ ticket.ticket }} - {{ ticket.subject }}
            </h2>
            <p class="text-sm text-gray-500">
              👤 {{ ticket.user?.username || 'User' }}
            </p>
          </div>

          <button
            @click="closeTicket"
            class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg text-sm"
          >
            Close
          </button>
        </div>

        <!--  Chat Area -->
        <div
          id="chatBox"
          class="flex flex-col gap-4 p-5 h-[500px] overflow-y-auto bg-gradient-to-b from-gray-50 to-gray-100 dark:from-gray-900 dark:to-gray-950"
        >

          <div
            v-for="msg in messages"
            :key="msg.id"
            class="flex"
            :class="msg.admin_id ? 'justify-end' : 'justify-start'"
          >
            <div
              class="max-w-[75%] px-4 py-3 rounded-2xl text-sm shadow"
              :class="msg.admin_id
                ? 'bg-indigo-500 text-white rounded-br-none'
                : 'bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-200 rounded-bl-none border dark:border-gray-700'"
            >

              <!-- Sender -->
              <div class="text-xs opacity-70 mb-1">
                {{ msg.admin_id ? 'Admin' : (ticket.user?.username || 'User') }}
              </div>

              <!-- Message -->
              <div v-html="msg.message"></div>

              <!-- Time -->
              <div class="text-[10px] mt-1 opacity-70 text-right">
                {{ timeAgo(msg.created_at) }}
              </div>

            </div>
          </div>

        </div>

        <!--  Input -->
        <form
          @submit.prevent="reply"
          class="p-4 border-t dark:border-gray-800 bg-white dark:bg-gray-900"
        >
          <div class="flex items-center gap-3">

            <TextEditor
              v-model="form.message"
              placeholder="Type your reply..."
              class="flex-1"
            />

            <button
              type="submit"
              :disabled="form.processing"
              class="bg-indigo-500 hover:bg-indigo-600 text-white px-5 py-2 rounded-xl"
            >
              {{ form.processing ? '...' : 'Send' }}
            </button>

          </div>

          <div v-if="form.errors.message" class="text-red-500 text-sm mt-2">
            {{ form.errors.message }}
          </div>
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