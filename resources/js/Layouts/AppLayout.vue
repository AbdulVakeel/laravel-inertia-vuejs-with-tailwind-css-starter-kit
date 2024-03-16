<script setup>
import useNavigations from '@/Composables/useNavigations.js';
import SideNavbar from './Partials/SideNavbar.vue';
import TopNavbar from './Partials/TopNavbar.vue';
import MobileSideNavbar from './Partials/MobileSideNavbar.vue';
import { useStorage } from "@vueuse/core";

defineProps({
	title: String,
});

const isSidebarOpen = computed(() => useStorage('toggleSidebar').value === 'true');

const { navigations } = useNavigations(isSidebarOpen.value);

const mobileMenu = ref(false);
const toggleMobileMenu = () => {
	mobileMenu.value = !mobileMenu.value;
};
</script>

<template>
	<div class="bg-dark text-dark">

		<Head :title="title" />
		<!-- Static sidebar for desktop -->
		<div :class="[
			'hidden md:flex  md:flex-col md:fixed md:inset-y-0 z-50',
			isSidebarOpen ? 'md:w-64' : '!md:w-14 relative',
		]">
			<SideNavbar :key="$page.url" menu-type="user" />
		</div>

		<!-- Static sidebar for mobile -->
		<transition v-if="mobileMenu" enter-from-class="translate-x-[150%] opacity-0 duration-500"
			leave-to-class="translate-x-[150%] opacity-0 duration-500" enter-active-class="transition duration-300"
			leave-active-class="transition duration-300">
			<div :class="['flex flex-col fixed inset-y-0 z-50 md:hidden w-full ', !mobileMenu ? 'relative ' : '']">
				<MobileSideNavbar :open="mobileMenu" menu-type="user" :key="Date.now().toString + Math.random()"
					@close="toggleMobileMenu" />
			</div>
		</transition>

		<div :class="['flex flex-col flex-1 z-10 transition-all duration-300 delay-150',
			!isSidebarOpen ? 'md:pl-14' : 'md:pl-64'
		]">
			<TopNavbar @openMobileMenu="toggleMobileMenu" />

			<FlashMessage />

			<div class="min-h-screen bg-white dark:bg-secondary-dark text-light">
				<!-- Page Heading -->
				<header v-if="$slots.header">
					<div class="max-w-7xl mx-auto pt-6 px-4 sm:px-6 lg:px-8">
						<slot name="header" />
					</div>
				</header>

				<!-- Page Content -->
				<main class="mt-5 mb-20 md:mb-7">
					<slot />
				</main>

			</div>
		</div>
	</div>
</template>
