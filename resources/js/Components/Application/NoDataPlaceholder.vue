<template>
	<Link
		:href="route"
		class="group relative block w-full border-2 border-secondary-300 border-dashed rounded-lg p-12 text-center hover:border-primary-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
		<svg
			class="mx-auto h-12 w-12 text-secondary-400 group-hover:text-primary-400"
			xmlns="http://www.w3.org/2000/svg"
			fill="none"
			viewBox="0 0 24 24"
			stroke="currentColor">
			<path
				stroke-linecap="round"
				stroke-linejoin="round"
				stroke-width="2"
				d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
		</svg>
		<span class="mt-2 block text-md font-medium text-secondary-600 group-hover:text-primary">{{ label }}</span>
	</Link>
</template>

<script setup>
defineProps({
	label: String,
	show: Boolean,
	route: String,
});
</script>

<style lang="scss" scoped></style>
