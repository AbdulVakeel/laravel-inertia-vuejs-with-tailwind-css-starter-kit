<script setup>
import { computed } from 'vue';
import { Listbox, ListboxButton, ListboxOption, ListboxOptions } from '@headlessui/vue';

const props = defineProps({
	options: Array,
	modelValue: [String, Number, Array],
	placeholder: { type: String, default: 'Select option' },
	multiple: Boolean,
	error: String,
	labelField: { type: String, default: 'label' },
	valueField: { type: String, default: 'value' },
});

const emit = defineEmits(['update:modelValue']);

const isObject = (val) => typeof val === 'object';

const optionValue = (option) => (isObject(option) ? option[props.valueField] : option);
const optionLabel = (option) => (isObject(option) ? option[props.labelField] : option);

const label = computed(() => {
	if (!props.options) return;
	return props.options
		.filter((option) => {
			if (Array.isArray(props.modelValue)) {
				return props.modelValue.includes(optionValue(option));
			}
			return props.modelValue === optionValue(option);
		})
		.map((option) => optionLabel(option))
		.join(', ');
});
</script>
<template>
	<Listbox
		:multiple="props.multiple"
		:model-value="props.modelValue"
		@update:modelValue="(value) => emit('update:modelValue', value)">
		<div class="relative">
			<ListboxButton
				class="border relative text-left pr-10 w-full rounded-lg cursor-default p-2  focus:border-primary/80 focus:outline-none focus:ring focus:ring-primary/20 focus:ring-opacity-50 shadow-sm disabled:bg-gray-50 disabled:text-secondary-light disabled:border-gray-200 disabled:shadow-none placeholder:text-gray-400  dark:focus:border-primary/80 dark:focus:ring dark:focus:ring-primary/20 dark:focus:ring-opacity-50 dark:shadow-sm dark:disabled:bg-gray-50 dark:disabled:text-secondary-light dark:disabled:border-gray-200 dark:disabled:shadow-none dark:placeholder:text-gray-400 dark:bg-secondary-dark dark:rounded-lg bg-white border-secondary-light/50 dark:border-secondary-light/30 ">
				
				<slot :name="`label`" :item="{ label }">
					<span v-if="label" class="block">{{ label }}</span>
					<span v-else class="text-secondary-light">{{ props.placeholder }}</span>
				</slot>

				<span class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-2">
					<Icon name="chevron-down" class="h-5 w-5 text-secondary-light" aria-hidden="true" />
				</span>
			</ListboxButton>

			<transition
				enter-active-class="transition ease-out duration-500"
				enter-class="transform opacity-0 scale-y-75"
				enter-to-class="transform opacity-100 scale-100"
				leave-active-class="transition ease-in duration-200"
				leave-class="transform opacity-100 scale-100"
				leave-to-class="transform opacity-0 scale-95">
				<ListboxOptions
					class="overflow-auto absolute z-10 py-1 mt-1 w-full max-h-60 text-base bg-light text-ligth rounded-md ring-1 ring-secondary-darker ring-opacity-5 shadow-lg focus:outline-none sm:text-sm rounded-b-lg dark:border border-secondary scrollbar-thin dark:scrollbar-thumb-secondary-darker scrollbar-thumb-secondary-light/20 hover:scrollbar-thumb-secondary-lighter scrollbar-rounded-lg overflow-y-scroll scrollbar-rounded scrollbar-w-1 scrollbar-h-1 ">
					<ListboxOption
						v-for="option in props.options"
						:key="optionLabel(option)"
						v-slot="{ active, selected }"
						:value="optionValue(option)"
						as="template">
						<slot :name="`listItem`" :item="{ ...option, active, selected }">
							<li :class="[active ? 'bg-dark ' : '', 'relative cursor-pointer select-none px-3 py-4 text-dark']">
								<span :class="[selected ? 'font-medium' : 'font-normal', 'block truncate']">
									{{ optionLabel(option) }}
								</span>
							</li>
						</slot>
					</ListboxOption>
				</ListboxOptions>
			</transition>
			<div class="text-xs text-red-400 mt-1" v-if="props.error">{{ props.error }}</div>
		</div>
	</Listbox>
</template>
