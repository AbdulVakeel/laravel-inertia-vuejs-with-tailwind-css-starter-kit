<script setup>
const emit = defineEmits(['closeSidebar']);
const toggleSidebar = useStorage('toggleSidebar', true);

</script>

<template>
	<button v-wave
		class="cursor-pointer text-secondary-light hover:text-primary dark:hover:text-primary btn-sm py-1.5 text-xs hover:btn-light"
		@click="toggleSidebar = !toggleSidebar">
		
		<Icon name="side"
			:class="['h-7 w-7 stroke-1 transition-all duration-500 ease-in-out', toggleSidebar ? 'rotate-0 ' : 'rotate-180 text-primary ']" />
	</button>
</template>

