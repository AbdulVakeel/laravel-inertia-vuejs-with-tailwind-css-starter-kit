<script setup>
import { Icon } from '@iconify/vue';

defineProps({
	selected: Boolean,
	icon: String,
	text: String,
});
</script>

<template>
	<button
		:class="[
			'inline-flex items-center justify-center text-[14px] font-semibold text-secondary-800 sm:truncate border-transparent focus:outline-none disabled:opacity-25 pb-2 hover:text-secondary-lighter dark:hover:text-secondary-lighter transition-all ease-in-out',
			selected ? 'text-dark border-b-2 border-primary transition-all duration-500 inline-block' : 'text-light',
		]">
		<Icon :icon="icon" class="w-4 h-4 mr-1" />

		{{ text }}
	</button>
</template>
