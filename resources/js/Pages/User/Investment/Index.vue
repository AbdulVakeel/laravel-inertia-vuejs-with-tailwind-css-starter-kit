<script setup>
import Plans from './Partials/Plans.vue';


const data = computed(() => usePage().props.data);

</script>

<template>
	<Head :title="data.pageTitle" />
	<AppContainer>
		<PageHeading>
			<template #title>{{ __(data.pageTitle) }}</template>
		</PageHeading>

		<Plans />
	

		<div class="my-10">
		
		</div>
	</AppContainer>
</template>
