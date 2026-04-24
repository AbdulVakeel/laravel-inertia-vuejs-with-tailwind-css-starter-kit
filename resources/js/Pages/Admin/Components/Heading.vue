<script setup>
import Layout from '@/Layouts/AdminLayout.vue';

defineOptions({
  layout: Layout,
});
</script>

<template>
  <AppContainer>
    <div class="space-y-6">

      <!-- Page Title -->
      <div>
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">
          Typography Showcase
        </h1>
        <p class="text-sm text-gray-500 dark:text-gray-400">
          Heading styles preview (H1 → H6)
        </p>
      </div>

      <!-- Card -->
      <SectionCard class="p-6 rounded-2xl shadow-sm border border-gray-200 dark:border-gray-800">

        <div class="space-y-4">

          <div class="flex justify-between items-center border-b pb-2 dark:border-gray-700">
            <span class="text-sm text-gray-500">H1</span>
            <span class="text-xs text-gray-400">text-4xl</span>
          </div>
          <h1 class="text-4xl font-bold text-gray-900 dark:text-white">
            H1 Heading Example
          </h1>

          <div class="flex justify-between items-center border-b pb-2 dark:border-gray-700">
            <span class="text-sm text-gray-500">H2</span>
            <span class="text-xs text-gray-400">text-3xl</span>
          </div>
          <h2 class="text-3xl font-semibold text-gray-900 dark:text-white">
            H2 Heading Example
          </h2>

          <div class="flex justify-between items-center border-b pb-2 dark:border-gray-700">
            <span class="text-sm text-gray-500">H3</span>
            <span class="text-xs text-gray-400">text-2xl</span>
          </div>
          <h3 class="text-2xl font-semibold text-gray-900 dark:text-white">
            H3 Heading Example
          </h3>

          <div class="flex justify-between items-center border-b pb-2 dark:border-gray-700">
            <span class="text-sm text-gray-500">H4</span>
            <span class="text-xs text-gray-400">text-xl</span>
          </div>
          <h4 class="text-xl font-medium text-gray-900 dark:text-white">
            H4 Heading Example
          </h4>

          <div class="flex justify-between items-center border-b pb-2 dark:border-gray-700">
            <span class="text-sm text-gray-500">H5</span>
            <span class="text-xs text-gray-400">text-lg</span>
          </div>
          <h5 class="text-lg font-medium text-gray-900 dark:text-white">
            H5 Heading Example
          </h5>

          <div class="flex justify-between items-center border-b pb-2 dark:border-gray-700">
            <span class="text-sm text-gray-500">H6</span>
            <span class="text-xs text-gray-400">text-base</span>
          </div>
          <h6 class="text-base font-normal text-gray-900 dark:text-white">
            H6 Heading Example
          </h6>

        </div>

      </SectionCard>

    </div>
  </AppContainer>
</template>