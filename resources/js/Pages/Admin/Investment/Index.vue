<script setup>
import { computed, ref } from 'vue';
import useSearchFilter from '@/Composables/useSearchFilter.js';
import { usePage } from '@inertiajs/vue3';
import { Icon } from '@iconify/vue'; 
import InvestmentModal from './_partials/InvestmentModal.vue';

const data = computed(() => usePage().props.data);
const columns = computed(() => data.value.columns);
const items = computed(() => data.value.items);
const pageTitle = computed(() => data.value.pageTitle);
const { form, reset, processing, onSort } = useSearchFilter(route('admin.investment.index'));

/* Modal */
const showModal = ref(false);
const selectedItem = ref({});

const handleShowModal = (item) => {
    selectedItem.value = item;
    showModal.value = true;
};

const handleCloseModal = () => {
    showModal.value = false;
    selectedItem.value = {};
};
</script>

<template>
	<Head :title="__(pageTitle)"/>
    <AppContainer>
        <PageHeading>
			<template #title>{{ __(pageTitle) }}</template>
			
		</PageHeading>
		<SectionCard class="mt-4 h-full ">
			<div class="mb-3 p-5 flex items-center justify-between flex-wrap gap-3">
				<SearchInput
					:placeholder="('Search...')" 
					v-model="form.filter.global"
					@reset="reset"
					/>
				<Button as="button" shadow="primary" class="py-1" @click="handleShowModal({})">
                    <Icon icon="mdi:plus" class="text-2xl" />
				</Button>
			</div>

			<LoadingProgressBar v-if="processing" />

			<DataTable :current-page="items.current_page" :per-page="items.per_page" :items="items.data" :columns="columns" 
				
				class="rounded-xl"
				@onSort="onSort"
				:key="Date.now().toString() + 1">
				

				<template #cell(status)="{ item }">
                <StatusCell :item="item" />
                </template>

				<template #cell(actions)="{ item }">
					<Button intent="text" siz="xs" as="button" @click="handleShowModal(item)">
						<Icon icon="mdi:pencil-outline" class="custom-icon-16" />
					</Button>
				</template>
                
				 <!-- Created At -->
				<template #cell(created_at)="{ item }">
				<CreatedAtCell :item="item" />
				</template>
			
			</DataTable>

			<div v-if="showModal">
				<InvestmentModal :investment="selectedItem" :show="showModal" @close="handleCloseModal()" />
			</div>

			<DataTablePagination :items="items" v-model="form.perPage" />
		</SectionCard>
	</AppContainer>
</template>


<script>
import Layout from '@/Layouts/AdminLayout.vue';
import {defineComponent} from 'vue';

export default defineComponent({
    layout: Layout,
});
</script>
