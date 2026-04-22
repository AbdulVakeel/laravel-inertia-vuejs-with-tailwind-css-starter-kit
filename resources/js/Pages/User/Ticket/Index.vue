<script setup>
import { computed } from 'vue';
import { usePage,Link } from '@inertiajs/vue3';
import useSearchFilter from '@/Composables/useSearchFilter.js';

import { Icon } from '@iconify/vue'; 


const data = computed(() => usePage().props.data);
const items = computed(() => data.value.items);
const columns = computed(() => data.value.columns);

const { form, reset, processing, onSort } = useSearchFilter(route('user.ticket.index'));

</script>

<template>
<AppContainer>
    <SectionCard class="mt-4 h-full" :key="Date.now().toString()">
        <div class="mb-1 p-5 flex items-center justify-between flex-wrap gap-3">
            <SearchInput
                :placeholder="('Search...')" 
                v-model="form.filter.global"
                @reset="reset"
            />
            <Link
  :href="route('user.ticket.open')"
  class="inline-flex items-center justify-center font-semibold border-transparent focus:outline-none focus:ring-2 focus:ring-opacity-75 transition-all duration-300 disabled:opacity-25 rounded-lg group bg-primary text-secondary-darker dark:text-secondary-lighter border-primary hover:bg-primary-dark focus:ring-primary active:bg-primary py-1 px-3 text-sm shadow-md"
>
  Open New Ticket
</Link>

        </div>

        <LoadingProgressBar v-if="processing" />

        <DataTable
            :current-page="items.current_page"
            :per-page="items.per_page"
            :items="items.data"
            :columns="columns"
            id="TicketTable"
            class="rounded-xl"
            @onSort="onSort"
        >
            <!-- Created At Column -->
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
                        :href="route('user.ticket.view', item.ticket)"
                        class="text-blue-500 hover:underline"
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
