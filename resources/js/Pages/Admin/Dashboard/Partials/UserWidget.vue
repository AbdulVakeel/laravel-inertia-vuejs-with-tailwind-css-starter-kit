<script setup>
import { computed } from 'vue'
import { usePage } from '@inertiajs/vue3'
import useCurrencyFormatter from '@/Composables/useCurrencyFormatter.js'

const { formatCurrencySymbol, formatNumber } = useCurrencyFormatter()

const app = computed(() => usePage().props.app)
const data = computed(() => usePage().props.data)
</script>

<template>
  <div class="grid grid-cols-2 md:grid-cols-4 gap-2">

    <!-- All Users -->
    <div class="flex items-center gap-3 px-4 py-3 rounded-xl border border-amber-500/40 bg-amber-500/5 min-w-0">
      <div class="w-8 h-8 flex items-center justify-center rounded-lg text-amber-400 bg-amber-500/15">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path d="m18 9-6-6-6 6"/>
          <path d="M12 3v14"/>
          <path d="M5 21h14"/>
        </svg>
      </div>
      <div class="min-w-0">
        <div class="text-lg font-bold text-amber-300">
          {{ data.all_users }}
        </div>
        <div class="text-gray-500 text-[10px] uppercase tracking-wider mt-1 truncate">
          {{ __('All User') }}
        </div>
      </div>
    </div>

    <!-- Banned Users -->
    <div class="flex items-center gap-3 px-4 py-3 rounded-xl border border-cyan-500/30 bg-cyan-500/5 min-w-0">
      <div class="w-8 h-8 flex items-center justify-center rounded-lg text-cyan-400 bg-cyan-500/15">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <line x1="3" x2="21" y1="22" y2="22"/>
          <line x1="6" x2="6" y1="18" y2="11"/>
          <line x1="10" x2="10" y1="18" y2="11"/>
          <line x1="14" x2="14" y1="18" y2="11"/>
          <line x1="18" x2="18" y1="18" y2="11"/>
          <polygon points="12 2 20 7 4 7"/>
        </svg>
      </div>
      <div class="min-w-0">
        <div class="text-lg font-bold text-cyan-300">
          {{ data.banned_users }}
        </div>
        <div class="text-gray-500 text-[10px] uppercase tracking-wider mt-1 truncate">
          {{ __('Banned User') }}
        </div>
      </div>
    </div>

    <!-- Verified Users -->
    <div class="flex items-center gap-3 px-4 py-3 rounded-xl border border-blue-500/30 bg-blue-500/5 min-w-0">
      <div class="w-8 h-8 flex items-center justify-center rounded-lg text-blue-400 bg-blue-500/15">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <polyline points="22 7 13.5 15.5 8.5 10.5 2 17"/>
          <polyline points="16 7 22 7 22 13"/>
        </svg>
      </div>
      <div class="min-w-0">
        <div class="text-lg font-bold text-blue-300">
          {{ data.verify_users }}
        </div>
        <div class="text-gray-500 text-[10px] uppercase tracking-wider mt-1 truncate">
          {{ __('Email Verified Users') }}
        </div>
      </div>
    </div>

    <!-- Unverified Users -->
    <div class="flex items-center gap-3 px-4 py-3 rounded-xl border border-purple-500/30 bg-purple-500/5 min-w-0">
      <div class="w-8 h-8 flex items-center justify-center rounded-lg text-purple-400 bg-purple-500/15">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <circle cx="12" cy="12" r="10"/>
          <path d="M16 8h-6a2 2 0 1 0 0 4h4a2 2 0 1 1 0 4H8"/>
          <path d="M12 18V6"/>
        </svg>
      </div>
      <div class="min-w-0">
        <div class="text-lg font-bold text-purple-300">
          {{ data.email_unverified_users }}
        </div>
        <div class="text-gray-500 text-[10px] uppercase tracking-wider mt-1 truncate">
          {{ __('Email Unverified Users') }}
        </div>
      </div>
    </div>

    <!-- 🔥 DEPOSIT WALLET - SAME DESIGN AS ABOVE -->
    <div class="flex items-center gap-3 px-4 py-3 rounded-xl border border-emerald-500/40 bg-emerald-500/5 min-w-0">
      <div class="w-8 h-8 flex items-center justify-center rounded-lg text-emerald-400 bg-emerald-500/15">
        <Icon name="Staking-Wallets" class="w-4 h-4" />
      </div>
      <div class="min-w-0">
        <div class="text-lg font-bold text-emerald-300">
          {{ formatNumber(data.total_deposit_wallet) }}
        </div>
        <div class="text-gray-500 text-[10px] uppercase tracking-wider mt-1 truncate">
          {{ __('Deposit Wallet') }}
        </div>
      </div>
    </div>

    <!-- 🔥 EARNING WALLET - SAME DESIGN AS ABOVE -->
    <div class="flex items-center gap-3 px-4 py-3 rounded-xl border border-cyan-500/40 bg-cyan-500/5 min-w-0">
      <div class="w-8 h-8 flex items-center justify-center rounded-lg text-cyan-400 bg-cyan-500/15">
        <Icon name="Staking-Roi" class="w-4 h-4" />
      </div>
      <div class="min-w-0">
        <div class="text-lg font-bold text-cyan-300">
          {{ formatNumber(data.total_earning_wallet) }}
        </div>
        <div class="text-gray-500 text-[10px] uppercase tracking-wider mt-1 truncate">
          {{ __('Earning Wallet') }}
        </div>
      </div>
    </div>

    <!-- 🔥 TOTAL BALANCE - SAME DESIGN AS ABOVE -->
    <div class="flex items-center gap-3 px-4 py-3 rounded-xl border border-purple-500/40 bg-purple-500/5 min-w-0">
      <div class="w-8 h-8 flex items-center justify-center rounded-lg text-purple-400 bg-purple-500/15">
        <Icon name="All_User_Income" class="w-4 h-4" />
      </div>
      <div class="min-w-0">
        <div class="text-lg font-bold text-purple-300">
          {{ formatNumber(data.total_wallet_balance) }}
        </div>
        <div class="text-gray-500 text-[10px] uppercase tracking-wider mt-1 truncate">
          {{ __('Total Balance') }}
        </div>
      </div>
    </div>

  </div>
</template>