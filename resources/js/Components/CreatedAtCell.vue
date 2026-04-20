<template>
  <div class="px-2 py-2">
    <p class="text-sm whitespace-nowrap">{{ timeAgo(item.created_at) }}</p>
    <p class="text-xs text-gray-500">{{ formattedDateTime(item.created_at) }}</p>
  </div>
</template>

<script setup>
import { defineProps } from 'vue';
import useHelpersDate from '../Utils/useHelpersDate.js';
const { formattedDateTime, timeAgo } = useHelpersDate();
const props = defineProps({
  item: Object, 
});
</script>
