<script setup>
import { Icon } from '@iconify/vue';
import PolicyModal from './_partials/PolicyModal.vue';

const data = computed(() => usePage().props.data);
const columns = computed(() => data.value.columns);
const items = computed(() => data.value.items);
const pageTitle = computed(() => data.value.pageTitle);

// Search filter logic
const { form, reset, processing, onSort } = useSearchFilter(route('admin.faqs.index'));

// Modal logic
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
</script>

<template>
   <Head :title="__(pageTitle)"/>
    <AppContainer>
        <PageHeading>
			<template #title>{{ __(pageTitle) }}</template>
			
		</PageHeading>
    <SectionCard class="mt-4 h-full">

      <!-- Search and Add Button -->
      <div class="mb-3 p-5 flex items-center justify-between flex-wrap gap-3">
        <SearchInput
          placeholder="Search..."
          v-model="form.filter.global"
          @reset="reset"
        />
        <Button as="button" shadow="primary" class="py-1" @click="handleShowModal({})">
          <Icon icon="mdi:plus" class="text-2xl" />
        </Button>
      </div>

      <!-- Loading -->
      <LoadingProgressBar v-if="processing" />

      <!-- DataTable -->
      <DataTable
        :current-page="items.current_page"
        :per-page="items.per_page"
        :items="items.data"
        :columns="columns"
        class="rounded-xl"
        @onSort="onSort"
        :key="Date.now().toString() + 1"
      >
        <!-- Title -->
        <template #cell(title)="{ item }">
          <p class="text-[14px]">{{ item.title }}</p>
        </template>

        <!-- Description -->
        <template #cell(description)="{ item }">
          <p class="text-[14px]">
            {{ item.description.length > 10 ? item.description.slice(0, 20) + '...' : item.description }}
          </p>
        </template>

        <!-- Created -->
        <template #cell(created_at)="{ item }">
          <CreatedAtCell :item="item" />
        </template>

        <!-- Actions -->
        <template #cell(actions)="{ item }">
          <Button intent="text" size="xs" as="button" @click="handleShowModal(item)">
            <Icon icon="mdi:pencil-outline" class="text-2xl" />
          </Button>
        </template>
      </DataTable>

      <!-- Modal -->
      <div v-if="showModal">
        <PolicyModal :faq="selectedItem" :show="showModal" @close="handleCloseModal()" />
      </div>

      <!-- Pagination -->
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
