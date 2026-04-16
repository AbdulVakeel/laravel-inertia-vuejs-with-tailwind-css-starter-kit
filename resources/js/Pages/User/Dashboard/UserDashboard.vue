<script setup>

/*=========================================================================================
  File Name: user dashboard
  
  ----------------------------------------------------------------------------------------
  Author: Sky Code Lab
  Author URL: https://www.skycodelab.io/
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
