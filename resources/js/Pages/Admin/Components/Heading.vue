<script>
import Layout from '@/Layouts/AdminLayout.vue';
import {defineComponent} from 'vue';

export default defineComponent({
    layout: Layout,
});
</script>


<template>
       <AppContainer>
<SectionCard class="p-4">
        <h1 class="h1 mb-2 dark:text-white">h1 heading</h1>
        <h1 class="h2 mb-2 dark:text-white">h2 heading</h1>
        <h1 class="h3 mb-2 dark:text-white">h3 heading</h1>
        <h1 class="h4 mb-2 dark:text-white">h4 heading</h1>
        <h1 class="h5 mb-2 dark:text-white">h5 heading</h1>
        <h1 class="h6 dark:text-white">h6 heading</h1>
   
</SectionCard>
</AppContainer>
</template>
