<script setup>
const props = defineProps({
	user: Object,
});


const user = computed(() => usePage().props.user);

const form = useForm({
	_method: 'PUT',
	first_name: props.user.first_name,
	last_name: props.user.last_name,
	email: props.user.email,
	mobile: `${props.user.mobile}`,
	photo: null,
});

const verificationLinkSent = ref(null);
const photoInput = ref(null);

const updateProfileInformation = () => {
	if (photoInput.value) {
		form.photo = photoInput.value.files[0];
	}

	form.post(route('user-profile-information.update'), {
		errorBag: 'updateProfileInformation',
		preserveScroll: true,
		onSuccess: () => clearPhotoFileInput(),
	});
};

const sendEmailVerification = () => {
	verificationLinkSent.value = true;
};

</script>

<template>
		<div
			class="max-w-lg mt-5 p-4 text-gray-900 bg-white rounded-lg border border-gray-100 shadow dark:border-gray-600  dark:bg-secondary-dark dark:text-white">

			<div class=" md:grid grid-cols-1 md:grid-cols-2 gap-x-5 gap-y-2">
				<p class="uppercase text-sm text-light font-semibold col-span-2">{{ __('Basic Info') }}</p>

				<TextInput id="first_name" label="First Name" v-model="form.first_name" :error="form.errors.first_name"
					type="text" :placeholder="__('First Name')" class="w-full" autocomplete="first_name"
					 />

				<TextInput id="last_name" label="Last Name" v-model="form.last_name" :error="form.errors.last_name" type="text"
					:placeholder="__('Last Name')" class="w-full" autocomplete="last_name"  />

				<TextInput id="username" label="Username" :model-value="user.username" class="w-full" readonly disabled />

				<!-- Email -->
				<div>
					<TextInput label="Email" id="email" v-model="form.email" :readonly="!user.is_super_admin"
						:disabled="!user.is_super_admin" class="w-full" />

					<div v-if="user.email_verified_at === null">
						<p class="text-sm mt-2">
							{{ __('Your email address is unverified.') }}

							<Link :href="route('verification.send')" method="post" as="button"
								class="underline text-gray-600 hover:text-gray-900" @click.prevent="sendEmailVerification">
							{{ __('Click here to re-send the verification email.') }}
							</Link>
						</p>

						<div v-show="verificationLinkSent" class="mt-2 font-medium text-sm text-green-600">
							{{ __('A new verification link has been sent to your email address.') }}
						</div>
					</div>
				</div>

				<div class="relative">
					<TextInput label="Mobile" id="mobile" class="w-full" input-class="w-full pl-5" v-model="form.mobile"
						:readonly="!user.is_super_admin" :disabled="!user.is_super_admin"  />
					<span
						class="absolute top-9 left-0 inline-flex items-center ml-2 font-bold text-secondary-light">+</span>
				</div>

				<TextInput label="Country" id="country" class="w-full" readonly disabled :model-value="user.country" />

			

				<div class="col-span-2 flex justify-end items-center mt-5">
					<ActionMessage :on="form.recentlySuccessful" class="mr-3"> {{ __('Saved.') }} </ActionMessage>

					<Button class="shadow-md dark:shadow-primary/50" as="button" :disabled="form.processing"
						:processing="form.processing" @click="updateProfileInformation">
						{{ __('Save Changes') }}
					</Button>
				</div>
			</div>
	</div>
</template>
