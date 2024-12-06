<script setup>


const data = computed(() => usePage().props.data);

const items = computed(() => data.value.items);
const columns = computed(() => data.value.columns);
const pageTitle = computed(() => data.value.pageTitle);


 const {form, reset, processing, onSort} = useSearchFilter(route('admin.users.index'));



</script>

<template>
    <Head :title="__(pageTitle)"/>
    <AppContainer>
        <PageHeading>
			<template #title>{{ __(pageTitle) }}</template>
			
		</PageHeading>
        <div class="flex flex-wrap items-center gap-5 mb-5 px-5">
            <TabButton
                v-for="(tab, index) in tabs"
                :key="index"
                :text="tab.text"
                :icon="tab.icon"
                class="!text-md"
                @click="form.scope = tab.scope"
                :selected="form.scope == tab.scope || (index == 0 && !form.scope)"/>
        </div>

        <SectionCard class="mt-4 h-full" :key="Date.now().toString()">
            <div class="mb-1 p-5 flex items-center justify-between flex-wrap gap-3">
                <SearchInput placeholder="Search ... " v-model="form.filter.global" @reset="reset"></SearchInput>
               
            </div>

            <LoadingProgressBar v-if="processing"/>

            <DataTable
                id="usersTable"
                :items="items.data"
                :columns="columns"
                class="rounded-xl"
                @onSort="onSort"
                :key="Date.now().toString() + 1">
                <template #cell(country)="{ item }">
                    <p class="px-1 pt-2 text-sm text-light">{{ item.country }}</p>
                </template>

                <template #cell(email)="{ item }">
                    <p class="px-1 pt-2 text-sm text-light">{{ item.email }}</p>
                </template>

                <template #cell(mobile)="{ item }">
                    <p class="px-1 pb-2 text-sm text-light">{{ item.mobile }}</p>
                </template>
                
                             <template #cell(created_at)="{ item }">
                    <p class="px-1 py-2 text-sm text-light">{{ (item.created_at) }}</p>
                </template>


            </DataTable>
            <DataTablePagination :items="items" v-model="form.perPage"/>
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
