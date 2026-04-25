<template>
  <div class="table-cell">
    <div
      v-if="item.status == 1"
      class="flex items-center gap-2 px-2 py-1 text-sm font-semibold text-green-800 bg-green-100 rounded-md border border-green-200 dark:bg-green-900/50 dark:text-green-300"
    >
      <Icon icon="line-md:uploading-loop" class="text-sm" />
      {{ 'Active' }}
    </div>
    <div v-else>
      <div
        class="flex items-center gap-2 px-2 py-1 text-sm font-semibold text-red-800 bg-red-100 rounded-md border border-red-200 dark:bg-red-900/50 dark:text-red-300"
      >
        <Icon icon="zondicons:close-solid" class="text-sm" />
        {{ 'Inactive' }}
      </div>
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

