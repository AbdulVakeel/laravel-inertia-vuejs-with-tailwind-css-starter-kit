<script setup>

/*=========================================================================================
  File Name: Staff setting
  
  ----------------------------------------------------------------------------------------
  Author: Sky Code Lab
  Author URL: https://www.skycodelab.io/
==========================================================================================*/


import UserFormModal from './Partials/UserFormModal.vue';

const app = computed(() => usePage().props.app);
const data = computed(() => usePage().props.data);
const items = computed(() => data.value.items);
const columns = computed(() => data.value.columns);

const { form, reset, processing, onSort } = useSearchFilter(route('admin.staffs.index'));

/* Modal */
const showModal = ref(false);
const selectedItem = ref('');
const handleShowModal = (item) => {
	selectedItem.value = item;
	showModal.value = true;
};

const handleCloseModal = () => {
	showModal.value = false;
	selectedItem.value = {};
};
/* End */
</script>

<template>
	<AppContainer>
	
		<SectionCard class="mt-4 h-full overflow-hidden">
			<div class="mb-3 p-5 flex items-center justify-between flex-wrap gap-3">
				<SearchInput placeholder="Search ... " v-model="form.filter.global" @reset="reset"></SearchInput>
				<Button as="button" shadow="primary" class="py-1" @click="handleShowModal({})">
					<Icon name="plus" class="h-6" />
				</Button>
			</div>

			<LoadingProgressBar v-if="processing" />

			<DataTable :items="items.data" :columns="columns" class="rounded-xl" @onSort="onSort" :key="Date.now().toString() + 1">
				
				<template #cell(role)="{ item }">
					<div class="table-cell !text-left !px-1">
						<p v-for="role in item.roles">{{ role.name }}</p>
					</div>
				</template>

			

				<template #cell(actions)="{ item }">
					<Button intent="text" siz="xs" as="button" @click="handleShowModal(item)">
						<Icon name="edit" class="h-4" />
					</Button>
				</template>

			
			</DataTable>

			<div v-if="showModal">
				<UserFormModal :item="selectedItem" :show="showModal" @close="handleCloseModal()" />
			</div>

		</SectionCard>
	</AppContainer>
</template>

<script>
import Layout from '@/Layouts/AdminLayout.vue';
import { defineComponent } from 'vue';

export default defineComponent({
	layout: Layout,
});
</script>
