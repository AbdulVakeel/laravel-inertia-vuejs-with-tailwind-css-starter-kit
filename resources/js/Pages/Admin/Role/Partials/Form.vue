<script setup>
import useModal from '@/Composables/useModal.js';
import { usePage, useForm } from '@inertiajs/vue3';
import { rolePermissionStore } from '@/Stores/rolePermissionStore';

const store = rolePermissionStore();

const data = computed(() => usePage().props.data);
const item = computed(() => data.value.item);

store.role = data.value.item;

store.form = useForm({
	name: '',
	guard_name: 'web',
	...item.value,
	role_permissions: item.value?.permissions?.map((item) => item.name) ?? [],
	_method: item.value.id ? 'put' : 'post',
	permissions: data.value?.permissions?.map((obj) => {
		return { ...obj, isEdit: false };
	}),
});

</script>

<template>
	<div class="">
		<ValidationErrors />

		<div class="grid grid-cols-2">
			<SectionCard class="p-7">
				<TextInput
					label="Role name"
					id="name"
					v-model="store.form.name"
					:error="store.form.errors.name"
					class="w-full" />
			</SectionCard>
		</div>

		<div class="mb-6 mt-10">
			<h1 class="text-lg font-semibold text-light">
				Permissions for role <span class="text-primary font-bold uppercase">{{ store.form.name }}</span>
			</h1>
		</div>

		<div class="grid grid-cols-2 md:grid-cols-5 gap-5">
			<SectionCard class="px-3 py-5 relative" v-for="(item, index) in store.form.permissions" :key="index">
				
				<div v-if="!item.isEdit" class="flex items-center justify-between gap-3">
					<label class="flex items-center">
						<Checkbox
							v-model:checked="store.form.role_permissions"
							:value="item.name"
							:name="`permissions.${item.id}`"
							:id="`permissions.${item.id}`" />
						<span class="ml-2 text-md">{{ __(item.name) }}</span>
					</label>
				</div>

				<div v-else class="">
					<TextInput wrapper-class="py-0 -mb-5" id="permission" v-model="item.name" class="w-full" />
				</div>

				<div v-if="!item.isEdit" class="flex items-center mt-10">
					<Button
						as="button"
						intent="light"
						size="sm"
						class="w-full hover:text-danger"
						@click="store.removePermission(index)">
						<Icon name="trash" class="h-4 fill-current" />
					</Button>
					<Button as="button" intent="light" size="sm" class="w-full" @click="item.isEdit = true">
						<Icon name="edit" class="h-4" />
					</Button>
				</div>

				<div v-else class="flex items-center mt-10">
					<Button as="button" intent="light" size="sm" class="w-full" @click="item.isEdit = false">
						{{ __('Save') }}
					</Button>
				</div>
			</SectionCard>

			<div class="px-3 py-4 flex items-center justify-center">
				<Button as="button" shadow="primary" class="py-1" @click="store.addPermission">
					<Icon name="plus" class="h-6" />
				</Button>
			</div>
		</div>

		<!-- <div class="grid grid-cols-5 md:grid-cols-5 gap-5">
			<SectionCard class="px-3 py-4" v-for="(item, name) in permissions" :key="item.id">
				<div class="flex items-center justify-between gap-3">
					<h4 class="text-dark fon-smibold text-md">{{ item.name }}</h4>
					<div class="">
						<ToggleInput
							:type="item.id"
							v-model="store.form.role_permissions"
							:name="`permissions.${item.id}`"
							:id="`permissions.${item.id}`">						
						</ToggleInput>
					</div>
				</div>
			</SectionCard>
		</div> -->
	</div>

	<div class="flex items-center py-4 mt-10">
		<div class="ml-auto flex items-center mx-3">
			<Button as="button" :loading="store.form.processing" @click="store.handleSubmit">
				{{ __('Submit') }}
			</Button>
			<Button intent="light" :href="route('admin.role.index')" class="ml-4">{{ __('Cancel') }}</Button>
		</div>
	</div>
</template>
