<script setup>
const emit = defineEmits(['openMobileMenu']);

const handleOpen = () => {
	emit('openMobileMenu');
};
</script>
<template>
	<button
		@click="handleOpen"
		type="button"
		class="px-4 focus:outline-none md:hidden text-secondary dark:text-secondary-light hover:text-primary dark:hover:text-primary btn-sm py-1.5 text-xs hover:btn-light">
		<span class="sr-only">Open sidebar</span>
		<Icon name="humburger" class="h-4 hover:fill-primary" />
	</button>
</template>
<style scoped></style>
