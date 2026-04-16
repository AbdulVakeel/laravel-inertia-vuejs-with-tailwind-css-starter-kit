<template>
	<div
		:class="[
			'group cursor-pointer w-full text-3xl p-1 relative bg-light appearance-none border border-secondary-400 border-solid rounded-md hover:shadow-outline-gray hover:bg-primary-600 flex items-center justify-center',
			wrapperClass,
		]"
		@dragover="dragover"
		@dragleave="dragleave"
		@drop="drop">
		<input
			type="file"
			v-bind="$attrs"
			:name="id"
			:id="id"
			:multiple="multiple"
			:accept="accept"
			class="absolute inset-0 z-50 m-0 p-0 w-full h-full outline-none opacity-0"
			@change="handleFileSelected"
			ref="file" />
		<div class="flex items-center justify-center text-secondary-700">
			<Icon :name="icon" class="h-6 text-primary-600 group-hover:text-white stroke-2" />
			<p class="text-sm group-hover:text-white">{{ label }}</p>
		</div>
	</div>
</template>

<script setup>
import Icon from '@/Components/UI/Icon.vue';
</script>

<script>
export default {
	props: {
		id: { type: String, default: 'image' },
		accept: { type: String, default: 'image/*' },
		multiple: { type: Boolean, default: false },
		label: { type: String, default: 'Select File' },
		icon: { type: String, default: 'image' },
		class: String,
		wrapperClass: String,
	},

	data() {
		return {
			filelist: [], // Store our uploaded files
			previewList: [],
			images: [],
		};
	},
	methods: {
		handleFileSelected(event) {
			this.$emit('onFileSelected', event.target);
		},

		dragover(event) {
			event.preventDefault();
			// Add some visual fluff to show the user can drop its files
			if (!event.currentTarget.classList.contains('bg-primary-300')) {
				event.currentTarget.classList.remove('bg-secondary-100');
				event.currentTarget.classList.add('bg-primary-300');
			}
		},
		dragleave(event) {
			// Clean up
			event.currentTarget.classList.add('bg-secondary-100');
			event.currentTarget.classList.remove('bg-primary-300');
		},
		drop(event) {
			event.preventDefault();
			this.$refs.file.files = event.dataTransfer.files;
			this.handleFileSelected(event); // Trigger the onFileSelected event manually
			// Clean up
			event.currentTarget.classList.add('bg-secondary-100');
			event.currentTarget.classList.remove('bg-primary-300');
		},
	},

	emits: ['onFileSelected'],
};
</script>
