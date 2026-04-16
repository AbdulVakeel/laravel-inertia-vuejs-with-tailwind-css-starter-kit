<script setup>
const app = computed(() => usePage().props.app);

const data = computed(() => usePage().props.data);
const items = computed(() => data.value.items);
const columns = computed(() => data.value.columns);

const { form, reset, processing, onSort, dateRange } = useSearchFilter(route('admin.role.index'));
</script>

<template>
	<AppContainer>
	
		<SectionCard class="mt-4 h-full" :key="Date.now().toString()">
			<div class="mb-1 p-5 flex items-center justify-between flex-wrap gap-3">
				<SearchInput placeholder="Search ... " v-model="form.filter.global" @reset="reset" />

				<!-- <Button :href="route('admin.role.create')" shadow="primary" class="py-1">
					<Icon name="plus" class="h-6" />
				</Button> -->
			</div>

			<LoadingProgressBar v-if="processing" />

			<DataTable :items="items.data" :columns="columns" class="rounded-xl" @onSort="onSort">
				<template #cell(actions)="{ item }">
					<div v-if="item.name !== 'super_admin'" class="flex justify-end items-center px-5">
						<Button intent="text" siz="xs" :href="route('admin.role.edit', item.id)">
							<Icon name="edit" class="h-4" />
						</Button>
					</div>
				</template>
			</DataTable>

			<DataTablePagination :items="items" v-model="form.perPage" />
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
