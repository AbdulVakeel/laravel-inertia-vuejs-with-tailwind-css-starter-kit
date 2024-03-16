<script setup>

const { item, show, maxWidth, closeable } = defineProps({
	item: [Array, Object],
	show: { type: Boolean, default: false },
	maxWidth: { type: String, default: 'xl' },
	closeable: { type: Boolean, default: true },
});

const emit = defineEmits(['close']);

const store = paymentManualGatewayStore();

const add = () => {
	store.addFormInput();
	store.resetFormElement();
	emit('close');
};

const closeModal = () => {
	store.resetFormElement();
	emit('close');
}

</script>
<template>
	<Modal :show="show" :max-width="maxWidth" :closeable="closeable" @close="closeModal">
		<SectionCard class="rounded-none dark:rounded-none">
			<div class="flex items-center justify-end w-full px-3 pt-3 cursor-pointer" @click="closeModal">
				<Icon name="close" class="h-7" />
			</div>
			<header class="border-b border-secondary/10 dark:border-secondary mb-5 -mt-5">
				<h1 class="px-14 mb-2 text-dark text-xl font-bold inline-flex items-center">
					<span class="inline-flex items-center justify-center h-12 w-12 rounded-full bg-primary/10 mr-4">
						<Icon name="form" class="h-5 text-primary" />
					</span>
					{{ __('Generate Form') }}
				</h1>
			</header>

			<main class="px-14 pb-7">
				<SelectInput :label="__('Form Type')" id="form_type" v-model="store.form_element.form_type" class="w-full">
					<option value="text">{{ __('Text') }}</option>
					<option value="textarea">{{ __('Textarea') }}</option>
					<option value="select">{{ __('Select') }}</option>
					<option value="checkbox">{{ __('Checkbox') }}</option>
					<option value="radio">{{ __('Radio') }}</option>
					<option value="file">{{ __('File') }}</option>
				</SelectInput>

				<SelectInput
					:label="__('Is required')"
					id="is_required"
					v-model="store.form_element.is_required"
					class="w-full">
					<option value="required">{{ __('Required') }}</option>
					<option value="optional">{{ __('Optional') }}</option>
				</SelectInput>

				<TextInput :label="__('Form Label')" id="form_label" v-model="store.form_element.form_label" class="w-full" />
			</main>

			<footer class="border-t border-secondary/10 dark:border-secondary pb-5">
				<div class="mt-3 flex items-center justify-end gap-x-3 px-14">
					<!-- <Button as="button" intent="light" @click="emit('close')">{{ __('No') }}</Button> -->
					<Button as="button" intent="primary" shadow="primary" @click="add">{{ __('Add') }}</Button>
				</div>
			</footer>
		</SectionCard>
	</Modal>
</template>
