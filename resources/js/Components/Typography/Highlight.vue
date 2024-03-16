<script setup>

import { cva } from 'class-variance-authority';


const textClass = computed(() => {
	return cva(
		'inline-flex items-center justify-center font-semibold border-transparent focus:outline-none focus:ring-2 focus:ring-opacity-75 transition-all duration-300 disabled:opacity-25 rounded-lg',
		{
			variants: {
				intent: {
					primary:
						'bg-primary text-secondary-darker border-primary hover:bg-primary-dark focus:ring-primary active:bg-primary',
					'primary-light':
						'text-primary hover:text-primary-dark bg-white dark:bg-secondary-dark ring-1 ring-secondary-darker/10 dark:ring-secondary-light/20',
					info: 'bg-info-light text-info-darker focus:ring-info-light active:bg-info-light',
					success: 'bg-success-light text-success-darker focus:ring-success-light active:bg-success-light',
					warning: 'bg-warning-light text-warning-darker focus:ring-warning-light active:bg-warning-light',
					danger: 'bg-danger text-danger-lighter focus:ring-danger-light active:bg-danger-light',
					light:
						'bg-secondary-light/5 text-secondary dark:text-secondary-light hover:text-primary dark:hover:text-secondary-lighter active:border-none focus:border-none dark:bg-secondary',
					dark: 'bg-secondary-lighter dark:bg-secondary-dark border-2 dark:border-0',
					default:
						'bg-transparent text-primary dark:text-primary hover:bg-primary-dark/10 active:border-none focus:border-none focus:ring-0',
				},
			},
		}
	)({
		intent: intent,
	});
});
</script>
<template>
	<span class="text-info font-semibold">
		<slot />
	</span>
</template>
