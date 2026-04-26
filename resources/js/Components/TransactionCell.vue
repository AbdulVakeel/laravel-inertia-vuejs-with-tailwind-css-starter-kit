<template>
		<p class="text-[14px]">
	  {{ item.transaction_id }}
	</p>
  </template>
  
  <script setup>
  import { defineProps } from 'vue';
  
  const props = defineProps({
	item: Object, 
  });
  
  </script>
