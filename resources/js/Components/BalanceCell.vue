<template>
	<p class="text-[14px]">
	  {{ formatCurrencySymbol(item.balance) }}
	</p>
  </template>
  
  <script setup>
  import { defineProps } from 'vue';
  import useCurrencyFormatter from '../Composables/useCurrencyFormatter.js'; 
  
  const props = defineProps({
	item: Object, 
  });
  
  const { formatCurrencySymbol } = useCurrencyFormatter();
  </script>
