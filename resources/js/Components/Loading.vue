<script setup>
const { isLoading } = defineProps({
	isLoading: [Boolean],
});
</script>
<template>
	<div class="flex flex-col relative">
		<slot></slot>

		<Spinner
			v-if="isLoading"
			role="status"
			class="absolute -translate-x-1/2 -translate-y-1/2 top-2/4 left-1/2 w-full h-full inline-flex items-center justify-center bg-secondary/20 dark:bg-secondary-dark/80 dark:hover:bg-secondary/80" />
	</div>
</template>
<style scoped></style>
