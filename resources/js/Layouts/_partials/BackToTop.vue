<script setup>
import { ref, onMounted, onUnmounted } from 'vue'

defineProps({
  show: Boolean
})

const progress = ref(0)

const updateProgress = () => {
  const scrollTop = window.scrollY
  const docHeight = document.documentElement.scrollHeight - window.innerHeight
  progress.value = (scrollTop / docHeight) * 100
}

const scrollToTop = () => {
  window.scrollTo({ top: 0, behavior: 'smooth' })
}

onMounted(() => {
  window.addEventListener('scroll', updateProgress)
})

onUnmounted(() => {
  window.removeEventListener('scroll', updateProgress)
})
</script>

<template>
  <transition name="fade">
    <div v-show="show" class="fixed bottom-6 right-6 z-50">
      
      <!-- Outer Glow -->
      <div class="absolute inset-0 rounded-full blur-xl bg-gradient-to-r from-sky-500 to-indigo-500 opacity-40"></div>

      <!-- Button -->
      <button
        @click="scrollToTop"
        class="relative flex items-center justify-center h-14 w-14 rounded-full 
               bg-white/10 backdrop-blur-xl border border-white/20 
               shadow-2xl hover:scale-110 active:scale-95 transition duration-300"
      >

        <!-- Progress Ring -->
        <svg class="absolute h-14 w-14 rotate-[-90deg]">
          <circle
            cx="28"
            cy="28"
            r="24"
            stroke="rgba(255,255,255,0.1)"
            stroke-width="3"
            fill="none"
          />
          <circle
            cx="28"
            cy="28"
            r="24"
            stroke="url(#grad)"
            stroke-width="3"
            fill="none"
            :stroke-dasharray="150"
            :stroke-dashoffset="150 - (150 * progress) / 100"
            stroke-linecap="round"
          />
          <defs>
            <linearGradient id="grad">
              <stop offset="0%" stop-color="#38bdf8" />
              <stop offset="100%" stop-color="#6366f1" />
            </linearGradient>
          </defs>
        </svg>

        <!-- Icon -->
        <svg
          class="h-6 w-6 text-white relative z-10"
          fill="none"
          stroke="currentColor"
          stroke-width="2.5"
          viewBox="0 0 24 24"
        >
          <path stroke-linecap="round" stroke-linejoin="round" d="M5 15l7-7 7 7" />
        </svg>

      </button>
    </div>
  </transition>
</template>

<style scoped>
.fade-enter-active,
.fade-leave-active {
  transition: all 0.3s ease;
}
.fade-enter-from,
.fade-leave-to {
  opacity: 0;
  transform: translateY(20px);
}
</style>