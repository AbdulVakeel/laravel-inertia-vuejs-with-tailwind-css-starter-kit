<template>
  <Head :title="'Faq'" />

  <!-- Header -->
  <div class="flex justify-center items-center mb-24 px-4">
    <h2 class="text-5xl md:text-6xl leading-tight text-center">
  <span class="dark:bg-gradient-to-r dark:from-sky-400 dark:via-indigo-400 dark:to-pink-400 dark:text-transparent dark:bg-clip-text">
    Any Questions?<br />
    We're Here to Help
  </span>
</h2>

  </div>

  <!-- FAQ List -->
  <div class="max-w-4xl mx-auto space-y-6 px-4 mt-6">
   <div
  v-for="(faq, index) in faqs"
  :key="faq.id"
  class="bg-gray-900 dark:bg-gray-800 bg-white border border-gray-700 dark:border-gray-600 rounded-lg p-4 md:p-5 transition hover:shadow-xl hover:border-sky-400"
>
  <button
    @click="toggle(index)"
    class="w-full flex justify-between items-center text-left text-base md:text-lg font-semibold transition"
  >
    <span>{{ faq.title }}</span>
    <svg
      :class="{ 'rotate-180': activeIndex === index }"
      class="w-5 h-5 md:w-6 md:h-6 transform transition-transform duration-300"
      fill="none"
      stroke="currentColor"
      viewBox="0 0 24 24"
      stroke-width="2"
      stroke-linecap="round"
      stroke-linejoin="round"
    >
      <path d="M19 9l-7 7-7-7" />
    </svg>
  </button>

  <transition name="fade">
   <div 
  v-if="activeIndex === index" 
  class="mt-2 md:mt-3 text-sm md:text-base leading-relaxed"
  v-html="faq.description"
></div>
  </transition>
</div>

  </div>
</template>

<script setup>
import { ref } from 'vue';
import { Head } from '@inertiajs/vue3';

const props = defineProps({
  data: Object
});

const faqs = ref(props.data.faqs); // directly use database data
const activeIndex = ref(null);

const toggle = (index) => {
  activeIndex.value = activeIndex.value === index ? null : index;
};
</script>

<style>
/* Optional: smooth fade for FAQ open/close */
.fade-enter-active, .fade-leave-active {
  transition: all 0.3s ease;
}
.fade-enter-from, .fade-leave-to {
  opacity: 0;
  transform: translateY(-5px);
}
</style>
