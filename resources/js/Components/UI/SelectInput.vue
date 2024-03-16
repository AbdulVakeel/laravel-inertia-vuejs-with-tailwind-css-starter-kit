<script setup>
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
		<Label :for="id" :label-class="labelClass" :value="label" v-if="label || $slots.label">
			<slot name="label"></slot>
		</Label>

		<select
			class="form-select"
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

<script>
// export default {
// 	inheritAttrs: false,
// 	props: {
// 		id: { type: String },
// 		value: [String, Number, Boolean],
// 		modelValue: [String, Number, Boolean],
// 		label: String,
// 		error: String,
// 		wrapperClass: { type: String, default: 'py-2' },
// 		labelClass: String,
// 		horizonal: { type: Boolean, default: false },
// 	},

// 	emits: ['update:modelValue', 'onChange'],

// 	data() {
// 		return {
// 			selected: this.value,
// 		};
// 	},
// 	methods: {
// 		focus() {
// 			this.$refs.input.focus();
// 		},
// 		select() {
// 			this.$refs.input.select();
// 		},
// 	},
// };
</script>
