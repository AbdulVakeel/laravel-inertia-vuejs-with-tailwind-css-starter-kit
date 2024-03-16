<script setup>
import { cva } from 'class-variance-authority';

const props = defineProps({
	intent: {
		type: String,
		validator(value) {
			return ['info', 'success', 'danger', 'warning', 'default'].includes(value);
		},
		default: 'default',
	},
	title: { type: String },
	show: { type: Boolean, default: true },
	onDismiss: { type: Function },

	dismissLabel: { type: String, default: 'Dismiss' },
});

const containerClass = computed(() => {
	return cva('px-4 py-3 rounded-md shadow', {
		variants: {
			intent: {
				info: 'bg-blue-100',
				success: 'bg-green-100',
				warning: 'bg-orange-100',
				danger: 'bg-red-100',
				default: 'bg-secondary-lighter dark:bg-secondary-dark border-2 dark:border-0',
			},
		},
	})({
		intent: props.intent,
	});
});

const iconWarpperClass = computed(() => {
	return cva('shrink-0 p-1 rounded-lg inline-flex items-center justify-center', {
		variants: {
			intent: {
				info: 'bg-blue-700/20',
				success: 'bg-green-600/20',
				warning: 'bg-orange-400/20',
				danger: 'bg-red-500/20',
				default: 'bg-primary/20',
			},
		},
	})({
		intent: props.intent,
	});
});

const iconClass = computed(() => {
	return cva('w-6 h-6', {
		variants: {
			intent: {
				info: 'text-blue-700',
				success: 'text-green-600',
				warning: 'text-orange-400',
				danger: 'text-red-500',
				default: 'text-primary',
			},
		},
	})({
		intent: props.intent,
	});
});

const titleClass = computed(() => {
	return cva('font-medium text-[15px]', {
		variants: {
			intent: {
				info: 'text-blue-900',
				success: 'text-green-900',
				warning: 'text-orange-900',
				danger: 'text-red-900',
				default: 'text-secondary-darker dark:text-white',
			},
		},
	})({
		intent: props.intent,
	});
});

const contentClass = computed(() => {
	return cva('text-sm', {
		variants: {
			intent: {
				info: 'text-blue-700',
				success: 'text-green-700',
				warning: 'text-orange-700',
				danger: 'text-red-700',
				default: 'text-secondary-darker dark:text-white',
			},
		},
	})({
		intent: props.intent,
	});
});

const closeButtonClass = computed(() => {
	return cva('p-0.5 rounded-md', {
		variants: {
			intent: {
				info: 'text-blue-900/70 hover:text-blue-900 hover:bg-blue-200 active:bg-blue-300',
				success: 'text-green-900/70 hover:text-green-900 hover:bg-green-200 active:bg-green-300',
				warning: 'text-orange-900/70 hover:text-orange-900 hover:bg-orange-200 active:bg-orange-300',
				danger: 'text-red-900/70 hover:text-red-900 hover:bg-red-200 active:bg-red-300',
				default: 'text-secondary-darker dark:text-white hover:text-secondary hover:bg-secondary-bg-secondary-lighter dark:hover:bg-secondary-light active:bg-secondary-light',
			},
		},
	})({
		intent: props.intent,
	});
});

const iconComponent = computed(() => {
	const icons = {
		success: 'check-circle-fill',
		info: 'information-circle',
		warning: 'exclamation-trianble',
		danger: 'close-circle',
		default: 'information-circle',
	};

	return icons[props.intent];
});

function dismiss() {
	if (props.onDismiss) {
		props.onDismiss();
	}
}
</script>

<template>
	<div v-if="props.show" :class="containerClass">
		<div class="flex items-center space-x-3">
			<!-- Alert Icon -->
			<div :class="iconWarpperClass">
				<Icon :name="iconComponent" :class="['h-5', iconClass]" />
			</div>

			<!-- Title -->
			<div class="flex-1">
				<h2 v-if="props.title" :class="titleClass">
					{{ props.title }}
				</h2>
			</div>

			<!-- Close Icon -->
			<div v-if="props.onDismiss" class="shrink-0">
				<button :title="dismissLabel" :aria-label="dismissLabel" :class="closeButtonClass" @click="dismiss()">
					<Icon name="close" class="w-5 h-5" />
				</button>
			</div>
		</div>

		<div class="min-w-0 mt-2 mx-2">
			<div class="flex items-center justify-between"></div>
			<div :class="contentClass">
				<slot />
			</div>
		</div>
	</div>
</template>
