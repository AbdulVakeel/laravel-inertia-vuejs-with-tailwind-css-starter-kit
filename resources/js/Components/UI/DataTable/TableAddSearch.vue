<script setup>
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';

const { searchInputs, onAdd } = defineProps({
	searchInputs: Array,
	onAdd: Function,
});
</script>

<template>
	<div class="order-3">
		<Dropdown align="right" width="48">
			<template #trigger>
				<button
					type="button"
					dusk="reset-table"
					class="w-full bg-white border rounded-md shadow-sm px-4 py-2 inline-flex justify-center text-sm font-medium text-gray-600 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 border-gray-300"
					aria-haspopup="true">
					<svg
						xmlns="http://www.w3.org/2000/svg"
						class="h-5 w-5 mr-2 text-gray-400"
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
				</button>
			</template>

			<template #content>
				<!-- <DropdownLink :href="route('profile.show')"> Profile </DropdownLink> -->
				<div class="block px-4 py-2 text-sm text-gray-600 cursor-pointer" v-for="input in searchInputs">
					{{ input.label }}
				</div>
			</template>
		</Dropdown>
	</div>
</template>
