<script setup>
const passwordInput = ref(null);
const currentPasswordInput = ref(null);

const form = useForm({
	current_password: '',
	password: '',
	password_confirmation: '',
});

const updatePassword = () => {
	form.put(route('password.update'), {
		errorBag: 'updatePassword',
		preserveScroll: true,
		onSuccess: () => form.reset(),
		onError: () => {
			if (form.errors.password) {
				form.reset('password', 'password_confirmation');
				passwordInput.value.focus();
			}

			if (form.errors.current_password) {
				form.reset('current_password');
				currentPasswordInput.value.focus();
			}
		},
	});
};
</script>

<template>
		<div class="p-7 text-gray-900 bg-white rounded-lg border border-gray-100 shadow dark:border-gray-600  dark:bg-secondary-dark dark:text-white">
					
	
		<div class="mb-4">
			<h3 class="text-dark text-md">{{ __('Update Password') }}</h3>
		</div>

		<div>
			<div class="col-span-6 sm:col-span-4">
				<TextInput
					label="Current Password"
					id="current_password"
					ref="currentPasswordInput"
					:placeholder="__('Please Enter Current Password')"
					v-model="form.current_password"
					:error="form.errors.current_password"
					type="password"
					class="block w-full"
					autocomplete="current-password" />
			</div>

			<div class="col-span-6 sm:col-span-4">
				<TextInput
					label="New Password"
					id="password"
					:placeholder="__('Please Enter New Password')"
					ref="passwordInput"
					v-model="form.password"
					type="password"
					class="block w-full"
					autocomplete="new-password"
					:error="form.errors.password" />
			</div>

			<div class="col-span-6 sm:col-span-4">
				<TextInput
					label="Confirm Password"
					:placeholder="__('Please Enter Confirm Password')"
					id="password_confirmation"
					v-model="form.password_confirmation"
					type="password"
					class="block w-full"
					autocomplete="new-password"
					:error="form.errors.password_confirmation" />
			</div>
		</div>

		<div class="flex items-center justify-end gap-3 mt-5">
			<ActionMessage :on="form.recentlySuccessful" class="mr-3">{{ __('Saved.') }}</ActionMessage>
			<Button
				as="button"
				class="text-sm py-2"
				shadow="primary"
				:disabled="form.processing"
				:processing="form.processing"
				@click="updatePassword">
				{{ __('Save Changes') }}
			</Button>
		</div>
	</div>
</template>
