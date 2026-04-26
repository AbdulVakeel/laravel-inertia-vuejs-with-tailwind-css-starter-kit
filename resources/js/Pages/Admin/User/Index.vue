<script setup>
import { computed } from 'vue'
import { usePage } from '@inertiajs/vue3'
import UserProfileCard from '@/Components/UserProfileCard.vue'
import TabButton from '@/Components/TabButton.vue'
import Wallet from '@/Components/Wallet.vue';
import { Icon } from '@iconify/vue'

const page = usePage()

const data = computed(() => page.props.data || {})
const items = computed(() => data.value.items || {})
const columns = computed(() => data.value.columns || [])
const pageTitle = computed(() => data.value.pageTitle || 'Users')

const statusCounts = computed(() => data.value.statusCounts || {})

const tabs = computed(() => [
  {
    id: 1,
    title: `All Users (${statusCounts.value.all ?? 0})`,
    icon: 'mdi:account-group',
    scope: ''
  },
  {
    id: 2,
    title: `Active Users (${statusCounts.value.active ?? 0})`,
    icon: 'mdi:check-circle-outline',
    scope: 'active'
  },
  {
    id: 3,
    title: `Banned Users (${statusCounts.value.banned ?? 0})`,
    icon: 'mdi:close-circle-outline',
    scope: 'banned'
  }
])
const { form, reset, processing, onSort } = useSearchFilter(route('admin.users.index'))
</script>

<template>
  <Head :title="__(pageTitle)" />

  <AppContainer>
    <!-- Page Heading -->
    <PageHeading>
      <template #title>{{ __(pageTitle) }}</template>
    </PageHeading>

    <!-- Tabs -->
    <div class="flex flex-wrap items-center gap-5 mb-5 px-5">
      <TabButton
        v-for="(tab, index) in tabs"
        :key="tab.id"
        :text="tab.title" 
        :icon="tab.icon"
        class="!text-md"
        @click="form.scope = tab.scope"
        :selected="form.scope == tab.scope || (index === 0 && !form.scope)"
      />
    </div>

    <!-- Card -->
    <SectionCard class="mt-4 h-full">
      <!-- Search -->
      <div class="mb-1 p-5 flex items-center justify-between flex-wrap gap-3">
        <SearchInput
          placeholder="Search ..."
          v-model="form.filter.global"
          @reset="reset"
        />
      </div>

      <!-- Loader -->
      <LoadingProgressBar v-if="processing" />

      <!-- Table -->
      <DataTable
        id="usersTable"
        :items="items.data || []"
        :columns="columns"
        class="rounded-xl"
        @onSort="onSort"
      >
        <!-- Username -->
        <template #cell(username)="{ item }">
          <UserProfileCard :user="item" />
        </template>

        <!-- Country -->
        <template #cell(country)="{ item }">
          <p class="px-1 pt-2 text-sm text-light">{{ item.country }}</p>
        </template>

        <!-- Email -->
        <template #cell(email)="{ item }">
          <p class="px-1 pt-2 text-sm text-light">{{ item.email }}</p>
        </template>

        <template #cell(wallet)="{ item }">
          <Wallet :item="item" />
        </template>

        <!-- Mobile -->
        <template #cell(mobile)="{ item }">
          <p class="px-1 pb-2 text-sm text-light">{{ item.mobile }}</p>
        </template>

        <!-- Created At -->
        <template #cell(created_at)="{ item }">
          <CreatedAtCell :item="item" />
        </template>

         <template #cell(actions)="{ item }">
          <div class="flex items-center">
            <Link intent="text" size="xs" :href="route('admin.users-detail', item.id)">
              <Icon icon="mdi:pencil-outline" class="custom-icon-16" />
            </Link>
          </div>
        </template>
      </DataTable>

      <!-- Pagination -->
      <DataTablePagination :items="items" v-model="form.perPage" />
    </SectionCard>
  </AppContainer>
</template>

<script>
import Layout from '@/Layouts/AdminLayout.vue'
import { defineComponent } from 'vue'

export default defineComponent({
  layout: Layout,
})
</script>