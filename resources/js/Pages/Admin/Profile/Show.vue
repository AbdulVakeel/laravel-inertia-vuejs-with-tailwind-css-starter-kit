<script setup>

/*=========================================================================================
  File Name: show profile
  
  ----------------------------------------------------------------------------------------
  Author: Sky Code Lab
  Author URL: https://www.skycodelab.io/
==========================================================================================*/

import { useUrlSearchParams } from '@vueuse/core';
import { usePage } from '@inertiajs/vue3';
import { TabGroup, TabList, Tab, TabPanels, TabPanel } from '@headlessui/vue';


import AdminLayout from '@/Layouts/AdminLayout.vue';
import AppLayout from '@/Layouts/AppLayout.vue';

import UpdatePasswordForm from './Partials/UpdatePasswordForm.vue';
import UpdateProfileInformationForm from './Partials/UpdateProfileInformationForm.vue';

const tabs = [
	{ id: 1, title: 'My Profile', icon: 'account-setting' },
	{ id: 2, title: 'Change Password', icon: 'security' },
];

const params = useUrlSearchParams('history');
const selectedTab = ref(params.tab ?? 0);

function changeTab(index) {
	selectedTab.value = index;
}

const user = computed(() => usePage().props.user);
const sessions = computed(() => usePage().props.sessions);
const Layout = computed(() => (user.value.is_super_admin ? AdminLayout : AppLayout));

</script>

<template>
	<Head title="Profile"></Head>
	<AppContainer>

		<div class="">
			<TabGroup :selectedIndex="selectedTab" @change="changeTab">
				<TabList class="flex space-x-7 p-1">
					<Tab v-for="(tab, index) in tabs" as="template" :key="index" v-slot="{ selected }">
						<button :class="[
				'inline-flex items-center justify-center font-semibold border-transparent focus:outline-none  disabled:opacity-25 pb-2',
				selected
					? 'text-dark border-b-2 border-primary transition-all duration-500 inline-block'
					: 'text-light',
			]">
							<Icon :name="tab.icon" class="h-5 mr-3" />
							{{ tab.title }}
						</button>
					</Tab>
				</TabList>
				<transition v-show="selectedTab >= 0" enter-active-class="transition duration-100 ease-out"
					enter-from-class="transform scale-95 opacity-0" enter-to-class="transform scale-100 opacity-100"
					leave-active-class="transition duration-75 ease-in"
					leave-from-class="transform scale-100 opacity-100" leave-to-class="transform scale-95 opacity-0">
					<TabPanels class="mt-2">
						<TabPanel :key="Date.now().toString() + 1" :class="[]">
							<UpdateProfileInformationForm :user="$page.props.user" />
						</TabPanel>


						<TabPanel :key="Date.now().toString() + 3" :class="[]">
							<div class="grid grid-cols-1 md:grid-cols-2 gap-x-5 gap-y-7 items-start">
								<UpdatePasswordForm class="p-7" />
							</div>
						</TabPanel>


					</TabPanels>
				</transition>
			</TabGroup>
		</div>
	</AppContainer>
</template>

<script>
import Layout from '@/Layouts/AdminLayout.vue';
import { defineComponent } from 'vue';

export default defineComponent({
	layout: Layout,
});
</script>

<style>
.cool-link::after {
	content: '';
	display: block;
	width: 0;
	height: 2px;
	background: #fda92d;
	transition: width 0.3s;
}

.cool-link:hover::after {
	width: 100%;
}
</style>
