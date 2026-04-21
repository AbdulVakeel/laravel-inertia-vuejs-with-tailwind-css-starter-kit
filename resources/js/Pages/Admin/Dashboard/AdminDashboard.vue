<script setup>

/*=========================================================================================
  File Name: admin dashboard
  
  ----------------------------------------------------------------------------------------
  Author: Abdul Vakeel
  Author URL: https://www.skycodelab.in/
==========================================================================================*/


import UserWidget from './Partials/UserWidget.vue';

const pageTitle = computed(() => data.value.pageTitle);
const app = computed(() => usePage().props.app);

const data = computed(() => usePage().props.data);
</script>

<template>

	 <Head :title="__(pageTitle)"/>
    <AppContainer>
        <PageHeading>
			<template #title>{{ __(pageTitle) }}</template>
			
		</PageHeading>

		<div>
			<UserWidget />
		</div>

		

	</AppContainer>
</template>
<script>
import Layout from '@/Layouts/AdminLayout.vue';
import { defineComponent } from 'vue';

export default defineComponent({
	layout: Layout,
});
</script>
