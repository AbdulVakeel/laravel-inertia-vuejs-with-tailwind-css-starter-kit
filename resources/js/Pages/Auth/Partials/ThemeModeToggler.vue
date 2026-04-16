<script setup>
import { useDark, useToggle } from '@vueuse/core';

const isDark = useDark(true);
const toggleDark = useToggle(isDark);
</script>
<template>
	<span @click="toggleDark()" class="cursor-pointer text-secondary dark:text-secondary-light hover:text-primary dark:hover:text-primary btn-sm py-1.5 text-xs hover:btn-light">
		
		<Icon v-if="isDark" name="theme-dark" class="h-5" />
		<Icon v-else name="theme-light" class="h-5" />
	</span>
</template>
<style scoped></style>
