<script setup>
import { cva } from 'class-variance-authority';

const { type, as, intent, shadow, size, processing } = defineProps({
	as: { type: String },
	intent: { type: String, default: 'primary' },
	shadow: { type: String },
	size: { type: String, default: 'default' },
	processing: { type: Boolean, default: false },
});

const processingClasses = computed(() => (processing ? 'opacity-25' : ''));

const buttonClass = computed(() => {
	return cva(
		'inline-flex items-center justify-center font-semibold border-transparent focus:outline-none focus:ring-2 focus:ring-opacity-75 transition-all duration-300 disabled:opacity-25 rounded-lg group',
		{
			variants: {
				intent: {
					primary:
						'bg-primary text-secondary-darker dark:text-secondary-lighter border-primary hover:bg-primary-dark focus:ring-primary active:bg-primary',
					'primary-light':
						'text-primary hover:text-primary-dark bg-white dark:bg-secondary-dark ring-1 ring-secondary-darker/10 dark:ring-secondary-light/20',
					'primary-outline':
						'bg-transparent text-primary border border-primary hover:bg-primary hover:text-secondary-darker active:border-none focus:border-none',
					info: 'bg-info-light text-info-darker focus:ring-info-light active:bg-info-light',
						'info-light':
						'text-info/50 hover:text-info bg-white dark:bg-info/10 ring-1 ring-secondary-darker/10 dark:ring-secondary-light/20',
					success:
						'bg-success-light text-success-darker focus:ring-success-light active:bg-success-light hover:bg-success',
					'success-light':
						'text-success/50 hover:text-success bg-white dark:bg-success/10 ring-1 ring-secondary-darker/10 dark:ring-secondary-light/20',
					warning: 'bg-warning-light text-warning-darker focus:ring-warning-light active:bg-warning-light',
					danger: 'bg-danger text-danger-lighter focus:ring-danger-light active:bg-danger-light hover:bg-danger-dark',
					'danger-light':
						'text-danger/50 hover:text-danger bg-white dark:bg-danger/10 ring-1 ring-danger-darker/10 dark:ring-danger-light/20',
					light:
						'bg-secondary-light/10 text-secondary dark:text-secondary-light hover:text-primary dark:hover:text-secondary-lighter active:border-none focus:border-none dark:bg-secondary',
					text: 'bg-transparent text-secondary dark:text-secondary-light hover:text-primary dark:hover:text-secondary-lighter active:border-none focus:border-none dark:bg-transparent border-none dark:border-none appearance-none',
					dark: 'bg-secondary-lighter dark:bg-secondary-dark border-2 dark:border-0',
					default:
						'bg-transparent text-primary dark:text-primary hover:bg-primary-dark/10 active:border-none focus:border-none focus:ring-0',
								},
				shadow: {
					primary: 'shadow-md dark:shadow-primary/50',
					info: 'shadow-md dark:shadow-info/50',
					success: 'shadow-md dark:shadow-success/50',
					danger: 'shadow-md dark:shadow-danger/50',
					warning: 'shadow-md dark:shadow-warning/50',
				},
			},
		}
	)({
		intent: intent,
		shadow: shadow,
	});
});

const sizeClass = computed(() => {
	return cva('', {
		variants: {
			size: {
				default: 'py-2 px-2 md:px-4 text-sm md:text-base',
				sm: 'py-1.5 px-2 text-sm',
				xs: 'p-1 m-0 text-xs',
			},
		},
	})({
		size: size,
	});
});
</script>

<template>
	<button v-if="as == 'button'" v-wave :class="[buttonClass, sizeClass, processingClasses]">
		<Icon v-if="processing" name="loading" class="h-3 w-3 mr-1" />
		<slot />
	</button>

	<a v-else-if="as == 'a'" v-wave :class="[buttonClass, sizeClass, processingClasses]">
		<Icon v-if="processing" name="loading" class="h-3 w-3 mr-1" />
		<slot />
	</a>

	<Link v-else v-wave :class="[buttonClass, sizeClass, processingClasses]">
		<Icon v-if="processing" name="loading" class="h-3 w-3 mr-1" />
		<slot />
	</Link>
</template>
