<script setup>
import { useForm } from '@inertiajs/vue3';
import VueMultiselect from 'vue-multiselect';


const { item, show, maxWidth, closeable } = defineProps({
	item: [Array, Object],
	show: { type: Boolean, default: false },
	maxWidth: { type: String, default: '2xl' },
	closeable: { type: Boolean, default: true },
});

const emit = defineEmits(['close']);

const data = computed(() => usePage().props.data);
const roles = computed(() => data.value?.roles);
const countries = computed(() => data.value?.countries);

const selectedCountry = ref(countries.value.find((c) => c.country == item.country ));
const form = useForm({
	first_name: item?.first_name ?? '',
	last_name: item?.last_name ?? "",
	email: item?.email ?? "",
	username: item?.username ?? "",
	password:  "",
	mobile: item?.mobile ?? "",
	role_id: item?.roles && item?.roles.length ?  item?.roles[0]?.id ?? "" : '',
    country: item?.country ?? "",

});

const submit = () => {
	form.country = selectedCountry.value?.country;

	if (form.id) {
		form.post(route('admin.staffs.update', form.id), {
			preserveState: true,
			onSuccess: () => {
				emit('close');
			},
		});
	} else {
		form.post(route('admin.staffs.store'), {
			preserveState: true,
			onSuccess: () => {
				emit('close');
			},
		});
	}
};

</script>
<template>
	<Modal :show="show" :max-width="maxWidth" :closeable="closeable" @close="emit('close')">
		<SectionCard class="rounded-none dark:rounded-none">
			<div class="flex items-center justify-end w-full px-3 pt-3 cursor-pointer" @click="emit('close')">
				<Icon name="close" class="h-7" />
			</div>
			<header class="border-b border-secondary/10 dark:border-secondary mb-5 -mt-5">
				<h1 class="px-14 mb-2 text-dark text-xl font-bold inline-flex items-center">
					<span class="inline-flex items-center justify-center h-12 w-12 rounded-full bg-info-light/20 mr-4">
						<Icon name="user" class="h-7" />
					</span>
					{{ item?.id ? __('Edit Staff') : __('New Staff') }}
				</h1>
			</header>

			<main class="px-14 pb-7">
				<ValidationErrors class="my-5" />
				<div>
					<div class="md:grid grid-cols-1 md:grid-cols-2 gap-x-5">
						
						<TextInput label="First Name" :placeholder="__('Enter first name')" id="first_name" v-model="form.first_name"
							:error="form.errors.first_name" class="w-full" />

							<TextInput label="Last Name" :placeholder="__('Enter last name')" id="last_name" v-model="form.last_name"
							:error="form.errors.last_name" class="w-full" />


							<TextInput label="Email" :placeholder="__('Enter email')" id="email" v-model="form.email"
							:error="form.errors.email" class="w-full" />

							<TextInput label="Username" :placeholder="__('Enter Username')" id="username" v-model="form.username"
							:error="form.errors.username" class="w-full" />


							<div class="mt-2">
								<Label>Country</Label>
                                <VueMultiselect v-model="selectedCountry" :options="countries" :searchable="true" label="country" track-by="country"
                                     placeholder="Select Country">
                                </VueMultiselect>
                            </div>

							<div class="mt-2">
								<Label for="mobile">Mobile</Label>
                                <div class="flex items-center w-full">
                                 
                                    <TextInput type="number" wrapper-class="flex-1"  id="mobile" v-model="form.mobile"
                                        class="w-full "
                                        placeholder="Mobile No." :error="form.errors.mobile" />
                                </div>
                            </div>

							


							<TextInput label="Password" :placeholder="__('Enter Password')" id="password" v-model="form.password"
							:error="form.errors.password" class="w-full" />

						<SelectInput :label="__('Role')" id="role_id" v-model.number="form.role_id"
							:error="form.errors.role_id" class="w-full">
							<option v-for="role in roles" :value="role.id">{{ __(role.name) }}</option>
						</SelectInput>
						
					</div>
				</div>
			</main>
			

			<footer class="border-t border-secondary/10 dark:border-secondary pb-5">
				<div class="mt-3 flex items-center justify-between px-14">

					<Button :processing="form.processing" :disabled="form.processing" intent="primary" as="button"
						class="mt-5" @click="submit">{{ __('Save') }}</Button>

				</div>

				<!-- <ValidationErrors /> -->
			</footer>
		</SectionCard>
	</Modal>
</template>
