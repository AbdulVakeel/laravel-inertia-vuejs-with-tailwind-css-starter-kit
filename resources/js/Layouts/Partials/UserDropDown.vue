<script setup>
import { Menu, MenuButton, MenuItems, MenuItem } from '@headlessui/vue';
const logout = () => {
	router.post(route('logout'), {

	});
};

const user = computed(() => usePage().props.user);
</script>

<template>
	<Menu as="div" class="relative inline-block text-left ml-3">
		<div>
			<MenuButton as="button" class="btn-sm py-1.5">
				<img class="h-8 w-8 rounded-md object-cover" :src="$page.props.user.profile_photo_url"
					:alt="$page.props.user.first_name" />
			</MenuButton>
		</div>

		<transition enter-active-class="transition duration-100 ease-out"
			enter-from-class="transform scale-95 opacity-0" enter-to-class="transform scale-100 opacity-100"
			leave-active-class="transition duration-75 ease-in" leave-from-class="transform scale-100 opacity-100"
			leave-to-class="transform scale-95 opacity-0">
			<MenuItems
				class="absolute right-0 mt-2 w-72 origin-top-right rounded-md bg-light text-light shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none border border-secondary-light/30 dark:border-secondary overflow-hidden">
				<div
					class="flex items-center gap-x-2 py-4 px-3 border-b border-secondary-light/50 dark:border-secondary-light">
					<img class="h-8 w-8 rounded-md object-cover" :src="$page.props.user.profile_photo_url"
						:alt="$page.props.user.first_name" />

					<div class="text-sm">


						<span class="relative flex h-3 w-3">
							<span
								class="animate-ping absolute inline-flex h-full w-full rounded-full bg-sky-400 opacity-75"></span>
							<span class="relative inline-flex rounded-full h-3 w-3 bg-sky-500"></span>
						</span>
						<p class="font-semibold text-dark">{{ $page.props.user.username }}
						</p>

						<p class="font-semibold text-light truncate">{{ $page.props.user.email }}</p>
					</div>
				</div>



				<MenuItem v-slot="{ close, active }" as="DropdownLink">
				<DropdownLink @click="close" :href="user.is_super_admin ? route('admin.profile.show') : route('profile.show')">
					<Icon name="account-setting" class="h-5 mr-2" />
					<span>My Profile</span>
				</DropdownLink>
				</MenuItem>

				<MenuItem v-slot="{ active, close }" class="py-2" as="DropdownLink">
				<DropdownLink @click="close" :href="user.is_super_admin ? route('admin.profile.show', { tab: 1 }) : route('profile.show', { tab: 1 })">
					<Icon name="security" class="h-5 mr-2" />
					<span>Change Password</span>
				</DropdownLink>
				</MenuItem>


				<!-- Authentication -->
				<MenuItem as="div" class="py-2 px-4" v-slot="{ active, close }">
				<form @submit.prevent="logout">
					<DropdownLink @click="close" as="button"
						link-class="border border-secondary-light bg-transparent hover:bg-secondary-lighter dark:hover:bg-secondary-dark">
						{{ __('Log out') }}
					</DropdownLink>
				</form>
				</MenuItem>
			</MenuItems>
		</transition>
	</Menu>
</template>
