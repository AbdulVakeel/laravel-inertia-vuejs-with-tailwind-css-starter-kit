<template>
  <div class="min-h-screen bg-[#0a1628]">
    <div class="relative py-24 px-6 text-center border-b border-white/5">
      <div class="absolute inset-0 bg-gradient-to-b from-amber-900/10 to-transparent pointer-events-none"></div>
      <div class="relative max-w-3xl mx-auto">
        <span class="text-amber-400 text-xs font-semibold tracking-widest uppercase mb-4 block">Getting Started</span>
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-4 leading-tight">
          How <span class="bg-gradient-to-r from-amber-400 to-yellow-300 bg-clip-text text-transparent">Sky Starter Kit</span> Works
        </h1>
        <p class="text-gray-400 text-lg leading-relaxed">
          A simple 2×2 forced matrix that cycles when all 7 spots fill — then repeats. Your direct referrals 
          <span class="text-amber-300 font-semibold">Follow You</span> to every new board. Here's everything you need to know.
        </p>
      </div>
    </div>

    <div class="max-w-4xl mx-auto px-6 py-16 space-y-20">
      <!-- Matrix Structure Section -->
      <section>
        <h2 class="text-2xl font-bold text-white mb-2 flex items-center gap-3">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="lucide lucide-users w-6 h-6 text-amber-400">
            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
            <circle cx="9" cy="7" r="4"></circle>
            <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
          </svg>
          The Matrix Structure
        </h2>
        <p class="text-gray-400 mb-8">
          Each board is a 2×2 forced matrix with 7 positions total — you at the top, 2 spots on Level 1, and 4 spots on Level 2. 
          <span class="text-white font-medium">Any position can be filled by anyone</span> — your direct referrals, community spillover from your upline, or recruits of your Level 1. 
          <span class="text-amber-300 font-medium">Level 1 is not reserved for directs</span> — whoever arrives first fills the spot, whether that's someone you referred or spillover from above.
        </p>

        <div class="rounded-2xl bg-white/[0.03] border border-white/10 p-6 md:p-10">
          <p class="text-xs text-gray-500 mb-4 uppercase tracking-wide text-center">
            Example — 2 direct referrals on Level 1, spillover filling Level 2
          </p>
          
          <div class="flex flex-col items-center gap-4 py-4">
            <div class="flex flex-col items-center">
              <div class="px-5 py-2 rounded-xl bg-amber-500 text-black font-bold text-sm shadow-lg shadow-amber-500/30">You</div>
              <div class="text-xs text-amber-400 mt-1">You (Position 1)</div>
            </div>
            
            <div class="w-px h-5 bg-amber-500/40"></div>
            
            <div class="flex items-start gap-6 md:gap-12">
              <div class="flex flex-col items-center">
                <div class="px-4 py-2 rounded-xl font-semibold text-sm bg-blue-600/80 border border-blue-400/40 text-white">Direct 1</div>
                <div class="text-xs mt-1 text-blue-300">Direct</div>
              </div>
              <div class="flex flex-col items-center">
                <div class="px-4 py-2 rounded-xl font-semibold text-sm bg-blue-600/80 border border-blue-400/40 text-white">Direct 2</div>
                <div class="text-xs mt-1 text-blue-300">Direct</div>
              </div>
            </div>
            
            <div class="w-px h-5 bg-white/10"></div>
            
            <div class="flex items-start gap-2 md:gap-4 flex-wrap justify-center">
              <div class="flex flex-col items-center">
                <div class="px-3 py-2 rounded-xl text-xs font-semibold bg-white/5 border border-white/10 text-gray-400">Spillover 1</div>
                <div class="text-xs mt-1 text-gray-500">Spillover</div>
              </div>
              <div class="flex flex-col items-center">
                <div class="px-3 py-2 rounded-xl text-xs font-semibold bg-white/5 border border-white/10 text-gray-400">Spillover 2</div>
                <div class="text-xs mt-1 text-gray-500">Spillover</div>
              </div>
              <div class="flex flex-col items-center">
                <div class="px-3 py-2 rounded-xl text-xs font-semibold bg-white/5 border border-white/10 text-gray-400">Spillover 3</div>
                <div class="text-xs mt-1 text-gray-500">Spillover</div>
              </div>
              <div class="flex flex-col items-center">
                <div class="px-3 py-2 rounded-xl text-xs font-semibold bg-white/5 border border-white/10 text-gray-400">Spillover 4</div>
                <div class="text-xs mt-1 text-gray-500">Spillover</div>
              </div>
            </div>
          </div>

          <div class="mt-6 p-4 rounded-xl bg-amber-900/20 border border-amber-500/30 text-sm text-gray-300">
            <span class="text-amber-300 font-semibold">Real scenario:</span> You join Board 1 and do nothing for 2 weeks. The community is growing — upline spillover fills all 6 positions below you. Your matrix cycles. You collect the payout. 
            <span class="text-white font-medium">That's the power of a forced matrix.</span>
          </div>

          <div class="mt-3 p-4 rounded-xl bg-red-900/20 border border-red-500/30 text-sm text-gray-300 flex items-start gap-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="lucide lucide-circle-alert w-5 h-5 text-red-400 flex-shrink-0 mt-0.5">
              <circle cx="12" cy="12" r="10"></circle>
              <line x1="12" x2="12" y1="8" y2="12"></line>
              <line x1="12" x2="12.01" y1="16" y2="16"></line>
            </svg>
            <div>
              <span class="text-red-300 font-semibold">Important:</span> To collect your cycle payout, you must have 
              <span class="text-white font-semibold">at least 2 direct referrals</span> — regardless of how many spillover positions have filled. Spillover alone will not qualify you for the payout.
            </div>
          </div>

          <div class="mt-4 grid md:grid-cols-3 gap-4 text-sm">
            <div class="p-3 rounded-lg bg-amber-500/10 border border-amber-500/20">
              <div class="text-amber-400 font-semibold mb-1">You — Position 1</div>
              <div class="text-gray-400">The matrix owner. Collects the payout when all 7 positions fill — <span class="text-amber-300 font-medium">provided you have at least 2 direct referrals</span>.</div>
            </div>
            <div class="p-3 rounded-lg bg-blue-500/10 border border-blue-500/20">
              <div class="text-blue-300 font-semibold mb-1">Level 1 — 2 Positions</div>
              <div class="text-gray-400">Can be your direct referrals OR spillover — whoever arrives first.</div>
            </div>
            <div class="p-3 rounded-lg bg-emerald-500/10 border border-emerald-500/20">
              <div class="text-emerald-300 font-semibold mb-1">Level 2 — 4 Positions</div>
              <div class="text-gray-400">Recruits of your Level 1, or more spillover. All 4 must fill to cycle.</div>
            </div>
          </div>
        </div>
      </section>

      <!-- Follow-Me Placement Section -->
      <section>
        <h2 class="text-2xl font-bold text-white mb-2 flex items-center gap-3">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="lucide lucide-zap w-6 h-6 text-amber-400">
            <path d="M4 14a1 1 0 0 1-.78-1.63l9.9-10.2a.5.5 0 0 1 .86.46l-1.92 6.02A1 1 0 0 0 13 10h7a1 1 0 0 1 .78 1.63l-9.9 10.2a.5.5 0 0 1-.86-.46l1.92-6.02A1 1 0 0 0 11 14z"></path>
          </svg>
          Follow-Me Placement
        </h2>
        <p class="text-gray-400 mb-2">
          <span class="text-white font-semibold">Follow-Me</span> is how Sky Starter Kit ensures your direct referrals stay connected to you across boards. Here's the rule:
        </p>
        <p class="text-gray-400 mb-6">
          Whenever a direct referral of yours upgrades to a new board 
          <span class="text-white font-medium">and you are already active on that board</span>, they are placed directly under you — not just anywhere in the matrix. They follow you.
        </p>

        <div class="space-y-4">
          <div class="rounded-xl border border-white/10 bg-white/[0.02] overflow-hidden">
            <button class="w-full flex items-center justify-between px-5 py-4 text-left hover:bg-white/5 transition-colors">
              <span class="text-white font-semibold text-sm">Follow-Me Example — Chris & Mary</span>
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="lucide lucide-chevron-down w-4 h-4 text-amber-400">
                <path d="m6 9 6 6 6-6"></path>
              </svg>
            </button>
          </div>

          <div class="p-4 rounded-xl bg-blue-900/20 border border-blue-500/20 text-sm text-gray-400 flex items-start gap-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="lucide lucide-info w-5 h-5 text-blue-400 flex-shrink-0 mt-0.5">
              <circle cx="12" cy="12" r="10"></circle>
              <path d="M12 16v-4"></path>
              <path d="M12 8h.01"></path>
            </svg>
            <div>
              <span class="text-blue-300 font-semibold">Key point:</span> Follow-Me only applies to your 
              <span class="text-white font-medium">direct referrals</span>. If someone lands in your matrix through spillover or as an indirect referral, you earn the payout from that position — but they are not bound to you on future boards.
            </div>
          </div>
        </div>
      </section>

      <!-- Progression Scenarios Section -->
      <section>
        <h2 class="text-2xl font-bold text-white mb-2 flex items-center gap-3">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="lucide lucide-circle-check-big w-6 h-6 text-amber-400">
            <path d="M21.801 10A10 10 0 1 1 17 3.335"></path>
            <path d="m9 11 3 3L22 4"></path>
          </svg>
          Progression Scenarios
        </h2>
        <p class="text-gray-400 mb-6">Two common paths — with and without skipping boards.</p>

        <div class="space-y-4">
          <!-- Scenario A -->
          <div class="rounded-2xl border border-emerald-500/20 bg-emerald-900/10 p-6">
            <div class="flex items-center gap-3 mb-4">
              <div class="px-3 py-1 rounded-full bg-emerald-500/20 text-emerald-300 text-xs font-semibold">Scenario A — Standard Progression</div>
            </div>
            <ol class="space-y-3 text-sm text-gray-300">
              <li class="flex items-start gap-3">
                <div class="w-8 h-8 rounded-full bg-amber-500 text-black font-bold text-sm flex items-center justify-center flex-shrink-0">1</div>
                <div>You enter <span class="text-white font-medium">Board 1 ($25)</span>. Whether you recruit or not, the matrix fills — from your directs, their recruits, or community spillover.</div>
              </li>
              <li class="flex items-start gap-3">
                <div class="w-8 h-8 rounded-full bg-amber-500 text-black font-bold text-sm flex items-center justify-center flex-shrink-0">2</div>
                <div>All 7 positions fill. Matrix cycles → you receive <span class="text-emerald-300 font-semibold">$75</span>. You advance to Board 2.</div>
              </li>
              <li class="flex items-start gap-3">
                <div class="w-8 h-8 rounded-full bg-amber-500 text-black font-bold text-sm flex items-center justify-center flex-shrink-0">3</div>
                <div>On <span class="text-white font-medium">Board 2 ($50)</span>, your direct referrals follow you (Follow-Me) as they finish their Board 1 cycles. The process repeats.</div>
              </li>
            </ol>
            <div class="mt-4 p-3 rounded-lg bg-emerald-500/10 text-xs text-emerald-300 font-medium">
              ✓ Outcome: Full payouts on every board. Your directs stay connected to you.
            </div>
          </div>

          <!-- Scenario B -->
          <div class="rounded-2xl border border-orange-500/20 bg-orange-900/10 p-6">
            <div class="flex items-center gap-3 mb-4">
              <div class="px-3 py-1 rounded-full bg-orange-500/20 text-orange-300 text-xs font-semibold">Scenario B — Direct Skips to Higher Board First</div>
            </div>
            <ol class="space-y-3 text-sm text-gray-300">
              <li class="flex items-start gap-3">
                <div class="w-8 h-8 rounded-full bg-amber-500 text-black font-bold text-sm flex items-center justify-center flex-shrink-0">1</div>
                <div>You are active on Boards 1–3. One of your directs upgrades to <span class="text-white font-medium">Board 5 ($500)</span> before you do.</div>
              </li>
              <li class="flex items-start gap-3">
                <div class="w-8 h-8 rounded-full bg-amber-500 text-black font-bold text-sm flex items-center justify-center flex-shrink-0">2</div>
                <div>Because you are not yet on Board 5, Follow-Me cannot activate. Your direct is placed under the <span class="text-orange-300">next active upline</span> on that board instead.</div>
              </li>
              <li class="flex items-start gap-3">
                <div class="w-8 h-8 rounded-full bg-amber-500 text-black font-bold text-sm flex items-center justify-center flex-shrink-0">3</div>
                <div>Their Board 5 matrix cycles. You miss that cycle's commission. Once you upgrade to Board 5, your direct will follow you on the <span class="text-white font-medium">next</span> Board 5 cycle.</div>
              </li>
            </ol>
            <div class="mt-4 p-3 rounded-lg bg-orange-500/10 text-xs text-orange-300 font-medium flex items-start gap-2">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="lucide lucide-circle-alert w-4 h-4 flex-shrink-0 mt-0.5">
                <circle cx="12" cy="12" r="10"></circle>
                <line x1="12" x2="12" y1="8" y2="12"></line>
                <line x1="12" x2="12.01" y1="16" y2="16"></line>
              </svg>
              <span>Outcome: You miss that round's payout. Upgrade boards in order to keep Follow-Me active for your directs.</span>
            </div>
          </div>
        </div>
      </section>

      <!-- Sky Starter Kit  Bonus Rewards Section -->
      <section>
        <h2 class="text-2xl font-bold text-white mb-4 flex items-center gap-3">
          <span class="text-2xl">🏅</span>Sky Starter Kit Bonus Rewards
        </h2>
        <p class="text-gray-400 mb-6">
          Every time your matrix cycles, you don't just receive the USDT payout — you also unlock 
          <span class="text-white font-medium">Sky Starter Kit Bonus assets</span> tied to that board level.
        </p>

        <div class="grid md:grid-cols-3 gap-4">
          <div class="flex items-start gap-4 p-5 rounded-2xl border border-yellow-500/20 bg-yellow-900/10">
            <span class="text-3xl">🥇</span>
            <div class="flex-1">
              <div class="text-yellow-300 font-semibold mb-1">Gold (PAXG)</div>
              <div class="text-gray-400 text-sm mb-3">Fractional tokenized gold allocated to your account with each cycle.</div>
              <button class="text-xs text-yellow-400 border border-yellow-500/40 rounded-full px-3 py-1 hover:bg-yellow-500/10 transition-colors">Learn More →</button>
            </div>
          </div>

          <div class="flex items-start gap-4 p-5 rounded-2xl border border-slate-400/20 bg-slate-800/20">
            <span class="text-3xl">🥈</span>
            <div class="flex-1">
              <div class="text-slate-300 font-semibold mb-1">Silver</div>
              <div class="text-gray-400 text-sm mb-3">Physical silver allocation added to your portfolio on every board completion.</div>
              <button class="text-xs text-slate-300 border border-slate-400/40 rounded-full px-3 py-1 hover:bg-slate-500/10 transition-colors">Learn More →</button>
            </div>
          </div>

          <div class="flex items-start gap-4 p-5 rounded-2xl border border-emerald-500/20 bg-emerald-900/10">
            <span class="text-3xl">💎</span>
            <div class="flex-1">
              <div class="text-emerald-300 font-semibold mb-1">IQD Tokens</div>
              <div class="text-gray-400 text-sm mb-3">Tokenized Iraqi Dinar awarded each cycle — a long-term appreciating asset.</div>
              <button class="text-xs text-emerald-400 border border-emerald-500/40 rounded-full px-3 py-1 hover:bg-emerald-500/10 transition-colors">Learn More →</button>
            </div>
          </div>
        </div>

        <div class="mt-4 p-4 rounded-xl bg-amber-900/20 border border-amber-500/30 text-sm text-gray-300">
          <span class="text-amber-300 font-semibold">Compounding value:</span> Each board awards progressively larger Sky Starter Kit bonus allocations — the higher the board, the greater the asset reward.
        </div>
      </section>

      <!-- Quick Rules Summary Section -->
      <section>
        <h2 class="text-2xl font-bold text-white mb-6">Quick Rules Summary</h2>
        <div class="grid md:grid-cols-2 gap-4 text-sm">
          <div class="flex items-start gap-3 p-4 rounded-xl border border-emerald-500/20 bg-emerald-900/10">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="lucide lucide-circle-check-big w-4 h-4 text-emerald-400 flex-shrink-0 mt-0.5">
              <path d="M21.801 10A10 10 0 1 1 17 3.335"></path>
              <path d="m9 11 3 3L22 4"></path>
            </svg>
            <span class="text-gray-300">Level 1 and Level 2 positions can be filled by anyone — your directs, their recruits, or spillover from the community.</span>
          </div>
          <div class="flex items-start gap-3 p-4 rounded-xl border border-emerald-500/20 bg-emerald-900/10">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="lucide lucide-circle-check-big w-4 h-4 text-emerald-400 flex-shrink-0 mt-0.5">
              <path d="M21.801 10A10 10 0 1 1 17 3.335"></path>
              <path d="m9 11 3 3L22 4"></path>
            </svg>
            <span class="text-gray-300">Direct referrals follow you (Follow-Me) to each new board — as long as you are already active on that board.</span>
          </div>
          <div class="flex items-start gap-3 p-4 rounded-xl border border-emerald-500/20 bg-emerald-900/10">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="lucide lucide-circle-check-big w-4 h-4 text-emerald-400 flex-shrink-0 mt-0.5">
              <path d="M21.801 10A10 10 0 1 1 17 3.335"></path>
              <path d="m9 11 3 3L22 4"></path>
            </svg>
            <span class="text-gray-300">Matrix cycles when all 7 positions are filled (you + 2 on L1 + 4 on L2) AND you have at least 2 direct referrals.</span>
          </div>
          <div class="flex items-start gap-3 p-4 rounded-xl border border-emerald-500/20 bg-emerald-900/10">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="lucide lucide-circle-check-big w-4 h-4 text-emerald-400 flex-shrink-0 mt-0.5">
              <path d="M21.801 10A10 10 0 1 1 17 3.335"></path>
              <path d="m9 11 3 3L22 4"></path>
            </svg>
            <span class="text-gray-300">You earn a payout for every position that fills in your matrix, regardless of who it is.</span>
          </div>
          <div class="flex items-start gap-3 p-4 rounded-xl border border-red-500/20 bg-red-900/10">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="lucide lucide-circle-alert w-4 h-4 text-red-400 flex-shrink-0 mt-0.5">
              <circle cx="12" cy="12" r="10"></circle>
              <line x1="12" x2="12" y1="8" y2="12"></line>
              <line x1="12" x2="12.01" y1="16" y2="16"></line>
            </svg>
            <span class="text-gray-300">If you are not yet on a board, your direct cannot follow you there — they go under the next active upline.</span>
          </div>
          <div class="flex items-start gap-3 p-4 rounded-xl border border-red-500/20 bg-red-900/10">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="lucide lucide-circle-alert w-4 h-4 text-red-400 flex-shrink-0 mt-0.5">
              <circle cx="12" cy="12" r="10"></circle>
              <line x1="12" x2="12" y1="8" y2="12"></line>
              <line x1="12" x2="12.01" y1="16" y2="16"></line>
            </svg>
            <span class="text-gray-300">If you skip a board, you miss the commission from that cycle. Upgrade in order to protect your earnings.</span>
          </div>
          <div class="flex items-start gap-3 p-4 rounded-xl border border-red-500/20 bg-red-900/10">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="lucide lucide-circle-alert w-4 h-4 text-red-400 flex-shrink-0 mt-0.5">
              <circle cx="12" cy="12" r="10"></circle>
              <line x1="12" x2="12" y1="8" y2="12"></line>
              <line x1="12" x2="12.01" y1="16" y2="16"></line>
            </svg>
            <span class="text-gray-300">Spillover alone does not qualify you for a payout. You must personally refer at least 2 people to collect when your matrix cycles.</span>
          </div>
        </div>
      </section>

      <!-- CTA Button -->
      <div class="text-center pb-8">
        <p class="text-gray-400 mb-6">Ready to activate your first board and start building?</p>
        <Link :href="('home')" 
              class="inline-flex items-center justify-center gap-2 transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 shadow bg-gradient-to-r from-amber-500 to-yellow-500 hover:from-amber-400 hover:to-yellow-400 text-black font-semibold rounded-full px-8 py-3 text-base">
          Get Started — Join Board 1
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="lucide lucide-arrow-right ml-2 w-5 h-5">
            <path d="M5 12h14"></path>
            <path d="m12 5 7 7-7 7"></path>
          </svg>
        </Link>
      </div>
    </div>
  </div>
</template>

<script setup>
import Layout from '@/Layouts/FrontendLayout.vue'
import { Link } from '@inertiajs/vue3'
defineOptions({ layout: Layout })
</script>