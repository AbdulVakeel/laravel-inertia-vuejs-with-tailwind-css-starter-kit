<template>
  <div class="table-cell">
    <!-- Low Priority -->
    <div
      v-if="item.priority === 1"
      class="flex items-center gap-2 px-2 py-1 text-sm font-semibold text-green-800 bg-green-100 rounded-md border border-green-200 dark:bg-green-900/50 dark:text-green-300"
    >
      <Icon icon="mdi:arrow-down-bold" class="text-sm" />
      {{ 'Low' }}
    </div>

    <!-- Medium Priority -->
    <div
      v-else-if="item.priority === 2"
      class="flex items-center gap-2 px-2 py-1 text-sm font-semibold text-yellow-800 bg-yellow-100 rounded-md border border-yellow-200 dark:bg-yellow-900/50 dark:text-yellow-300"
    >
      <Icon icon="mdi:arrow-up-bold" class="text-sm" />
      {{ 'Medium' }}
    </div>

    <!-- High Priority -->
    <div
      v-else-if="item.priority === 3"
      class="flex items-center gap-2 px-2 py-1 text-sm font-semibold text-red-800 bg-red-100 rounded-md border border-red-200 dark:bg-red-900/50 dark:text-red-300"
    >
      <Icon icon="mdi:alert-circle-outline" class="text-sm" />
      {{ 'High' }}
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
