<script setup>
const { isSidebarOpen } = defineProps({
	isSidebarOpen: [Boolean],
});
const user = computed(() => usePage().props.user);
const url = computed(() => usePage().url);

const isAdminUrl = computed(() => {
	let currentUrl = url.value.substr(1);
	return currentUrl.startsWith('admin');
});
</script>
<template>
	<div v-if="user.is_super_admin">
		<div
			class="bg-secondary text-dark mx-4 mt-2 mb-1 py-3 px-4 rounded-lg h-20"
			:class="[isSidebarOpen ? 'block' : 'hidden group-hover/sidebar:block']">
			<div class="flex items-center">
				<div class="h-10 w-10 rounded-full inline-flex items-center justify-center">
					<img :src="user.profile_photo_url" class="h-8 rounded-full object-contain" />
				</div>
				<div class="ml-3">
					<p class="text-sm font-semibold truncate text-secondary-lighter">Welcome, {{ user.first_name }}</p>
					<p>
						<span
							v-if="isAdminUrl"
							class="text-xs text-secondary-lighter font-semibold px-2 py-1 rounded-full bg-secondary-dark/80 border border-secondary-light/70">
							{{ __('Adminstorator') }}
						</span>
						<Link
							v-else
							:href="route('admin.dashboard')"
							v-wave
							class="text-xs text-secondary-lighter font-semibold px-2 py-1 rounded-full bg-secondary-dark/80 border border-secondary-light/70">
							{{ __('Adminstorator') }}
						</Link>
					</p>
				</div>
			</div>
		</div>

		<div class="mt-2 mb-1 h-20 ml-3 py-3" :class="[isSidebarOpen ? 'hidden' : 'block group-hover/sidebar:hidden']">
			<div class="h-10 w-10 rounded-full inline-flex items-center justify-center">
				<img :src="user.profile_photo_url" class="h-8 w-8 rounded-full object-contain" />
			</div>
		</div>
	</div>
</template>
<style scoped></style>
