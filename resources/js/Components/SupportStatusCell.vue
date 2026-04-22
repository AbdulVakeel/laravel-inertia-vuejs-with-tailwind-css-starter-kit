<template>
  <div class="table-cell">
    <!-- Open -->
    <div
      v-if="item.status === 0"
      class="flex items-center gap-2 px-2 py-1 text-sm font-semibold text-blue-800 bg-blue-100 rounded-md border border-blue-200 dark:bg-blue-900/50 dark:text-blue-300"
    >
      <Icon icon="mdi:ticket-outline" class="text-sm" />
      {{ 'Open' }}
    </div>

    <!-- Answered -->
    <div
      v-else-if="item.status === 1"
      class="flex items-center gap-2 px-2 py-1 text-sm font-semibold text-green-800 bg-green-100 rounded-md border border-green-200 dark:bg-green-900/50 dark:text-green-300"
    >
      <Icon icon="line-md:uploading-loop" class="text-sm" />
      {{ 'Answered' }}
    </div>

    <!-- Customer Reply -->
    <div
      v-else-if="item.status === 2"
      class="flex items-center gap-2 px-2 py-1 text-sm font-semibold text-orange-800 bg-orange-100 rounded-md border border-orange-200 dark:bg-orange-900/50 dark:text-orange-300"
    >
      <Icon icon="mdi:reply" class="text-sm" />
      {{ 'Customer Reply' }}
    </div>

    <!-- Closed -->
    <div
      v-else-if="item.status === 3"
      class="flex items-center gap-2 px-2 py-1 text-sm font-semibold text-red-800 bg-red-100 rounded-md border border-red-200 dark:bg-red-900/50 dark:text-red-300"
    >
      <Icon icon="zondicons:close-solid" class="text-sm" />
      {{ 'Closed' }}
    </div>
  </div>
</template>

<script setup>
import { defineProps } from 'vue';
import { Icon } from '@iconify/vue';

const props = defineProps({
  item: Object,
});
</script>
