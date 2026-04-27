<template>
   <div class="max-w-5xl mx-auto pt-32">
      <!-- Header -->
      <div class="text-center mb-8">
        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-amber-500/10 border border-amber-500/30 mb-4">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="lucide lucide-trophy w-4 h-4 text-amber-400">
            <path d="M6 9H4.5a2.5 2.5 0 0 1 0-5H6"></path>
            <path d="M18 9h1.5a2.5 2.5 0 0 0 0-5H18"></path>
            <path d="M4 22h16"></path>
            <path d="M10 14.66V17c0 .55-.47.98-.97 1.21C7.85 18.75 7 20.24 7 22"></path>
            <path d="M14 14.66V17c0 .55.47.98.97 1.21C16.15 18.75 17 20.24 17 22"></path>
            <path d="M18 2H6v7a6 6 0 0 0 12 0V2Z"></path>
          </svg>
          <span class="text-sm text-amber-200">Top Performers</span>
        </div>
        <h1 class="text-3xl md:text-4xl font-bold text-white mb-2">Sky Starter Kit Leaderboard</h1>
        <p class="text-gray-400">Celebrating our highest achievers in the matrix</p>
      </div>

      <!-- Filters -->
      <div class="flex flex-col sm:flex-row items-center justify-between gap-4 mb-6">
        <div class="flex items-center gap-2">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="lucide lucide-filter w-4 h-4 text-gray-400">
            <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon>
          </svg>
          <span class="text-gray-400 text-sm">Filter by:</span>
        </div>
        <div class="flex flex-wrap items-center gap-3">
          <!-- Time Period Dropdown -->
          <div class="relative">
            <button @click="toggleTimeDropdown" 
                class="flex h-9 items-center justify-between whitespace-nowrap rounded-md border px-3 py-2 text-sm shadow-sm w-36 bg-[#0d1829] border-white/10 text-white">
              <span>{{ selectedTime }}</span>
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="lucide lucide-chevron-down h-4 w-4 opacity-50" :class="{ 'rotate-180': isTimeDropdownOpen }">
                <path d="m6 9 6 6 6-6"></path>
              </svg>
            </button>
            <div v-if="isTimeDropdownOpen" class="absolute top-full left-0 mt-1 w-36 bg-[#0d1829] border border-white/10 rounded-md shadow-lg z-10">
              <div v-for="option in timeOptions" :key="option" @click="selectTime(option)" 
                  class="px-3 py-2 text-sm text-gray-400 hover:text-white hover:bg-white/5 cursor-pointer">
                {{ option }}
              </div>
            </div>
          </div>

          <!-- Category Dropdown -->
          <div class="relative">
            <button @click="toggleCategoryDropdown" 
                class="flex h-9 items-center justify-between whitespace-nowrap rounded-md border px-3 py-2 text-sm shadow-sm w-44 bg-[#0d1829] border-white/10 text-white">
              <span>{{ selectedCategory }}</span>
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="lucide lucide-chevron-down h-4 w-4 opacity-50" :class="{ 'rotate-180': isCategoryDropdownOpen }">
                <path d="m6 9 6 6 6-6"></path>
              </svg>
            </button>
            <div v-if="isCategoryDropdownOpen" class="absolute top-full left-0 mt-1 w-44 bg-[#0d1829] border border-white/10 rounded-md shadow-lg z-10">
              <div v-for="option in categoryOptions" :key="option" @click="selectCategory(option)" 
                  class="px-3 py-2 text-sm text-gray-400 hover:text-white hover:bg-white/5 cursor-pointer">
                {{ option }}
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Top 3 Cards -->
      <div class="grid grid-cols-3 gap-3 mb-8">
        <!-- 2nd Place -->
        <div class="relative p-4 rounded-xl border text-center bg-gradient-to-r from-slate-700/30 to-slate-800/20 border-slate-400/30">
          <div class="absolute -top-3 left-1/2 -translate-x-1/2 w-8 h-8 rounded-full bg-[#0a1628] border border-white/10 flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="lucide lucide-medal w-5 h-5 text-slate-300">
              <path d="M7.21 15 2.66 7.14a2 2 0 0 1 .13-2.2L4.4 2.8A2 2 0 0 1 6 2h12a2 2 0 0 1 1.6.8l1.6 2.14a2 2 0 0 1 .14 2.2L16.79 15"></path>
              <path d="M11 12 5.12 2.2"></path>
              <path d="m13 12 5.88-9.8"></path>
              <path d="M8 7h8"></path>
              <circle cx="12" cy="17" r="5"></circle>
              <path d="M12 18v-2h-.5"></path>
            </svg>
          </div>
          <div class="w-14 h-14 rounded-full mx-auto mt-4 mb-3 flex items-center justify-center text-lg font-bold bg-slate-500/20 text-slate-300">
            {{ top3[1]?.initials || 'AM' }}
          </div>
          <h3 class="text-white font-semibold text-sm md:text-base truncate">{{ top3[1]?.name || 'Alexander M.' }}</h3>
          <div class="text-amber-400 font-bold text-lg mt-1">{{ top3[1]?.completions || 45 }}</div>
          <div class="text-gray-500 text-xs">completions</div>
          <div class="text-green-400 text-sm mt-2">${{ top3[1]?.totalValue || '892.50' }}</div>
        </div>

        <!-- 1st Place -->
        <div class="relative p-4 rounded-xl border text-center bg-gradient-to-r from-yellow-900/30 to-amber-900/20 border-yellow-500/30 md:-mt-4">
          <div class="absolute -top-3 left-1/2 -translate-x-1/2 w-8 h-8 rounded-full bg-[#0a1628] border border-white/10 flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="lucide lucide-crown w-5 h-5 text-yellow-400">
              <path d="M11.562 3.266a.5.5 0 0 1 .876 0L15.39 8.87a1 1 0 0 0 1.516.294L21.183 5.5a.5.5 0 0 1 .798.519l-2.834 10.246a1 1 0 0 1-.956.734H5.81a1 1 0 0 1-.957-.734L2.02 6.02a.5.5 0 0 1 .798-.519l4.276 3.664a1 1 0 0 0 1.516-.294z"></path>
              <path d="M5 21h14"></path>
            </svg>
          </div>
          <div class="w-14 h-14 rounded-full mx-auto mt-4 mb-3 flex items-center justify-center text-lg font-bold bg-yellow-500/20 text-yellow-400">
            {{ top3[0]?.initials || 'SK' }}
          </div>
          <h3 class="text-white font-semibold text-sm md:text-base truncate">{{ top3[0]?.name || 'Sarah K.' }}</h3>
          <div class="text-amber-400 font-bold text-lg mt-1">{{ top3[0]?.completions || 38 }}</div>
          <div class="text-gray-500 text-xs">completions</div>
          <div class="text-green-400 text-sm mt-2">${{ top3[0]?.totalValue || '753.20' }}</div>
        </div>

        <!-- 3rd Place -->
        <div class="relative p-4 rounded-xl border text-center bg-gradient-to-r from-amber-800/30 to-orange-900/20 border-amber-600/30">
          <div class="absolute -top-3 left-1/2 -translate-x-1/2 w-8 h-8 rounded-full bg-[#0a1628] border border-white/10 flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="lucide lucide-award w-5 h-5 text-amber-600">
              <path d="m15.477 12.89 1.515 8.526a.5.5 0 0 1-.81.47l-3.58-2.687a1 1 0 0 0-1.197 0l-3.586 2.686a.5.5 0 0 1-.81-.469l1.514-8.526"></path>
              <circle cx="12" cy="8" r="6"></circle>
            </svg>
          </div>
          <div class="w-14 h-14 rounded-full mx-auto mt-4 mb-3 flex items-center justify-center text-lg font-bold bg-amber-600/20 text-amber-500">
            {{ top3[2]?.initials || 'MR' }}
          </div>
          <h3 class="text-white font-semibold text-sm md:text-base truncate">{{ top3[2]?.name || 'Michael R.' }}</h3>
          <div class="text-amber-400 font-bold text-lg mt-1">{{ top3[2]?.completions || 32 }}</div>
          <div class="text-gray-500 text-xs">completions</div>
          <div class="text-green-400 text-sm mt-2">${{ top3[2]?.totalValue || '634.40' }}</div>
        </div>
      </div>

      <!-- Leaderboard Table -->
      <div class="bg-[#0d1829] rounded-xl border border-white/5 overflow-hidden">
        <!-- Table Header -->
        <div class="grid grid-cols-12 gap-2 px-4 py-3 bg-white/5 text-xs text-gray-400 uppercase tracking-wide">
          <div class="col-span-1 text-center">#</div>
          <div class="col-span-4">Member</div>
          <div class="col-span-2 text-center">Completions</div>
          <div class="col-span-2 text-center hidden md:block">Gold (g)</div>
          <div class="col-span-3 md:col-span-3 text-right">Total Value</div>
        </div>

        <!-- Table Rows -->
        <div v-for="(user, index) in leaderboardData" :key="user.id"
             class="grid grid-cols-12 gap-2 px-4 py-3 items-center border-t border-white/5 hover:bg-white/5 transition-colors"
             :class="index < 3 ? 'bg-amber-500/5' : ''">
          
          <!-- Rank -->
          <div class="col-span-1 flex justify-center">
            <span v-if="index === 0" class="text-yellow-400">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="lucide lucide-crown w-5 h-5"><path d="M11.562 3.266a.5.5 0 0 1 .876 0L15.39 8.87a1 1 0 0 0 1.516.294L21.183 5.5a.5.5 0 0 1 .798.519l-2.834 10.246a1 1 0 0 1-.956.734H5.81a1 1 0 0 1-.957-.734L2.02 6.02a.5.5 0 0 1 .798-.519l4.276 3.664a1 1 0 0 0 1.516-.294z"></path><path d="M5 21h14"></path></svg>
            </span>
            <span v-else-if="index === 1" class="text-slate-300">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="lucide lucide-medal w-5 h-5"><path d="M7.21 15 2.66 7.14a2 2 0 0 1 .13-2.2L4.4 2.8A2 2 0 0 1 6 2h12a2 2 0 0 1 1.6.8l1.6 2.14a2 2 0 0 1 .14 2.2L16.79 15"></path><path d="M11 12 5.12 2.2"></path><path d="m13 12 5.88-9.8"></path><path d="M8 7h8"></path><circle cx="12" cy="17" r="5"></circle><path d="M12 18v-2h-.5"></path></svg>
            </span>
            <span v-else-if="index === 2" class="text-amber-600">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="lucide lucide-award w-5 h-5"><path d="m15.477 12.89 1.515 8.526a.5.5 0 0 1-.81.47l-3.58-2.687a1 1 0 0 0-1.197 0l-3.586 2.686a.5.5 0 0 1-.81-.469l1.514-8.526"></path><circle cx="12" cy="8" r="6"></circle></svg>
            </span>
            <span v-else class="text-gray-500 font-medium">{{ index + 1 }}</span>
          </div>

          <!-- Member Info -->
          <div class="col-span-4 flex items-center gap-3">
            <div class="w-9 h-9 rounded-full flex items-center justify-center text-sm font-semibold"
                 :class="index < 3 ? 'bg-amber-500/20 text-amber-400' : 'bg-white/10 text-gray-300'">
              {{ user.initials }}
            </div>
            <span class="text-white font-medium truncate">{{ user.name }}</span>
          </div>

          <!-- Completions -->
          <div class="col-span-2 text-center">
            <span class="text-amber-400 font-bold">{{ user.completions }}</span>
          </div>

          <!-- Gold (hidden on mobile) -->
          <div class="col-span-2 text-center hidden md:block">
            <span class="text-yellow-400">{{ user.gold }}</span>
          </div>

          <!-- Total Value -->
          <div class="col-span-3 md:col-span-3 text-right">
            <span class="text-green-400 font-semibold">${{ user.totalValue }}</span>
          </div>
        </div>
      </div>

      <!-- Stats Footer -->
      <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-6 mb-8">
        <div class="bg-[#0d1829] rounded-xl p-4 border border-white/5 text-center">
          <div class="text-2xl font-bold text-white">{{ stats.totalRanked }}</div>
          <div class="text-gray-400 text-xs mt-1">Total Ranked</div>
        </div>
        <div class="bg-[#0d1829] rounded-xl p-4 border border-white/5 text-center">
          <div class="text-2xl font-bold text-amber-400">{{ stats.totalCompletions }}</div>
          <div class="text-gray-400 text-xs mt-1">Total Completions</div>
        </div>
        <div class="bg-[#0d1829] rounded-xl p-4 border border-white/5 text-center">
          <div class="text-2xl font-bold text-yellow-400">{{ stats.goldDistributed }}</div>
          <div class="text-gray-400 text-xs mt-1">Gold Distributed</div>
        </div>
        <div class="bg-[#0d1829] rounded-xl p-4 border border-white/5 text-center">
          <div class="text-2xl font-bold text-green-400">${{ stats.totalBonuses }}</div>
          <div class="text-gray-400 text-xs mt-1">Total Bonuses</div>
        </div>
      </div>
    </div>

</template>

<script setup>
import { ref, computed } from 'vue'
import { Link } from '@inertiajs/vue3'


import Layout from '@/Layouts/FrontendLayout.vue'

defineOptions({ layout: Layout })

// Dropdown states
const isTimeDropdownOpen = ref(false)
const isCategoryDropdownOpen = ref(false)
const selectedTime = ref('All Time')
const selectedCategory = ref('Board Completions')

const timeOptions = ['All Time', 'This Month', 'This Week', 'Today']
const categoryOptions = ['Board Completions', 'Referrals', 'Team Volume', 'Gold Earned']

const toggleTimeDropdown = () => {
  isTimeDropdownOpen.value = !isTimeDropdownOpen.value
  isCategoryDropdownOpen.value = false
}

const toggleCategoryDropdown = () => {
  isCategoryDropdownOpen.value = !isCategoryDropdownOpen.value
  isTimeDropdownOpen.value = false
}

const selectTime = (option) => {
  selectedTime.value = option
  isTimeDropdownOpen.value = false
  // TODO: Fetch data based on time filter
}

const selectCategory = (option) => {
  selectedCategory.value = option
  isCategoryDropdownOpen.value = false
  // TODO: Fetch data based on category filter
}

// Top 3 leaders
const top3 = ref([
  { id: 1, name: 'Sarah K.', initials: 'SK', completions: 38, gold: '1.90', totalValue: '753.20' },
  { id: 2, name: 'Alexander M.', initials: 'AM', completions: 45, gold: '2.25', totalValue: '892.50' },
  { id: 3, name: 'Michael R.', initials: 'MR', completions: 32, gold: '1.60', totalValue: '634.40' }
])

// Full leaderboard data
const leaderboardData = ref([
  { id: 1, name: 'Alexander M.', initials: 'AM', completions: 45, gold: '2.25', totalValue: '892.50' },
  { id: 2, name: 'Sarah K.', initials: 'SK', completions: 38, gold: '1.90', totalValue: '753.20' },
  { id: 3, name: 'Michael R.', initials: 'MR', completions: 32, gold: '1.60', totalValue: '634.40' },
  { id: 4, name: 'Jessica T.', initials: 'JT', completions: 28, gold: '1.40', totalValue: '555.10' },
  { id: 5, name: 'David L.', initials: 'DL', completions: 25, gold: '1.25', totalValue: '495.63' },
  { id: 6, name: 'Emily W.', initials: 'EW', completions: 22, gold: '1.10', totalValue: '436.15' },
  { id: 7, name: 'James P.', initials: 'JP', completions: 19, gold: '0.95', totalValue: '376.68' },
  { id: 8, name: 'Amanda H.', initials: 'AH', completions: 16, gold: '0.80', totalValue: '317.20' },
  { id: 9, name: 'Robert C.', initials: 'RC', completions: 14, gold: '0.70', totalValue: '277.55' },
  { id: 10, name: 'Lisa N.', initials: 'LN', completions: 12, gold: '0.60', totalValue: '237.90' },
  { id: 11, name: 'Chris B.', initials: 'CB', completions: 10, gold: '0.50', totalValue: '198.25' },
  { id: 12, name: 'Nicole F.', initials: 'NF', completions: 8, gold: '0.40', totalValue: '158.60' }
])

// Stats
const stats = computed(() => ({
  totalRanked: leaderboardData.value.length,
  totalCompletions: leaderboardData.value.reduce((sum, user) => sum + user.completions, 0),
  goldDistributed: leaderboardData.value.reduce((sum, user) => sum + parseFloat(user.gold), 0).toFixed(2) + 'g',
  totalBonuses: leaderboardData.value.reduce((sum, user) => sum + parseFloat(user.totalValue), 0).toFixed(2)
}))

// Close dropdowns when clicking outside
const handleClickOutside = (event) => {
  if (!event.target.closest('.relative')) {
    isTimeDropdownOpen.value = false
    isCategoryDropdownOpen.value = false
  }
}

// Lifecycle
import { onMounted, onUnmounted } from 'vue'
onMounted(() => {
  document.addEventListener('click', handleClickOutside)
})
onUnmounted(() => {
  document.removeEventListener('click', handleClickOutside)
})
</script>

<style scoped>
.rotate-180 {
  transform: rotate(180deg);
}
</style>