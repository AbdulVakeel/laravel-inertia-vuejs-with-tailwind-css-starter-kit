<script setup>
import { computed } from 'vue';
import { cva } from 'class-variance-authority';

const { variant } = defineProps({
	variant: { type: String, default: 'default' },
});

const containerClass = computed(() => {
	return cva('dark:rounded-2xl rounded-2xl ', {
		variants: {
			variant: {
				default: 'bg-white dark:bg-gray-800 rounded-lg shadow-lg border border-violet-200/20',
				danger: 'bg-danger-lighter dark:shadow-danger-50/10 dark:shadow shadow-md text-danger-darker',
	},
		},
	})({
		variant: variant,
	});
});
</script>
<template>
	<article :class="[containerClass]">
		<slot></slot>
	</article>
</template>
