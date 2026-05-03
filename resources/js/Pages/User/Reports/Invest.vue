<script setup>
import useCurrencyFormatter from '@/Composables/useCurrencyFormatter.js';
const columns = computed(() => usePage().props.columns);
const items = computed(() => usePage().props.items);
const pageTitle = computed(() => usePage().props.pageTitle);
const { form, reset, processing, onSort, dateRange } = useSearchFilter(route('reports.invest'));
const { formatCurrency } = useCurrencyFormatter();
const data = computed(() => usePage().props.data);
</script>

<template>
	<Head :title="data.pageTitle" />
	<AppContainer>
		<PageHeading>
			<template #title>{{ __(data.pageTitle) }}</template>
		</PageHeading>

		<SectionCard class="mt-4">
			<div class="mb-3 p-5 flex items-center justify-between flex-wrap gap-3">
				<SearchInput placeholder="Search ... " v-model="form.filter.global" @reset="reset"></SearchInput>
			</div>



			<LoadingProgressBar v-if="processing" />

			<!-- <Loading :is-loading="processing"> -->
			<DataTable id="investTable" :items="items.data" :columns="columns" class="rounded-xl" :url="route('reports.invest')"
				@onSort="onSort">

				<template #cell(created_at)="{ item }">
                    <CreatedAtCell :item="item" />
                </template>

				<template #cell(status)="{ item }">
                <StatusCell :item="item" />
                </template>
				


			</DataTable>

			<DataTablePagination :items="items" v-model="form.perPage" />
		</SectionCard>
	</AppContainer>
</template>
