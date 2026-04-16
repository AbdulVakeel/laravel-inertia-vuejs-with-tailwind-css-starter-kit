<script setup>
const props = defineProps({
	items: [Array, Object],
	modelValue: [String, Number, Array],
	showTotalPages: { type: Boolean, default: true },
});
const emit = defineEmits(['update:modelValue']);
</script>
<template>
	<div
		:class="[
			'my-1 px-5 py-3 flex flex-col md:flex-row gap-5 items-center  border-t border-secondary-light/20 dark:border-none',
			showTotalPages ? 'justify-between' : 'justify-end',
		]">
		<!-- Rows per page -->
		<div class="flex flex-col md:flex-row items-center space-x-2" v-if="showTotalPages">
			<div class="whitespace-nowrap">
				<RecordsPerPageListBox
					:model-value="props.modelValue"
					@update:modelValue="(value) => emit('update:modelValue', value)" />

				<p class="text-xs text-secondary-light ml-1">
					<span class="font-semibold">{{ items.to }}</span>
					{{ ' ' }}
					to
					{{ ' ' }}
					<span class="font-semibold">{{ items.from }}</span>
					{{ ' ' }}
					of
					{{ ' ' }}
					<span class="font-semibold">{{ items.total }}</span>
					{{ ' ' }}
					results
				</p>
			</div>
		</div>
		<!-- Pagination -->
		<div class="-mt-2">
			<Pagination :links="items.links" />
		</div>
	</div>
</template>
<style scoped></style>
