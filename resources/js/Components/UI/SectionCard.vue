<script setup>
import { cva } from 'class-variance-authority';

const { variant } = defineProps({
	variant: { type: String, default: 'default' },
});

const containerClass = computed(() => {
	return cva('', {
		variants: {
			variant: {
				default: 'bg-white dark:bg-secondary-dark dark:shadow-gray-50/10 dark:shadow shadow-md',
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
