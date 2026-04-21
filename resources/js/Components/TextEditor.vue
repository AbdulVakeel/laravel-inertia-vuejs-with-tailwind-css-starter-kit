<template>
	<div class="mb-4">
		<!-- Render Label -->
		<label 
			:for="id" 
			class="block text-sm font-medium mb-1 text-gray-700 dark:text-white"
			v-if="label"
		>
			{{ label }}
		</label>

		<!-- Contenteditable Section -->
		<div 
			:id="id"
			contenteditable="true"
			:placeholder="placeholder"
			class="p-4 rounded-md bg-white dark:text-white dark:bg-secondary-dark text-black focus:outline-none border border-gray-300 dark:border-gray-700"
			@input="onInput"
			ref="editor"
		></div>

		<!-- Render Error Message -->
		<p v-if="error" class="text-sm text-red-500 mt-1">{{ error }}</p>
	</div>
</template>

<script>
export default {
	props: {
		modelValue: { type: String, required: true },
		id: { type: String, required: true },
		label: { type: String, required: true },
		placeholder: { type: String, default: '' },
		error: { type: String, default: '' },
	},
	methods: {
		onInput(event) {
			this.$emit('update:modelValue', event.target.innerHTML);
		},
	},
	mounted() {
		this.$refs.editor.innerHTML = this.modelValue;
	},
};
</script>
