<script setup>
import { ref, defineProps, defineEmits, onMounted, defineExpose } from 'vue';

defineProps({
	id: { type: String },
	type: { type: String, default: 'text' },
	modelValue: [String, Number],
	label: String,
	error: String,
	wrapperClass: { type: String, default: 'py-2' },
	labelClass: String,
	horizonal: { type: Boolean, default: false },
});

defineEmits(['update:modelValue', 'onChange']);

const input = ref(null);

onMounted(() => {
	if (input.value.hasAttribute('autofocus')) {
		input.value.focus();
	}
});

defineExpose({ focus: () => input.value.focus() });
</script>

<template>
  <div :class="wrapperClass">
    <label v-if="label" :for="id" class="text-gray-500 placeholder:text-gray-400" :class="labelClass">
      {{ label }}
    </label>
    <select
      class="form-select text-gray-500 placeholder:text-gray-400 w-full p-2 border rounded-md"
      :class="{
        'border-rose-300 focus:border-rose-300 focus:ring focus:ring-rose-200 focus:ring-opacity-50 shadow-sm': error,
      }"
			:id="id"
			:name="id"
			:value="modelValue"
			@input="$emit('update:modelValue', $event.target.value)"
			@change="$emit('onChange', $event.target.value)"
			ref="input"
			v-bind="$attrs">
			<slot />
		</select>
		<div v-if="error" class="text-xs text-danger">{{ error }}</div>
	</div>
</template>

