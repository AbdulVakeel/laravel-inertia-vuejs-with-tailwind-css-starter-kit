<script setup>
import {computed} from 'vue';
import {usePage} from '@inertiajs/vue3';


const data = computed(() => usePage().props.data);
const columns = computed(() => data.value.columns);
const items = computed(() => data.value.items);
const currentRouteName = computed(() => route().current());
const pageTitle = computed(() => data.value.pageTitle);

const {form, reset, processing, onSort} = useSearchFilter(route(currentRouteName.value));

</script>

<template>
    <Head :title="__(pageTitle)"/>
    <AppContainer>
        <PageHeading>
			<template #title>{{ __(pageTitle) }}</template>
			
		</PageHeading>

        <SectionCard class="mt-4 h-full" :key="Date.now().toString()">
            <div class="mb-1 p-4 flex items-center justify-between flex-wrap gap-3">
               
                <SearchInput
                    :placeholder="('Search...')"
                    v-model="form.filter.global"
                    @reset="reset"
                />
            </div>

            <LoadingProgressBar v-if="processing"/>

            <DataTable :current-page="items.current_page" :per-page="items.per_page" :items="items.data"
                       :columns="columns"
                       class="rounded-xl"
                       :url="route(currentRouteName)"
                       @onSort="onSort">

       <template #cell(description)="{ item }">
                    <DescriptionCell :item="item" :form="form" />
                </template>

               

                <template #cell(amount)="{ item }">
                    <AmountCell :item="item" />
                </template>

                <template #cell(balance)="{ item }">
                    <BalanceCell :item="item" />
                </template>

                <template #cell(transaction_id)="{ item }">
                    <TransactionCell :item="item" />
                </template>

                <template #cell(created_at)="{ item }">
                    <CreatedAtCell :item="item" />
                </template>

                <template #cell(type)="{ item }">
                    <TypeCell :item="item" />
                </template>

                 <template #cell(wallet)="{ item }">
                    <WalletCell :item="item" />
                </template>


            </DataTable>

            <DataTablePagination :items="items" v-model="form.perPage"/>
        </SectionCard>
    </AppContainer>
</template>
