<script setup>
import { computed } from 'vue'
import { usePage } from '@inertiajs/vue3'

const { item } = defineProps({
  item: [Array, Object],
})

const data = computed(() => usePage().props.data)
const app = computed(() => usePage().props.app)
</script>

<template>
  <div class="grid grid-cols-1 md:grid-cols-2 gap-3">

    <!-- Deposit Wallet -->
    <div class="flex items-center gap-3 px-4 py-3 rounded-xl border border-emerald-500/40 bg-emerald-500/5 min-w-0">
      <div class="w-8 h-8 flex items-center justify-center rounded-lg text-emerald-400 bg-emerald-500/15">
        <Icon name="All_User_Income" class="h-4 w-4" />
      </div>
      <div class="min-w-0">
        <div class="text-lg font-bold text-emerald-300">
         {{ (data.deposit_wallet) }}
        </div>
        <div class="text-gray-500 text-[10px] uppercase tracking-wider mt-1 truncate">
          {{ __('Deposit Wallet Balance') }}
        </div>
      </div>
    </div>

    <!-- Encash Wallet -->
    <div class="flex items-center gap-3 px-4 py-3 rounded-xl border border-cyan-500/40 bg-cyan-500/5 min-w-0">
      <div class="w-8 h-8 flex items-center justify-center rounded-lg text-cyan-400 bg-cyan-500/15">
        <Icon name="cash-wallets" class="h-4 w-4" />
      </div>
      <div class="min-w-0">
        <div class="text-lg font-bold text-cyan-300">
         {{ (data.earning_wallet) }}
        </div>
        <div class="text-gray-500 text-[10px] uppercase tracking-wider mt-1 truncate">
          {{ __('Earning Wallet') }}
        </div>
      </div>
    </div>

   

  </div>
</template>