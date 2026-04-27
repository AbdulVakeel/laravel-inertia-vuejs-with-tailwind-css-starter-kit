<template>
  <nav class="fixed top-0 left-0 right-0 z-50 transition-all duration-300"
       :class="isScrolled ? 'bg-[#0a1628] shadow-lg py-3 border-b border-white/[0.08]' : 'bg-transparent py-4'">
    <div class="max-w-6xl mx-auto px-6">
      <div class="flex items-center justify-between">
        <!-- Logo -->
        <Link :href="route('home')" class="flex items-center gap-3">
          <img src="/img/logo.png" 
               alt="Sky Starter Kit" 
               class="w-10 h-10 object-cover rounded-full border border-amber-500/40">
          <span class="text-xl font-bold text-white">Sky Starter Kit</span>
        </Link>

        <!-- Desktop Menu -->
        <div class="hidden md:flex items-center gap-8">
          <a href="#about" class="text-gray-400 hover:text-white transition-colors text-sm font-medium" 
             @click.prevent="smoothScroll('#about')">About</a>
          <a href="#boards" class="text-gray-400 hover:text-white transition-colors text-sm font-medium" 
             @click.prevent="smoothScroll('#boards')">Boards</a>
          <a href="#streams" class="text-gray-400 hover:text-white transition-colors text-sm font-medium" 
             @click.prevent="smoothScroll('#streams')">Streams</a>
          <a href="#renewal" class="text-gray-400 hover:text-white transition-colors text-sm font-medium" 
             @click.prevent="smoothScroll('#renewal')">Sustainability</a>
          <a href="#roadmap" class="text-gray-400 hover:text-white transition-colors text-sm font-medium" 
             @click.prevent="smoothScroll('#roadmap')">Roadmap</a>
          <a href="#faq" class="text-gray-400 hover:text-white transition-colors text-sm font-medium" 
             @click.prevent="smoothScroll('#faq')">FAQ</a>
          
        
        </div>

        <!-- Desktop Buttons -->
       <div class="hidden md:flex items-center gap-3">
  <!-- Show when NOT logged in -->
  <Link v-if="!user" 
        :href="route('register')" 
        class="bg-gradient-to-r from-amber-500 to-yellow-500 hover:from-amber-400 hover:to-yellow-400 text-black font-semibold py-2 px-6 rounded-full transition-all hover:scale-105">
    Join Now
  </Link>

  <!-- Show Dashboard when logged in, otherwise Sign In -->
  <Link :href="user ? route('user.dashboard') : route('login')"
        :class="user ? 'bg-gradient-to-r from-amber-500 to-yellow-500 hover:from-amber-400 hover:to-yellow-400' : 'bg-green-700 hover:bg-green-600'"
        class="text-black font-semibold py-2 px-5 rounded-full transition-all hover:scale-105"
       >
    {{ user ? 'Dashboard' : 'Sign In' }}
  </Link>
</div>
        <!-- Mobile Menu Button -->
        <button class="md:hidden w-10 h-10 flex items-center justify-center" @click="$emit('toggleMobileMenu')">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
               stroke="currentColor" stroke-width="2" class="w-6 h-6 text-white">
            <line x1="4" x2="20" y1="12" y2="12"></line>
            <line x1="4" x2="20" y1="6" y2="6"></line>
            <line x1="4" x2="20" y1="18" y2="18"></line>
          </svg>
        </button>
      </div>
    </div>
  </nav>
</template>

<script setup>
import { ref, onMounted, onUnmounted,computed } from 'vue'
import { Link,usePage } from '@inertiajs/vue3'
const user = computed(() => usePage().props.user);


const isScrolled = ref(false)
const isDropdownOpen = ref(false)

const openDropdown = () => {
  isDropdownOpen.value = true
}

const closeDropdown = () => {
  isDropdownOpen.value = false
}

const handleScroll = () => {
  isScrolled.value = window.scrollY > 50
}

const smoothScroll = (targetId) => {
  const element = document.querySelector(targetId)
  if (element) {
    element.scrollIntoView({ behavior: 'smooth', block: 'start' })
  }
}

onMounted(() => {
  window.addEventListener('scroll', handleScroll)
})

onUnmounted(() => {
  window.removeEventListener('scroll', handleScroll)
})

defineEmits(['toggleMobileMenu'])
</script>

<style scoped>
.rotate-180 {
  transform: rotate(180deg);
}
</style>