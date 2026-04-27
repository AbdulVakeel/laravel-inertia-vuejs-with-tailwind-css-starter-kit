<script setup>
import { useForm } from '@inertiajs/vue3';
import { Icon } from '@iconify/vue';
import { watchEffect } from 'vue';

const props = defineProps({
  investment: [Array, Object],
  show: { type: Boolean, default: false },
  maxWidth: { type: String, default: '2xl' },
  closeable: { type: Boolean, default: true },
});

const emit = defineEmits(['close']);

const form = useForm({
  id: '',
  name: '',
  amount: '',
  status: 1,
  _method: 'post',
});

/**
 * Sync props -> form (important for edit/create modal reuse)
 */
watchEffect(() => {
  form.id = props.investment?.id ?? '';
  form.name = props.investment?.name ?? '';
  form.amount = props.investment?.amount ?? '';
  form.status = props.investment?.status ?? 1;
  form._method = props.investment?.id ? 'put' : 'post';
});

/**
 * Submit Create / Update
 */
const submit = () => {
  const routeName = form.id
    ? route('admin.investment.update', form.id)
    : route('admin.investment.store');

  form.post(routeName, {
    preserveState: true,
    onSuccess: () => emit('close'),
  });
};

/**
 * Toggle Status
 */
const updateStatus = () => {
  if (!form.id) return;

  form.post(route('admin.investment.status', form.id), {
    preserveState: true,
    onSuccess: () => emit('close'),
  });
};
</script>

<template>
  <Modal
    :show="show"
    :max-width="maxWidth"
    :closeable="closeable"
    @close="emit('close')"
  >
    <SectionCard class="rounded-2xl shadow-xl">

      <!-- HEADER -->
      <div class="flex items-center justify-between px-6 py-4 border-b">
        <div class="flex items-center gap-3">
          <div class="h-10 w-10 flex items-center justify-center rounded-full bg-primary/10">
            <Icon icon="mdi:briefcase-outline" class="text-xl text-primary" />
          </div>

          <h2 class="text-lg font-semibold">
            {{ form.id ? 'Edit Plan' : 'Create Plan' }}
          </h2>
        </div>

        <Icon
          icon="mdi:close"
          class="text-2xl cursor-pointer hover:text-red-500 transition"
          @click="emit('close')"
        />
      </div>

      <!-- BODY -->
      <div class="px-6 py-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

          <!-- Plan Name -->
          <TextInput
            label="Plan Name"
            placeholder="Enter plan name"
            v-model="form.name"
            :error="form.errors.name"
          />

          <!-- Amount -->
          <TextInput
            label="Amount"
            type="number"
            placeholder="Enter amount"
            v-model="form.amount"
            :error="form.errors.amount"
          />

        </div>
      </div>

      <!-- FOOTER -->
      <div class="flex items-center justify-between px-6 py-4 border-t">

        <!-- Status Buttons -->
        <div>
          <Button
            v-if="form.id && form.status == 1"
            intent="danger"
            size="sm"
            @click="updateStatus"
          >
            Disable
          </Button>

          <Button
            v-if="form.id && form.status == 0"
            intent="success"
            size="sm"
            @click="updateStatus"
          >
            Enable
          </Button>
        </div>

        <!-- ACTIONS -->
        <div class="flex gap-2">
          <Button
            intent="secondary"
            size="sm"
            @click="emit('close')"
          >
            Cancel
          </Button>

          <Button
            intent="primary"
            size="sm"
            :processing="form.processing"
            :disabled="form.processing"
            @click="submit"
          >
            Save Plan
          </Button>
        </div>

      </div>

    </SectionCard>
  </Modal>
</template>