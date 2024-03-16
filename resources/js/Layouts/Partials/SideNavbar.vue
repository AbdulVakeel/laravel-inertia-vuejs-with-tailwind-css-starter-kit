<script setup>
import NavItem from './NavItem.vue';
import SidebarToggler from './SidebarToggler.vue';
import { usePage } from '@inertiajs/vue3';
import AdminButton from './AdminButton.vue';
import {useStorage} from "@vueuse/core";
import useNavigations from '@/Composables/useNavigations.js';


const { menuType } = defineProps({
    menuType: [String],
});


const isSidebarOpen = computed(() => useStorage('toggleSidebar').value === 'true');

const navigations = useNavigations();

const navItems = computed(() => menuType === 'admin' ? navigations.adminNavItems : navigations.userNavItems );

</script>

<template>
	<div
		:key="Date.now().toString()"
		:class="[
			'static flex flex-col flex-grow  bg-[#0a1e35] overflow-y-auto custom-scrollbar border-r-2 border-secondary border-dotted  transition-all ease-in-out duration-300 group/sidebar h-full ',
			!isSidebarOpen
				? 'hover:absolute hover:md:w-64 md:w-14 hover:backdrop-blur dark:hover:bg-secondary-darker/70 hover:bg-secondary-darker/[100%]'
				: '',
		]">
		<div class="flex items-center justify-between  border-b-2 border-secondary border-dotted p-2">
			<Link :href="route('admin.dashboard')">
				<div class="flex items-center flex-shrink-0 px-4 h-14">
					<ApplicationLogo
						:class="[isSidebarOpen ? 'h-20 p-8 ' : 'invisible group-hover/sidebar:visible group-hover/sidebar:h-12']" />
				</div>
			</Link>

			<div :class="['', isSidebarOpen ? '' : '']">
				<SidebarToggler />
			</div>
			
		</div>

		<div class="mt-5 flex-1 flex flex-col">
			<nav class="flex-1 px-2 pb-4 space-y-1">
				<NavItem
					v-for="(item, index) in navItems"
					:key="index"
					:item="item"
					:link-class="!isSidebarOpen ? 'overflow-hidden whitespace-nowrap' : ''" />
			</nav>
		</div>
	</div>
</template>
