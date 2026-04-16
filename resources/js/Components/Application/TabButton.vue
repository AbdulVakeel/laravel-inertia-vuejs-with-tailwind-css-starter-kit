<script setup>
const { selected, icon, text } = defineProps({
	selected: [Boolean],
	icon: [String],
	text: [String],
});
</script>
<template>
	<button
		:class="[
			'inline-flex items-center justify-center font-semibold border-transparent focus:outline-none disabled:opacity-25 pb-2 hover:text-secondary-lighter dark:hover:text-secondary-lighter transition-all ease-in-out',
			selected ? 'text-dark border-b-2 border-primary transition-all duration-500 inline-block' : 'text-light',
		]">
		<Icon :name="icon" class="h-5 mr-3" />
		{{ text }}
	</button>
</template>
<style scoped></style>
