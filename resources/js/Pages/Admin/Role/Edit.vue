<script setup>

const app = computed(() => usePage().props.app);
const data = computed(() => usePage().props.data);
const item = computed(() => data.value.item);
const permissions = computed(() => data.value.permissions);

const permissionGroups = computed(() => {
	return permissions.value.reduce((acc, { name, id }) => {
		let [action, group] = name.replace(/_/g, ' ').split(' ');
		console.log(group);
		group = group.toLowerCase();
		acc[group] ??= [];
		acc[group].push({ permission: action, name, id });
		return acc;
	}, {});
});

const form = useForm({
	id: item.value?.id ?? '',
	name: item.value?.name ?? '',
	guard_name: 'web',
	// ...item.value,
	permissions: item.value?.permissions?.map((item) => item.name) ?? [],
	_method: item.value.id ? 'put' : 'post',
});

const handleSubmit = () => {
	if(form.id) {
		form.post(route('admin.role.update', form.id), {
		preserveScroll: true,
	});
	} else {
		form.post(route('admin.role.store'), {
		preserveScroll: true,
	});
	}
	

};

</script>

<template>

	<AppContainer>
	

		<SectionCard class="p-7">
			<h3 class="text-light text-md font-semibold">Role Details</h3>
			<TextInput label="Role name" id="name" v-model="form.name" :error="form.errors.name" class="w-full" />
		</SectionCard>


		<SectionCard class="p-7 mt-7">
			<h3 class="text-light text-md font-semibold">Permissions</h3>
			<div v-for="(group, name) in permissionGroups" :key="name" class="my-3">
				<section class="flex items-center">
					<div class="w-44">
						<h3 class="uppercase font-semibold text-secondary-600">{{ name }}</h3>
					</div>

					<div class="flex-1 flex space-x-16 py-2 px-10 rounded border bg-secondary-50/30">
						<template v-for="(item, index) in group" :key="item.id">
							<div class="form-check my-1">
								<label class="flex items-center" :for="`permissions.${item.id}`">
									<input
										class="rounded border-secondary-300 text-primary shadow-sm focus:border-primary-300 focus:ring focus:ring-primary-200 focus:ring-opacity-50"
										type="checkbox" v-model="form.permissions" :value="item.name"
										:name="`permissions.${item.id}`" :id="`permissions.${item.id}`" />
									<span class="ml-2 text-secondary-600 uppercase">{{ item.permission }}</span>
								</label>
							</div>
<!-- 
							<ToggleInput class="mt-5" :id="`permissions.${item.id}`" v-model="form.permissions[index]">
								<span class="flex flex-shrink-0 text-sm">{{ item.permission }}</span>
							</ToggleInput> -->

						</template>

					</div>
				</section>
			</div>

		</SectionCard>

		<div class="flex items-center py-4 bg-secondary-50 border-t border-secondary-100">

			<div class="ml-auto flex items-center mx-3">
				<Button :loading="form.processing" class="ml-auto" @click="handleSubmit">
					Save
				</Button>
			</div>
		</div>
		<!-- End -->


	</AppContainer>
</template>

<script>
import Layout from '@/Layouts/AdminLayout.vue';
import { defineComponent } from 'vue';

export default defineComponent({
	layout: Layout,
});
</script>
