<template>
	<div class="px-2 py-2">
    <p class="text-sm whitespace-nowrap">{{('Deposit')}} {{ formatCurrencySymbol(item.deposit_wallet) }}</p>
    <p class="text-sm whitespace-nowrap"> {{('Earnings')}} {{ formatCurrencySymbol(item.earning_wallet) }}</p>
  </div>
  </template>
  
  <script setup>
  import { defineProps } from 'vue';
  import useCurrencyFormatter from '../Composables/useCurrencyFormatter.js';

  const { formatCurrencySymbol } = useCurrencyFormatter();
  const props = defineProps({
	item: Object, 
  });
  

  </script>
