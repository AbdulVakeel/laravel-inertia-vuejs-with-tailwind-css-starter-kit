<script setup>
import { useForm, Link } from "@inertiajs/vue3";
import useHelpersDate from '../../../Utils/useHelpersDate.js';
const { formattedDateTime, timeAgo } = useHelpersDate();
const props = defineProps({
  ticket: Object,
  messages: Array,
});

const form = useForm({
  message: "",
});

function reply() {
  form.post(route("user.ticket.reply", props.ticket.id), {
    onSuccess: () => form.reset("message"),
  });
}

function closeTicket() {
  form.post(route("user.ticket.close", props.ticket.id));
}
</script>

<template>
  <AppContainer>
  <div class="max-w-lg mx-auto">
    <SectionCard class="p-6 space-y-6">

      <!-- Header -->
      <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
              <h1 class="text-2x2 font-semibold">Ticket #{{ ticket.ticket }} - {{ ticket.subject }}</h1>

        <Button
          :processing="form.processing"
          :disabled="form.processing"
          intent="danger"
          as="button"
          class="sm:mt-0 w-full sm:w-auto"
          @click="closeTicket"
        >
          Close Ticket
        </Button>
      </div>

      <!-- Messages -->
      <div class="space-y-4 max-h-96 overflow-y-auto">
        <div 
          v-for="msg in messages" 
          :key="msg.id" 
          class="p-4 border border-violet-200/30 rounded-lg shadow-sm bg-white dark:bg-gray-800"
        >
          <p class="text-gray-800 dark:text-gray-200">{{ msg.message }}</p>
          <div class="mt-2 flex justify-between items-center text-xs text-gray-500 dark:text-gray-400">
            <span>{{ timeAgo(msg.created_at) }}</span>
            <span>{{ formattedDateTime(msg.created_at) }}</span>
          </div>
        </div>
      </div>

      <!-- Reply Form -->
      <form @submit.prevent="reply" class="space-y-4">
        <TextEditor
          :label="'Message'"
          :placeholder="'Write your reply...'"
          id="message"
          v-model="form.message"
          class="w-full"
        />
        <div v-if="form.errors.message" class="text-red-600 text-sm">{{ form.errors.message }}</div>

        <div class="flex flex-col sm:flex-row gap-4">
          <Button
            :processing="form.processing"
            :disabled="form.processing"
            intent="primary"
            as="button"
            class="w-full "
          >
            Send Reply
          </Button>
        </div>
      </form>

    </SectionCard>
  </div>
</AppContainer>

</template>
