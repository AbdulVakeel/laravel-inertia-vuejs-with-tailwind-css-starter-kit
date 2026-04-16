<script setup>
import ThemeModeToggler from './ThemeModeToggler.vue';
import MobileMenuToggler from './MobileMenuToggler.vue';
import UserDropDown from './UserDropDown.vue';


const emit = defineEmits(['openMobileMenu']);


const user = computed(() => usePage().props.user);
const app = computed(() => usePage().props.app);
const flash = computed(() => usePage().props.flash);
const items = computed(() => data.value.items);


const scrollBg = ref(false);

onMounted(() => {
});
/* ====== */
</script>

<template>
	<div :class="[
		'sticky top-0 z-10 flex-shrink-0 flex shadow ',
		scrollBg
			? 'h-16 bg-white dark:bg-secondary-darker dark:text-white'
			: 'h-16 backdrop-blur-sm bg-white/30 dark:backdrop-blur-md dark:bg-secondary-darker/50',
	]">
		<MobileMenuToggler @openMobileMenu="emit('openMobileMenu')" />

		<div class="flex-1 px-4 flex justify-between items-center bg-white dark:bg-secondary-dark text-light">


<div></div>

			<div class="flex items-center ml-6">
			

				<ThemeModeToggler />

				<UserDropDown />


			</div>
		</div>
	</div>
</template>

