<template>
  <div class="bg-[#0a1628] min-h-screen">
    <!-- Header Component -->
    <Header @toggleMobileMenu="toggleMobileMenu" />

    <!-- Mobile Menu Panel -->
    <div v-show="isMobileMenuOpen"
         class="fixed inset-0 z-40 bg-[#0a1628] pt-24 px-6 transition-all duration-300 md:hidden overflow-y-auto">
      <div class="flex flex-col space-y-4">
        <a href="#about" class="text-gray-400 hover:text-white py-2" 
           @click.prevent="closeMobileMenuAndScroll('#about')">About</a>
        <a href="#boards" class="text-gray-400 hover:text-white py-2" 
           @click.prevent="closeMobileMenuAndScroll('#boards')">Boards</a>
        <a href="#streams" class="text-gray-400 hover:text-white py-2" 
           @click.prevent="closeMobileMenuAndScroll('#streams')">Streams</a>
        <a href="#renewal" class="text-gray-400 hover:text-white py-2" 
           @click.prevent="closeMobileMenuAndScroll('#renewal')">Sustainability</a>
        <a href="#roadmap" class="text-gray-400 hover:text-white py-2" 
           @click.prevent="closeMobileMenuAndScroll('#roadmap')">Roadmap</a>
        <a href="#faq" class="text-gray-400 hover:text-white py-2" 
           @click.prevent="closeMobileMenuAndScroll('#faq')">FAQ</a>
        
           <Link v-if="!user" 
        :href="route('register')" 
        class="bg-gradient-to-r from-amber-500 to-yellow-500 text-black font-semibold rounded-full px-6 py-2 mt-4 text-center">
    Join Now
  </Link>

  <!-- Show Dashboard when logged in, otherwise Sign In -->
  <Link :href="user ? route('user.dashboard') : route('login')"
        :class="user ? 'bg-gradient-to-r from-amber-500 to-yellow-500 hover:from-amber-400 hover:to-yellow-400' : 'bg-green-700 hover:bg-green-600'"
        class="bg-green-700 hover:bg-green-600 text-white rounded-full px-5 py-2 text-center"
       >
    {{ user ? 'Dashboard' : 'Sign In' }}
  </Link>
     
      </div>
    </div>

    <!-- Main Content -->
    <main>
      <slot />
    </main>
 <BackToTop :show="scrolledFromTop" />
    <Footer />
    
  </div>
</template>

<script setup>

import { Link,usePage } from '@inertiajs/vue3'

import Header from './_partials/Header.vue'
import Footer from './_partials/Footer.vue'
import BackToTop from "./_partials/BackToTop.vue";
import { ref,computed, onMounted, onUnmounted } from 'vue'

const scrolledFromTop = ref(false)

const handleScroll = () => {
  scrolledFromTop.value = window.scrollY > 200 
}

onMounted(() => {
  window.addEventListener('scroll', handleScroll)
})

onUnmounted(() => {
  window.removeEventListener('scroll', handleScroll)
})
const user = computed(() => usePage().props.user);


const isMobileMenuOpen = ref(false)

const toggleMobileMenu = () => {
  isMobileMenuOpen.value = !isMobileMenuOpen.value
  document.body.style.overflow = isMobileMenuOpen.value ? 'hidden' : ''
}

const closeMobileMenu = () => {
  isMobileMenuOpen.value = false
  document.body.style.overflow = ''
}

const closeMobileMenuAndScroll = (targetId) => {
  isMobileMenuOpen.value = false
  document.body.style.overflow = ''
  const element = document.querySelector(targetId)
  if (element) {
    element.scrollIntoView({ behavior: 'smooth', block: 'start' })
  }
}
</script>