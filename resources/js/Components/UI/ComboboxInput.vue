<script setup>
import {
	Combobox,
	ComboboxInput,
	ComboboxButton,
	ComboboxOptions,
	ComboboxOption,
	TransitionRoot,
} from '@headlessui/vue';

defineEmits(['update:modelValue']);

const { options, modelValue, label, labelClass, error, id, placeholder, labelField, valueField, onChange } =
	defineProps({
		options: Array,
		modelValue: [String, Number, Array],
		label: String,
		labelClass: String,
		error: String,
		id: String,
		placeholder: String,
		wrapperClass: { type: String, default: 'py-2' },
		labelField: { type: String, default: 'label' },
		valueField: { type: String, default: 'value' },
		onChange: { type: Function },
	});

const isObject = (val) => typeof val === 'object';

const optionValue = (option) => (isObject(option) ? option[valueField] : option);
const optionLabel = (option) => (isObject(option) ? option[labelField] : option);
const displayValue = (option) =>
	isObject(option) ? optionLabel(options.find((item) => optionValue(item) === option)) : option;

// let query = ref('');

// let filteredOptions = computed(() =>
// 	query.value === ''
// 		? options
// 		: options.filter((option) => {
// 				return optionLabel(option)
// 					.toLowerCase()
// 					.replace(/\s+/g, '')
// 					.includes(query.value.toLowerCase().replace(/\s+/g, ''));
// 		  })
// );
</script>

<template>
	<div :class="wrapperClass">
		<slot name="label">
			<Label :for="id" :label-class="labelClass" :value="label">
				<slot></slot>
			</Label>
		</slot>
		<Combobox as="div" :model-value="modelValue" @update:modelValue="$emit('update:modelValue', $event)">
			<div class="relative">
				<ComboboxInput
					:id="id"
					:name="id"
					:placeholder="placeholder"
					v-bind="$attrs"
					autocomplete="off"
					class="w-full p-2 pr-5 border-gray-300 focus:border-primary/80 focus:ring focus:ring-primary/20 focus:ring-opacity-50 rounded-lg shadow-sm disabled:bg-gray-50 disabled:text-gray-500 disabled:border-gray-200 disabled:shadow-none placeholder:text-gray-400 dark:border-gray-700/90 dark:focus:border-primary/80 dark:focus:ring dark:focus:ring-primary/20 dark:focus:ring-opacity-50 dark:shadow-sm dark:disabled:bg-gray-50 dark:disabled:text-gray-500 dark:disabled:border-gray-200 dark:disabled:shadow-none dark:placeholder:text-gray-400 dark:bg-secondary-dark dark:rounded-lg"
					@change="onChange($event.target.value)"
					:displayValue="(option) => displayValue(option)" />

				<ComboboxButton class="absolute inset-y-0 right-0 flex items-center rounded-r-md px-2 focus:outline-none">
					<svg
						class="h-5 w-5 text-stone-600 focus:text-primary-500"
						aria-hidden="true"
						xmlns="http://www.w3.org/2000/svg"
						xmlns:xlink="http://www.w3.org/1999/xlink"
						viewBox="0 0 24 24">
						<g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
							<path d="M8 9l4-4l4 4"></path>
							<path d="M16 15l-4 4l-4-4"></path>
						</g>
					</svg>
				</ComboboxButton>

				<ComboboxOptions
					v-if="options.length > 0"
					class="overflow-auto absolute z-10 py-1 mt-1 w-full max-h-60 text-base bg-light text-ligth rounded-md ring-1 ring-secondary-darker ring-opacity-5 shadow-lg focus:outline-none sm:text-sm rounded-b-lg dark:border border-secondary scrollbar-thin dark:scrollbar-thumb-secondary-darker scrollbar-thumb-secondary-light/20 hover:scrollbar-thumb-secondary-lighter scrollbar-rounded-lg overflow-y-scroll scrollbar-rounded scrollbar-w-1 scrollbar-h-1">
					<ComboboxOption
						v-for="option in options"
						:key="optionValue(option)"
						:value="optionValue(option)"
						as="template"
						v-slot="{ active, selected }">
						<slot :name="`listItem`" :item="{ ...option, active, selected }">
							<li
								:class="[
									'relative cursor-default select-none py-2 pl-3 pr-9',
									active
										? 'bg-primary-light text-secondary-darker dark:text-secondary-darker font-semibold'
										: 'text-secondary-dark dark:text-secondary-light',
								]">
								<span :class="['block truncate', selected && 'font-semibold']">
									{{ optionLabel(option) }}
								</span>
							</li>
						</slot>
					</ComboboxOption>
				</ComboboxOptions>
			</div>
		</Combobox>

		<div v-if="error" class="text-red-500 text-sm">{{ error }}</div>
	</div>
</template>
