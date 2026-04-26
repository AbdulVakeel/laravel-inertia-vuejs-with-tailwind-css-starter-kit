<template>
  <div :class="gridClasses">
    <slot></slot>
  </div>
</template>

<script setup>
import { computed } from 'vue';
const { gap = 'gap-2', marginBottom = 'mb-4', columns = 'grid-cols-1' } = defineProps({
  gap: String, 
  marginBottom: String, 
  columns: String,
});
const gridClasses = computed(() => [
  'grid',
  columns,
  `md:${columns}`,
  gap,
  marginBottom,
]);
</script>

