<script setup>
import { useForm } from "@inertiajs/vue3";

const form = useForm({
  subject: "",
  priority: 1,
  message: "",
});

function submit() {
  form.post(route("user.ticket.store"));
}
</script>

<template>
<AppContainer>
  <div class="max-w-lg mx-auto">
    <SectionCard class="p-6 space-y-6">

      <!-- Header -->
        <h1 class="text-2x2 font-semibold">Open Support Ticket</h1>

      <!-- Form -->
      <form @submit.prevent="submit" class="space-y-5">

        <!-- Subject -->
        <div>
          <TextInput
            :label="'Subject'"
            v-model="form.subject"
            :placeholder="'Enter Subject'"
            class="w-full"
          />
          <div v-if="form.errors.subject" class="text-red-600 text-sm mt-1">
            {{ form.errors.subject }}
          </div>
        </div>

        <!-- Priority -->
        <div>
          <SelectInput
            :label="'Priority'"
            id="priority"
            v-model.number="form.priority"
            :error="form.errors.priority"
            class="w-full"
          >
            <option value="" disabled>Select Priority</option>
            <option value="1">Low</option>
            <option value="2">Medium</option>
            <option value="3">High</option>
          </SelectInput>
        </div>

        <!-- Message -->
        <div>
          <TextEditor
            :label="'Message'"
            :placeholder="'Write your message...'"
            id="message"
            v-model="form.message"
            class="w-full"
          />
          <div v-if="form.errors.message" class="text-red-600 text-sm mt-1">
            {{ form.errors.message }}
          </div>
        </div>

        <!-- Submit Button -->
        <div class="flex justify-center">
          <Button
            :processing="form.processing"
            :disabled="form.processing"
            intent="primary"
            as="button"
            class="w-full "
          >
            Submit
          </Button>
        </div>

      </form>

    </SectionCard>
  </div>
</AppContainer>
</template>
