<script setup>
// import Label from '@/Components/UI/Label.vue'
</script>

<template>
	<div :class="wrapperClass">
		<Label :for="id" :label-class="labelClass" :value="label" >
			<slot></slot>
		</Label>
		<textarea
			:id="id"
			ref="input"
			v-bind="$attrs"
			class="form-input"
			:class="{
				'border-red-300 focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50 rounded-md shadow-sm':
					error,
			}"
			:value="modelValue"
			@input="$emit('update:modelValue', $event.target.value)" />
		<div v-if="error" class="text-red-500">{{ error }}</div>
	</div>
</template>

<script>
export default {
	inheritAttrs: false,
	emits: ['update:modelValue'],

	props: {
		id: {type: String},
		modelValue: String,
		label: String,
		error: String,
		wrapperClass: { type: String, default: 'py-2' },
		labelClass: String,
	},
	methods: {
		focus() {
			this.$refs.input.focus();
		},
		select() {
			this.$refs.input.select();
		},
	},
};
</script>
