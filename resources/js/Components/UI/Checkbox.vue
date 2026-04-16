<script setup>
import { computed } from 'vue';

const emit = defineEmits(['update:checked']);

const props = defineProps({
	checked: {
		type: [Array, Boolean],
		default: false,
	},
	value: {
		type: [String, Number],
		default: null,
	},
});

const proxyChecked = computed({
	get() {
		return props.checked;
	},

	set(val) {
		emit('update:checked', val);
	},
});
</script>

<template>
	<input
		v-wave
		v-model="proxyChecked"
		type="checkbox"
		:value="value"
		class="rounded border-secondary-lighter text-primary shadow-sm focus:border-primary/50 focus:ring focus:ring-primary/20 focus:ring-opacity-50" />
</template>
