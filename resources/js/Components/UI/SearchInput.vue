<script setup>
import { onMounted, ref } from 'vue';

defineProps({
	modelValue: String,
	id: [String, Number],
});

defineEmits(['update:modelValue']);

const input = ref(null);

onMounted(() => {
	if (input.value.hasAttribute('autofocus')) {
		input.value.focus();
	}
});

defineExpose({ focus: () => input.value.focus() });
</script>

<script>
export default {
	name: 'SearchFilter',
};
</script>

<template>
	<div class="filter-input">
		<div class="relative">
			<input
				:value="modelValue"
				@input="$emit('update:modelValue', $event.target.value)"
				ref="input"
				autocomplete="off"
				type="search"
				v-bind="$attrs"
				:id="id"
				:name="id"
				class="dark:bg-secondary-dark dark:text-secondary-lighter  rounded-lg w-full text-secondary-dark  pl-10 pr-4 form-input" />

			<div class="absolute top-0 left-0 inline-flex items-center px-2 pt-2.5 pb-2">
				<svg
					xmlns="http://www.w3.org/2000/svg"
					class="w-6 h-5 text-secondary-light dark:text-secondary-light"
					viewBox="0 0 24 24"
					stroke-width="2"
					stroke="currentColor"
					fill="none"
					stroke-linecap="round"
					stroke-linejoin="round">
					<rect x="0" y="0" width="24" height="24" stroke="none"></rect>
					<circle cx="10" cy="10" r="7"></circle>
					<line x1="21" y1="21" x2="15" y2="15"></line>
				</svg>
			</div>
		</div>
	</div>
</template>
