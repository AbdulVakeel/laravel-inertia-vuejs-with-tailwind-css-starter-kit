<script setup>
import { computed } from 'vue';
import { usePage,Link } from '@inertiajs/vue3';
import { Icon } from '@iconify/vue'; 
const statusCounts = computed(() => usePage().props.data.statusCounts);
const pageTitle = computed(() => data.value.pageTitle);

const tabs = [
    { id: 1, title: `${('All')} (${statusCounts.value.all})`, icon: 'fluent-mdl2:all-apps', scope: '', selected: false },
    { id: 2, title: `${('Open')} (${statusCounts.value.open})`, icon: 'mdi:check-circle-outline', scope: 'statusOpen', selected: false },
    { id: 3, title: `${('Answered')} (${statusCounts.value.answered})`, icon: 'mdi:clock-outline', scope: 'statusAnswered', selected: false },
    { id: 4, title: `${('Replied')} (${statusCounts.value.replied})`, icon: 'mdi:clock-outline', scope: 'statusReplied', selected: false },
    { id: 5, title: `${('Closed')} (${statusCounts.value.closed})`, icon: 'mdi:clock-outline', scope: 'statusClosed', selected: false },
];

const data = computed(() => usePage().props.data);
const items = computed(() => data.value.items);
const columns = computed(() => data.value.columns);

const { form, reset, processing, onSort } = useSearchFilter(route('admin.ticket.index'));
</script>

<template>
 <Head :title="__(pageTitle)"/>
    <AppContainer>
        <PageHeading>
			<template #title>{{ __(pageTitle) }}</template>
			
		</PageHeading>
    <SectionCard class="mt-4 h-full" :key="Date.now().toString()">
        <div class="mb-1 p-5 flex items-center justify-between flex-wrap gap-3">
          <div class="flex flex-wrap items-center gap-5 mb-5 px-5">
                  <TabButton
                        v-for="(tab, index) in tabs"
                        :key="tab.id"
                        :text="tab.title"
                        :icon="tab.icon"
                        class="!text-md"
                        @click="form.scope = tab.scope"
                        :selected="form.scope === tab.scope || (index === 0 && !form.scope)"
                    /> -
                </div>
            <SearchInput
                :placeholder="('Search...')" 
                v-model="form.filter.global"
                @reset="reset"
            />
            
        </div>

    <LoadingProgressBar v-if="processing" />

    <DataTable
      :items="items.data"
      :columns="columns"
      :current-page="items.current_page"
      :per-page="items.per_page"
      @onSort="onSort"
      class="rounded-xl"
    >

      <template #cell(last_reply)="{ item }">
                <LastReply :item="item" field="last_reply" />
            </template>

              <template #cell(created_at)="{ item }">
                <CreatedAtCell :item="item" field="created_at" />
            </template>

            
              <template #cell(status)="{ item }">
                <SupportStatusCell :item="item" field="status" />
            </template>


              <template #cell(priority)="{ item }">
                <PriorityCell :item="item" field="priority" />
            </template>
   <template #cell(actions)="{ item }">
  <div class="flex space-x-2">

    <Link
      v-if="item.status !== 3"
      :href="route('admin.ticket.view', item.id)"
      class="text-blue-500 hover:text-blue-700"
    >
      <Icon icon="mdi:pencil-outline" class="custom-icon-16" />
    </Link>

  </div>
</template>
    </DataTable>

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
