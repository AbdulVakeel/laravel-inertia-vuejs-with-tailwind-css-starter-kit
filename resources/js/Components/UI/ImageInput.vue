<script setup>

defineProps({
	id: { type: String, default: 'image' },
	accept: { type: String, default: 'image/*' },
	multiple: { type: Boolean, default: false },
	label: { type: String, default: 'Select File' },
	helpText: { type: String },
	icon: { type: String, default: 'image' },
	class: { type: String },
	wrapperClass: { type: String },
	error: { type: String },
    labelClass: { type: String },
    defaultImageUrl: { type: String },

});

const emit = defineEmits('onImageSelected');

const imagePreview = ref(null);
const imageInput = ref(null);

const selectNewImage = () => {
	imageInput.value.click();
};
const udpateImagePreview = () => {
	const photo = imageInput.value.files[0];
	if (!photo) return;
	emit('onImageSelected', imageInput.value);

	const reader = new FileReader();
	reader.onload = (e) => {
		imagePreview.value = e.target.result;
	};
	reader.readAsDataURL(photo);
};

const dragover = (event) => {
	event.preventDefault();
	if (!event.currentTarget.classList.contains('bg-primary-300')) {
		event.currentTarget.classList.remove('bg-secondary-100');
		event.currentTarget.classList.add('bg-primary-300');
	}
};

const dragleave = (event) => {
	event.currentTarget.classList.add('bg-secondary-100');
	event.currentTarget.classList.remove('bg-primary-300');
};

const drop = (event) => {
	event.preventDefault();
	imageInput.value.files = event.dataTransfer.files;
	this.handleFileSelected(event);
	event.currentTarget.classList.add('bg-secondary-100');
	event.currentTarget.classList.remove('bg-primary-300');
};
</script>

<template>
	<div class="flex items-center mt-5">
		<div class="shrink-0">
			<span
				class="h-20 w-20 rounded-full inline-flex items-center justify-center border border-dashed border-secondary-light/60 overflow-hidden">
				<img class="h-14 w-auto object-contain"  alt="default image "
				:src="imagePreview ?? defaultImageUrl ?? '/img/default-img.png'" />
			</span>
		</div>

		<div class="ml-7">
			<input ref="imageInput" type="file" class="hidden" @change="udpateImagePreview" />
			<Button as="button" size="sm" intent="primary-outline" @click="selectNewImage">
				<Icon name="upload" class="h-5 mr-2 fill-primary group-hover:fill-secondary-dark" />
				<span :class="labelClass">{{ label }}</span>
			</Button>
			<p class="text-xs text-light font-semibold mt-1 ml-1">{{ helpText }}</p>
			<p class="text-xs text-danger mt-1 ml-1" v-if="error">{{ error }}</p>
		</div>
	</div>
</template>
