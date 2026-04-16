<script setup>
import { Link } from '@inertiajs/vue3';

const { links } = defineProps({
	links: Array,
});
const linkClasses = computed(() => {
	return 'inline-flex items-center justify-center h-9 w-9  rounded-full hover:bg-primary hover:border-primary hover:text-white';
});
</script>

<template>
	<div class="flex flex-wrap justify-center md:flex-nowrap md:justify-end gap-y-6 gap-x-10 pt-6">
		<nav>
			<ul class="inline-flex items-center space-x-2 rounded-md text-sm">
				<li  v-for="(link, key) in links">
						<Link
						v-if="!/.*Previous/.test(link.label) && !/Next .*/.test(link.label)"
						:key="`key-${key}`"
						:class="[linkClasses, link.active ? 'border border-primary text-white bg-primary ' : '']"
						:href="link.url"
						v-html="link.label" />
				</li>
			</ul><!-- end ul -->
		</nav><!-- end nav -->

		<nav>
			<ul class="inline-flex items-center space-x-2 rounded-md text-sm">
				<template v-for="(link, key) in links">
				<li v-if="/.*Previous/.test(link.label)">
					<!-- <a class="inline-flex items-center justify-center h-9 w-9 bg-default-100 rounded-full transition-all duration-500 text-default-800 hover:bg-primary hover:border-primary hover:text-white"
						href="javascript:void(0)">
						
					</a> -->
					<component
						:is="link.url ? 'Link' : 'div'"
						:class="[linkClasses, '']"
						:href="link.url">
						<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none"
							stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
							data-lucide="chevron-left">
							<path d="m15 18-6-6 6-6"></path>
						</svg>
					</component>
				</li>
				<li v-else-if="/Next .*/.test(link.label)">
					<component
						:is="link.url ? 'Link' : 'div'"
						:class="[linkClasses, '']"
						:href="link.url">
						<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
							<path
								fill-rule="evenodd"
								d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
								clip-rule="evenodd" />
						</svg>
					</component>
				</li>
			</template>
			</ul><!-- end ul -->
		</nav><!-- end nav -->
	</div>
</template>
