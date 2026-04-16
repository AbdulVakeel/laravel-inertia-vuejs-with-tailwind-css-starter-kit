<script setup>
defineProps({
	id: { type: String },
	type: { type: String, default: 'text' },
	modelValue: [String, Number],
	label: String,
	error: String,
	wrapperClass: { type: String, default: 'py-2' },
	labelClass: String,
	inputClass: String,
	horizontal: { type: Boolean, default: false },
	prependText: String,
	help: String,
});

defineEmits(['update:modelValue']);

const input = ref(null);

onMounted(() => {
	if (input.value.hasAttribute('autofocus')) {
		input.value.focus();
	}
});

defineExpose({ focus: () => input.value.focus() });
</script>

<template>
	<div :class="[horizontal ? 'flex items-center' : '', wrapperClass]">
		<slot name="label">
			<Label :for="id" :label-class="labelClass" :value="label">
				<slot></slot>
			</Label>
		</slot>
		<input
			:id="id"
			:name="id"
			ref="input"
			v-bind="$attrs"
			:type="type"
			:value="modelValue"
			:class="[
				'form-input',
				inputClass,
				error
					? 'border-rose-300 focus:border-rose-300 focus:ring focus:ring-rose-200 focus:ring-opacity-50 shadow-sm'
					: '',
			]"
			@input="$emit('update:modelValue', $event.target.value)" />
		<p v-if="help" class="text-light text-xs mt-2 ml-1">{{ help }}</p>
		<p v-if="error" class="text-danger dark:text-danger text-xs mt-2 ml-1">{{ error }}</p>
	</div>
</template>
