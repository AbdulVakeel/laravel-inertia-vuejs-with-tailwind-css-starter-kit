<script setup>
import { Disclosure, DisclosureButton, DisclosurePanel } from '@headlessui/vue';

const emit = defineEmits(['onClick']);

const { item, linkClass } = defineProps({
	item: [Object],
	linkClass: [String],
});

const activeClasses = computed(() => {
	return item.current ? 'text-white bg-primary/10' : 'text-white ';
});
const iconActiveClasses = computed(() => {
	return item.current ? 'fill-primary text-primary' : 'fill-white text-white';
});
</script>

<template>
	<!-- Divivder -->
	<div v-if="item.divider && item.visible">
		<div :class="['text-white font-semibold ml-3 uppercase text-xs my-4 ']">
			{{ item.divider }}
		</div>
	</div>

	<!-- Simple Link -->

	<div v-else-if="!item.children?.length">
		<Link
			preserve-scroll
			v-wave
			v-if="item.visible"
			:href="item.href"
			:class="[
				'group w-full flex items-center pl-1 py-2  hover:bg-secondary-dark fs-2x text-white text-[14px] font-medium rounded-md group-hover:text-primary',
				activeClasses,
				linkClass,
			]"
			@click="emit('onClick')">
			<Icon
				v-if="item.icon"
				:name="item.icon"
				:class="['mr-5 flex-shrink-0 h-5 w-5 group-hover:fill-primary group-hover:text-success-lighter', iconActiveClasses]"
				aria-hidden="true" />

			<Icon
				v-else
				name="dot"
				:class="[
					'mr-5 flex-shrink-0 h-3 w-3 ml-1.5 group-hover:fill-primary group-hover:text-primary',
					iconActiveClasses,
				]"
				aria-hidden="true" />

			{{ item.name }}
		</Link>
	</div>

	<!-- Dropdown Menu, Link with child links -->
	<Disclosure
		v-else-if="item.children?.length && item.visible"
		as="div"
		:key="randomKey()"
		class="space-y-1"
		v-slot="{ open }"
		:default-open="item.current">
		<DisclosureButton
			:key="randomKey()"
			v-wave
			:class="[
				'group w-full flex items-center pl-2 py-2 hover:bg-secondary-dark text-sm font-medium rounded-md group-hover:text-primary ',
				activeClasses,
			]">
			<Icon
				:name="item.icon"
				:class="['mr-5 flex-shrink-0 h-5 w-5 group-hover:fill-primary group-hover:text-primary', iconActiveClasses]"
				aria-hidden="true" />

			<span :clas="['flex-1 !text-left', linkClass]">{{ item.name }}</span>

			<Icon
				name="caret"
				:class="[
					open || item.current ? '' : 'rotate-[270deg]',
					'text-white ml-auto mr-3 flex-shrink-0 h-5 w-5 transform transition-colors ease-in-out duration-500',
				]"
				aria-hidden="true" />
		</DisclosureButton>
		<transition
			enter-active-class="transition duration-1000 ease-out"
			enter-from-class="transform scale-95 opacity-0"
			enter-to-class="transform scale-100 opacity-100"
			leave-active-class="transition duration-750 ease-out"
			leave-from-class="transform scale-100 opacity-100"
			leave-to-class="transform scale-95 opacity-0"
			type="transition">
			<DisclosurePanel class="origin-top-left space-y-1 pl-8" :key="randomKey()">
				<NavItem v-for="(subItem, i) in item.children" :key="i" :item="subItem" :link-class="linkClass" />
			</DisclosurePanel>
		</transition>
	</Disclosure>
</template>
