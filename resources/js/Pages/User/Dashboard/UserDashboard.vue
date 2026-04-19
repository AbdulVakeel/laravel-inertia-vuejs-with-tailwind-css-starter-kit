<script setup>

/*=========================================================================================
  File Name: user dashboard
  
  ----------------------------------------------------------------------------------------
  Author: Abdul Vakeel
  Author URL: https://www.skycodelab.in/
==========================================================================================*/

import userDashboardComponents from './Partials/userDashboardComponents.vue';

const data = computed(() => usePage().props.data);

const editor = ref();

</script>
<template>

	<AppContainer>
		<userDashboardComponents :data="data" />
	
	</AppContainer>
</template>
