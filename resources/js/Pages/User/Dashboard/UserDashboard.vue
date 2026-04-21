<script setup>

/*=========================================================================================
  File Name: user dashboard
  
  ----------------------------------------------------------------------------------------
  Author: Abdul Vakeel
  Author URL: https://www.skycodelab.in/
==========================================================================================*/

import userDashboardComponents from './Partials/userDashboardComponents.vue';
const pageTitle = computed(() => data.value.pageTitle);

const data = computed(() => usePage().props.data);

const editor = ref();

</script>
<template>

	 <Head :title="__(pageTitle)"/>
    <AppContainer>
        <PageHeading>
			<template #title>{{ __(pageTitle) }}</template>
			
		</PageHeading>
		<userDashboardComponents :data="data" />
	
	</AppContainer>
</template>
