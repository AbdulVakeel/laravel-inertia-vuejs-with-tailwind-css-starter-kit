<script setup>
defineProps({
	value: String,
	labelClass: String, 
});
</script>

<template>
	<label :class="['block text-sm font-medium text-gray-500', labelClass]" >
		<template v-if="value">{{ value }}</template>
			<template v-else>
				<slot></slot>
			</template>
	</label>
</template>
