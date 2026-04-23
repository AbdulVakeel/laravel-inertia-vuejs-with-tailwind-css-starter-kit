<script setup>
import { useForm } from "@inertiajs/vue3";
import useHelpersDate from "../../../Utils/useHelpersDate.js";

const { timeAgo } = useHelpersDate();

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

function cleanMessage(message) {
  if (!message) return "";
  return message
    .replace(/<div><br><\/div>/gi, "")
    .replace(/<p><br><\/p>/gi, "")
    .trim();
}
</script>

<template>
  <AppContainer>
    <div class="max-w-2xl mx-auto">

      <SectionCard class="p-0 overflow-hidden rounded-2xl">

        <!-- 🔥 Header -->
        <div class="flex justify-between items-center px-6 py-4 border-b">
          <div>
            <h2 class="font-semibold ">
              Ticket #{{ ticket.ticket }}
            </h2>
            <p class="text-sm text-gray-500">
             subject -> {{ ticket.subject }}
            </p>
          </div>

          <Button
            :processing="form.processing"
            :disabled="form.processing"
            intent="danger"
            as="button"
            @click="closeTicket"
          >
            Close
          </Button>
        </div>

        <!-- 🔥 Chat Messages -->
        <div class="p-4 space-y-4 max-h-[450px] overflow-y-auto bg-gray-50 dark:bg-gray-900">

          <div
            v-for="msg in messages"
            :key="msg.id"
            class="flex"
            :class="msg.admin_id ? 'justify-end' : 'justify-start'"
          >

            <!-- Chat Bubble -->
            <div
              class="max-w-[75%] px-4 py-3 rounded-2xl text-sm shadow"
              :class="msg.admin_id
                ? 'bg-indigo-500 text-white rounded-br-none'
                : 'bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-200 rounded-bl-none border'"
            >

              <!-- Sender -->
              <div class="text-xs opacity-70 mb-1">
                {{ msg.admin_id ? 'Admin' : 'You' }}
              </div>

              <!-- Message -->
              <div v-html="cleanMessage(msg.message)"></div>

              <!-- Time -->
              <div class="text-[10px] mt-1 opacity-70 text-right">
                {{ timeAgo(msg.created_at) }}
              </div>

            </div>
          </div>

        </div>

        <!-- 🔥 Reply Box -->
        <form @submit.prevent="reply" class="p-4 border-t space-y-3">

          <TextEditor
            id="message"
            v-model="form.message"
            placeholder="Write your reply..."
            class="w-full"
          />

          <div v-if="form.errors.message" class="text-red-600 text-sm">
            {{ form.errors.message }}
          </div>

          <Button
            :processing="form.processing"
            :disabled="form.processing"
            intent="primary"
            as="button"
            class="w-full"
          >
            Send Reply
          </Button>

        </form>

      </SectionCard>

    </div>
  </AppContainer>
</template>