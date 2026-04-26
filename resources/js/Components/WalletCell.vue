<template>
	<p class="text-[14px]">
	  {{ convert_Title(item.wallet) }}
	</p>
  </template>
  
  <script setup>
  import { defineProps } from 'vue';
  import useHelpers from '../Utils/useHelpers.js';
  
  const props = defineProps({
	item: Object, 
  });
  const { convert_Title } = useHelpers();

  </script>
