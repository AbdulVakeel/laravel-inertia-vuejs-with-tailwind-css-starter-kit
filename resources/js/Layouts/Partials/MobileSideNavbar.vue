<script setup>
import { onUnmounted } from 'vue';

import NavItem from './NavItem.vue';

const { menuType, open } = defineProps({
	menuType: [String],
	open: { type: Boolean, default: false },
});

const emit = defineEmits(['close']);


onUnmounted(() => {
	// emit('close');
});

const navigations = useNavigations();

const navItems = computed(() => menuType === 'admin' ? navigations.adminNavItems : navigations.userNavItems );

</script>

<template>
	<div
		:class="[
			'static flex flex-col flex-grow pt-2 bg-[#0a1e35] overflow-y-auto custom-scrollbar border-r-2 border-secondary border-dotted  kw  h-full w-3/3 md:1/2',
			open ? 'absolute flex' : 'hidden',
		]">
		<Link href="/">
			<div class="flex items-center flex-shrink-0 px-4 h-14">
				<ApplicationLogo :class="[' h-12']" />
			</div>
		</Link>

		<!-- Mobile Sidebar Toggler -->
		<div :class="['absolute top-4', open ? 'right-3' : 'right-3']">
			<button
				v-wave
				class="cursor-pointer text-secondary-light hover:text-primary dark:hover:text-primary btn-sm py-1.5 text-xs hover:btn-light"
				@click="emit('close')">
				<Icon name="close" :class="['h-7 w-7 stroke-1 transition-all duration-500 ease-in-out']" />
			</button>
		</div>

		<div class="mt-5 flex-1 flex flex-col">
			<nav class="flex-1 px-2 pb-4 space-y-1">
				<NavItem
					@onClick="emit('close')"
					v-for="(item, index) in navItems"
					:key="index"
					:item="item"
					:link-class="!open ? 'overflow-hidden whitespace-nowrap' : ''" />
			</nav>
		</div>
	</div>
</template>
