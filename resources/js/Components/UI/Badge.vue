<script setup>
import { cva } from 'class-variance-authority';

const props = defineProps({
	type: {
		type: String,
		validator(value) {
			return ['info', 'success', 'danger', 'warning', 'default'].includes(value);
		},
		default: 'default',
	},
});

const containerClass = computed(() => {
	return cva('px-2.5 py-0.5 rounded whitespace-nowrap', {
		variants: {
			type: {
				info: 'bg-info-light',
				success: 'bg-success-light',
				warning: 'bg-warning-light',
				danger: 'bg-danger-light',
				"primary-light": 'bg-danger-light',
				default: 'bg-secondary-lighter dark:bg-secondary-dark border-2 dark:border-0',
			},
		},
	})({
		type: props.type,
	});
});

const contentClass = computed(() => {
	return cva('text-xs font-semibold dark:font-semibold', {
		variants: {
			type: {
				info: 'text-info-darker',
				success: 'text-success-darker',
				warning: 'text-warning-darker',
				danger: 'text-danger-darker',
				default: 'text-secondary-darker dark:text-white',
			},
		},
	})({
		type: props.type,
	});
});
</script>

<template>
	<span :class="[containerClass, contentClass]">
		<slot></slot>
	</span>
</template>
