<script setup>
const errors = computed(() => usePage().props.errors);
const hasErrors = computed(() => Object.keys(errors.value).length > 0);

const show = ref(false);

watch(
	() => hasErrors,
	async () => {
		show.value = true;
		
	},
	{ deep: true }
);
</script>

<template>
	<transition leave-active-class="duration-300" leave-to-class="opacity-0">
		<Alert
			intent="danger"
			v-if="show && hasErrors"
			title="Oh! Something went wrong. Please fix these issues."
			:on-dismiss="() => (show = false)">
			<ul class="mt-3 list-disc list-inside text-sm">
				<li v-for="(error, key) in errors" :key="key">
					{{ error }}
				</li>
			</ul>
		</Alert>
	</transition>
</template>
