<script setup>
import ThemeModeToggler from './ThemeModeToggler.vue';
import MobileMenuToggler from './MobileMenuToggler.vue';
import UserDropDown from './UserDropDown.vue';
import GoogleTranslateSelect from '@google-translate-select/vue3'
import { Icon } from '@iconify/vue'; 

const emit = defineEmits(['openMobileMenu']);
const toggleFullScreen = () => {
  if (!document.fullscreenElement) {
    document.documentElement.requestFullscreen()
  } else {
    if (document.exitFullscreen) {
      document.exitFullscreen()
    }
  }
}
const languages = [
  { code: "en", name: "English", cname: "英语", ename: "English" },
  { code: "es", name: "Español", cname: "西班牙语", ename: "Spanish" },
  { code: "fr", name: "Français", cname: "法语", ename: "French" },
  { code: "de", name: "Deutsch", cname: "德语", ename: "German" },
  { code: "hi", name: "हिंदी", cname: "印地语", ename: "Hindi" },
  { code: "it", name: "Italiano", cname: "意大利语", ename: "Italian" },
  { code: "pt", name: "Português", cname: "葡萄牙语", ename: "Portuguese" }
];

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
			
	<GoogleTranslateSelect :languages="languages" class="custom-translate" />

	   <button
        class="rounded-xl md:block "
        @click="toggleFullScreen"
        title="Toggle Fullscreen"
      >
        <Icon icon="iconamoon:screen-full" @click="toggleFullScreen" class="w-6 h-6" />
      </button>
				<ThemeModeToggler />

				<UserDropDown />


			</div>
		</div>
	</div>
</template>

