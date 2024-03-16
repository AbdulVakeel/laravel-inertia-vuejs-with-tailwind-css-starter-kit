<script setup>
import { cva } from 'class-variance-authority';
import { Switch, SwitchGroup, SwitchLabel } from '@headlessui/vue';

const { modelValue, label, name, value, size } = defineProps({
	modelValue: [Boolean, String, Number],
	label: String,
	name: [String, Number],
	value: [String, Number],
	size: { type: String, default: 'default' },
});

defineEmits(['update:modelValue']);

const bgSizeClasses = computed(() => {
	return cva('', {
		variants: {
			size: {
				// lg: 'p-2 m-0 text-md',
				default: 'h-6 w-11',
				sm: 'h-4 w-9',
				xs: 'h-2 w-6',
			},
		},
	})({
		size: size,
	});
});

const btnSizeClasses = computed(() => {
	return cva('', {
		variants: {
			size: {
				default: 'h-5 w-5 ',
				sm: 'h-3 w-3',
				xs: 'h-3 w-3',
			},
		},
	})({
		size: size,
	});
});
</script>
<template>
	<SwitchGroup as="div" class="flex items-center">
		<Switch
			:name="name"
			:value="value"
			:model-value="!!modelValue"
			@update:modelValue="$emit('update:modelValue', $event)"
			:class="[
				modelValue ? 'bg-primary' : 'bg-secondary-light/50',
				'relative inline-flex flex-shrink-0 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus:ring-1 focus:ring-offset-1 focus:ring-primary-600',
				bgSizeClasses,
			]">
			<span
				aria-hidden="true"
				:class="[
					modelValue ? 'translate-x-5' : 'translate-x-0',
					'pointer-events-none inline-block rounded-full bg-white shadow transform ring-0 transition ease-in-out duration-200',
					btnSizeClasses,
				]" />
		</Switch>		
			<SwitchLabel as="span" class="ml-3 cursor-pointer">
				{{ label }}
				<slot></slot>
			</SwitchLabel>
		
	</SwitchGroup>
</template>
