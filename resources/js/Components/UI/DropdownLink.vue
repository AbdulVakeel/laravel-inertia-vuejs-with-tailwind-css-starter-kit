<script setup>
import { Link } from '@inertiajs/vue3';

const classess = computed(() => {
	return '';
});

defineProps({
	href: String,
	as: String,
	linkClass: String,
});
</script>

<template>
	<button
		v-wave
		v-if="as == 'button'"
		type="submit"
		:class="[
			'my-3 btn btn-light inline-flex w-full px-4 py-2 text-md leading-5 text-secondary dark:text-secondary-light font-medium text-left focus:outline-none transition',
			linkClass,
		]">
		<slot />
	</button>

	<a
		v-wave
		v-else-if="as == 'a'"
		:href="href"
		:class="[
			'inline-flex w-full px-4 py-2 text-md leading-5 text-dark font-medium text-left focus:outline-none transition',
			linkClass,
		]">
		<slot />
	</a>

	<Link
		v-else
		v-wave
		:href="href"
		:class="[
			'inline-flex items-center w-full px-4 py-2 text-md leading-5 -light font-medium text-left focus:outline-none transition text-dark hover:text-primary dark:hover:text-primary hover:bg-secondary/5 dark:hover:bg-primary/5',
			linkClass,
		]">
		<slot />
	</Link>
</template>
