<script setup>

/*=========================================================================================
  File Name: admin dashboard
  
  ----------------------------------------------------------------------------------------
  Author: Sky Code Lab
  Author URL: https://www.skycodelab.io/
==========================================================================================*/


import UserWidget from './Partials/UserWidget.vue';


const app = computed(() => usePage().props.app);

const data = computed(() => usePage().props.data);
</script>

<template>

	<AppContainer>

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
