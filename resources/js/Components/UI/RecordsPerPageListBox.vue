<script setup>
const { recordsPerPage } = defineProps({
	recordsPerPage: {
		type: Array,
		default: [
			{ value: 5, label: '5 per page' },
			{ value: 25, label: '25 per page' },
			{ value: 50, label: '50 per page' },
			{ value: 100, label: '100 per page' },
			{ value: 500, label: '500 per page' },
		],
	},
});
</script>
<template>
	<ListBoxInput placeholder="Select Pages" :options="recordsPerPage" />
</template>
