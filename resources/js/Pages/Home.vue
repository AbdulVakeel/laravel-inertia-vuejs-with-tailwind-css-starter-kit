<template>
  <!-- Hero Section -->
  <section class="relative min-h-screen flex flex-col items-center justify-center overflow-hidden bg-[#070e1c]">
    <!-- Background Effects -->
    <div class="absolute inset-0 bg-gradient-to-b from-[#070e1c] via-[#0a1628] to-[#070e1c]"></div>
    <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
      <div class="w-[700px] h-[700px] rounded-full bg-amber-500/10 blur-[140px]"></div>
    </div>
    <div class="absolute top-0 left-0 w-[500px] h-[500px] rounded-full bg-amber-600/8 blur-[180px] -translate-x-1/3 -translate-y-1/3"></div>
    <div class="absolute bottom-0 right-0 w-[400px] h-[400px] rounded-full bg-yellow-500/8 blur-[160px] translate-x-1/4 translate-y-1/4"></div>
    <div class="absolute inset-0 opacity-[0.025]" style="background-image: linear-gradient(rgba(255, 215, 0, 0.4) 1px, transparent 1px), linear-gradient(90deg, rgba(255, 215, 0, 0.4) 1px, transparent 1px); background-size: 80px 80px;"></div>
    <div class="absolute top-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-amber-500/30 to-transparent"></div>
    <div class="absolute bottom-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-amber-500/20 to-transparent"></div>
    <div class="absolute top-8 left-8 w-16 h-16 border-l-2 border-t-2 border-amber-500/20 rounded-tl-sm"></div>
    <div class="absolute top-8 right-8 w-16 h-16 border-r-2 border-t-2 border-amber-500/20 rounded-tr-sm"></div>
    <div class="absolute bottom-8 left-8 w-16 h-16 border-l-2 border-b-2 border-amber-500/20 rounded-bl-sm"></div>
    <div class="absolute bottom-8 right-8 w-16 h-16 border-r-2 border-b-2 border-amber-500/20 rounded-br-sm"></div>

    <div class="relative z-10 w-full max-w-6xl mx-auto px-6 flex flex-col items-center text-center pt-28 pb-24">
      <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full border border-amber-500/30 bg-amber-500/8 backdrop-blur-sm mb-10">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="lucide lucide-sparkles w-3.5 h-3.5 text-amber-400">
          <path d="M9.937 15.5A2 2 0 0 0 8.5 14.063l-6.135-1.582a.5.5 0 0 1 0-.962L8.5 9.936A2 2 0 0 0 9.937 8.5l1.582-6.135a.5.5 0 0 1 .963 0L14.063 8.5A2 2 0 0 0 15.5 9.937l6.135 1.581a.5.5 0 0 1 0 .964L15.5 14.063a2 2 0 0 0-1.437 1.437l-1.582 6.135a.5.5 0 0 1-.963 0z"></path>
          <path d="M20 3v4"></path><path d="M22 5h-4"></path><path d="M4 17v2"></path><path d="M5 18H3"></path>
        </svg>
        <span class="text-xs font-semibold tracking-widest uppercase text-amber-300">The Dawn of Shared Abundance</span>
      </div>

      <div class="mb-8">
        <img src="/img/logo.png" class="w-28 h-28 md:w-36 md:h-36 object-cover mx-auto rounded-full border-2 border-amber-500/40 shadow-[0_0_40px_rgba(251,191,36,0.25)]">
      </div>

    <h1 class="text-3xl md:text-4xl lg:text-5xl font-extrabold tracking-tight leading-[1.2] mb-4">
  <span class="text-white">Sky  </span>
  <span class="bg-gradient-to-r from-amber-300 via-yellow-200 to-amber-400 bg-clip-text text-transparent">Starter Kit</span>
</h1>
      <p class="text-xl md:text-2xl text-gray-300 font-light mb-3 tracking-wide">Ushering in the Golden Age of Prosperity for All</p>
      <p class="text-base text-gray-500 max-w-2xl mx-auto mb-10 leading-relaxed">A community-driven movement built on the ancient promise of Sky Starter Kit — renewal, release, and overflowing wealth. Backed by hard assets, powered by a self-renewing matrix, and designed for sudden, vast abundance.</p>

      <div class="flex flex-col sm:flex-row items-center justify-center gap-4 mb-14">
        <button class="bg-gradient-to-r from-amber-500 to-yellow-400 hover:from-amber-400 hover:to-yellow-300 text-black font-bold px-9 py-3 text-base rounded-full transition-all duration-300 hover:scale-105 hover:shadow-[0_0_50px_rgba(251,191,36,0.35)] shadow-lg">
          Join the Sky Starter Kit
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="lucide lucide-arrow-right ml-2 w-5 h-5 inline">
            <path d="M5 12h14"></path><path d="m12 5 7 7-7 7"></path>
          </svg>
        </button>
        <button class="bg-green-700 hover:bg-green-600 text-white px-9 py-3 text-base rounded-full backdrop-blur-sm transition-all duration-300">Learn More</button>
      </div>

      <div class="flex flex-wrap justify-center gap-3 mb-16">
        <div class="flex items-center gap-2 px-4 py-2 rounded-full bg-white/[0.04] border border-white/[0.08] text-gray-400 text-sm">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="lucide lucide-shield w-3.5 h-3.5 text-amber-400"><path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"></path></svg>
          <span>Hard Asset Backed</span>
        </div>
        <div class="flex items-center gap-2 px-4 py-2 rounded-full bg-white/[0.04] border border-white/[0.08] text-gray-400 text-sm">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="lucide lucide-coins w-3.5 h-3.5 text-amber-400"><circle cx="8" cy="8" r="6"></circle><path d="M18.09 10.37A6 6 0 1 1 10.34 18"></path><path d="M7 6h1v4"></path><path d="m16.71 13.88.7.71-2.82 2.82"></path></svg>
          <span>Gold · Silver · IQD · BNB</span>
        </div>
        <div class="flex items-center gap-2 px-4 py-2 rounded-full bg-white/[0.04] border border-white/[0.08] text-gray-400 text-sm">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="lucide lucide-trending-up w-3.5 h-3.5 text-amber-400"><polyline points="22 7 13.5 15.5 8.5 10.5 2 17"></polyline><polyline points="16 7 22 7 22 13"></polyline></svg>
          <span>AI Yield Engine</span>
        </div>
        <div class="flex items-center gap-2 px-4 py-2 rounded-full bg-white/[0.04] border border-white/[0.08] text-gray-400 text-sm">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="lucide lucide-users w-3.5 h-3.5 text-amber-400"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M22 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
          <span>Follow-Me Matrix</span>
        </div>
      </div>

      <div class="w-full grid grid-cols-2 md:grid-cols-4 gap-px bg-white/[0.06] rounded-2xl overflow-hidden border border-white/[0.06]">
        <div class="backdrop-blur-sm px-6 py-7 flex flex-col items-center justify-center text-center bg-gradient-to-b from-slate-300/15 to-slate-400/10">
          <div class="text-3xl md:text-4xl font-extrabold bg-gradient-to-r bg-clip-text text-transparent mb-1 from-amber-300 to-yellow-200">9</div>
          <div class="text-xs tracking-wide uppercase text-gray-500">Progressive Boards</div>
        </div>
        <div class="backdrop-blur-sm px-6 py-7 flex flex-col items-center justify-center text-center bg-gradient-to-b from-slate-300/15 to-slate-400/10">
          <div class="text-3xl md:text-4xl font-extrabold bg-gradient-to-r bg-clip-text text-transparent mb-1 from-amber-300 to-yellow-200">3×</div>
          <div class="text-xs tracking-wide uppercase text-gray-500">Return Per Cycle</div>
        </div>
        <div class="backdrop-blur-sm px-6 py-7 flex flex-col items-center justify-center text-center bg-gradient-to-b from-amber-500/30 to-amber-600/20 border-x border-amber-500/40 shadow-[inset_0_0_30px_rgba(251,191,36,0.1)]">
          <div class="text-3xl md:text-4xl font-extrabold bg-gradient-to-r bg-clip-text text-transparent mb-1 from-amber-200 to-yellow-100">$25</div>
          <div class="text-xs tracking-wide uppercase text-amber-400/80">Entry Point</div>
        </div>
        <div class="backdrop-blur-sm px-6 py-7 flex flex-col items-center justify-center text-center bg-gradient-to-b from-slate-300/15 to-slate-400/10">
          <div class="text-3xl md:text-4xl font-extrabold bg-gradient-to-r bg-clip-text text-transparent mb-1 from-amber-300 to-yellow-200">10%</div>
          <div class="text-xs tracking-wide uppercase text-gray-500">Referral Rewards</div>
        </div>
      </div>
    </div>

    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 z-10">
      <div class="w-5 h-9 rounded-full border border-white/20 flex items-start justify-center p-1.5">
        <div class="w-1 h-1 rounded-full bg-amber-400/70 animate-bounce"></div>
      </div>
    </div>
  </section>

  <!-- About Section -->
  <div id="about">
    <section class="relative py-32 bg-[#0a1628] overflow-hidden">
      <div class="absolute inset-0 bg-gradient-to-b from-transparent via-amber-900/5 to-transparent"></div>
      <div class="absolute top-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-amber-500/20 to-transparent"></div>
      <div class="absolute bottom-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-amber-500/20 to-transparent"></div>
      <div class="relative z-10 max-w-6xl mx-auto px-6">
        <div class="text-center mb-20">
          <span class="text-amber-400 text-sm font-medium tracking-widest uppercase mb-4 block">The Spirit of Sky Starter Kit</span>
          <h2 class="text-4xl md:text-5xl font-bold text-white mb-6">Ancient Promise Meets <span class="bg-gradient-to-r from-amber-400 to-yellow-300 bg-clip-text text-transparent">Modern Revelation</span></h2>
          <p class="text-gray-400 text-lg max-w-3xl mx-auto italic">"The season of restoration has arrived. Gold and silver shall break the chains of financial bondage, and abundance shall rain upon the righteous and the ready."</p>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
          <!-- Renewal Card -->
          <div class="group h-full p-8 rounded-2xl bg-gradient-to-b from-green-900/30 to-green-950/20 border border-green-800/30 backdrop-blur-sm hover:border-green-600/40 transition-all duration-500 hover:shadow-[0_0_40px_rgba(34,197,94,0.08)]">
            <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-amber-600/20 to-yellow-600/20 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-500">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="lucide lucide-refresh-cw w-7 h-7 text-amber-400"><path d="M3 12a9 9 0 0 1 9-9 9.75 9.75 0 0 1 6.74 2.74L21 8"></path><path d="M21 3v5h-5"></path><path d="M21 12a9 9 0 0 1-9 9 9.75 9.75 0 0 1-6.74-2.74L3 16"></path><path d="M8 16H3v5"></path></svg>
            </div>
            <h3 class="text-xl font-semibold text-white mb-3">Renewal</h3>
            <p class="text-gray-400 leading-relaxed">Debt-free progression through matrix cycling. Every 50 years – debts forgiven, land restored, liberty proclaimed to all.</p>
          </div>
          <!-- Restoration Card -->
          <div class="group h-full p-8 rounded-2xl bg-gradient-to-b from-green-900/30 to-green-950/20 border border-green-800/30 backdrop-blur-sm hover:border-green-600/40 transition-all duration-500 hover:shadow-[0_0_40px_rgba(34,197,94,0.08)]">
            <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-amber-600/20 to-yellow-600/20 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-500">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="lucide lucide-gem w-7 h-7 text-amber-400"><path d="M6 3h12l4 6-10 13L2 9Z"></path><path d="M11 3 8 9l4 13 4-13-3-6"></path><path d="M2 9h20"></path></svg>
            </div>
            <h3 class="text-xl font-semibold text-white mb-3">Restoration</h3>
            <p class="text-gray-400 leading-relaxed">Direct exposure to rising precious metals value. Gold and silver as the foundation of true money.</p>
          </div>
          <!-- Release Card -->
          <div class="group h-full p-8 rounded-2xl bg-gradient-to-b from-green-900/30 to-green-950/20 border border-green-800/30 backdrop-blur-sm hover:border-green-600/40 transition-all duration-500 hover:shadow-[0_0_40px_rgba(34,197,94,0.08)]">
            <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-amber-600/20 to-yellow-600/20 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-500">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="lucide lucide-heart w-7 h-7 text-amber-400"><path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"></path></svg>
            </div>
            <h3 class="text-xl font-semibold text-white mb-3">Release</h3>
            <p class="text-gray-400 leading-relaxed">Shared prosperity flowing to every active participant. The collapse of debt-based fiat systems replaced by sound money.</p>
          </div>
          <!-- Real-World Backing Card -->
          <div class="group h-full p-8 rounded-2xl bg-gradient-to-b from-green-900/30 to-green-950/20 border border-green-800/30 backdrop-blur-sm hover:border-green-600/40 transition-all duration-500 hover:shadow-[0_0_40px_rgba(34,197,94,0.08)]">
            <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-amber-600/20 to-yellow-600/20 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-500">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="lucide lucide-coins w-7 h-7 text-amber-400"><circle cx="8" cy="8" r="6"></circle><path d="M18.09 10.37A6 6 0 1 1 10.34 18"></path><path d="M7 6h1v4"></path><path d="m16.71 13.88.7.71-2.82 2.82"></path></svg>
            </div>
            <h3 class="text-xl font-semibold text-white mb-3">Real-World Backing</h3>
            <p class="text-gray-400 leading-relaxed">Perpetual community treasury allocated to verified gold trading systems with quarterly silver profit shares.</p>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- Boards Section -->
  <div id="boards">
    <section class="relative py-32 bg-[#0a1628]">
      <div class="absolute top-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-amber-500/20 to-transparent"></div>
      <div class="absolute bottom-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-yellow-500/20 to-transparent"></div>
      <div class="relative z-10 max-w-6xl mx-auto px-6">
        <div class="text-center mb-16">
          <span class="text-amber-400 text-sm font-medium tracking-widest uppercase mb-4 block">The 9 Boards</span>
          <h2 class="text-4xl md:text-5xl font-bold text-white mb-6">Your Path to <span class="bg-gradient-to-r from-amber-400 to-yellow-300 bg-clip-text text-transparent">Legacy Wealth</span></h2>
          <p class="text-gray-400 text-lg max-w-2xl mx-auto">2×2 "Follow-Me" Peer-to-Peer Matrix Cycler with automatic re-entry upon cycling. Only 2 direct referrals needed to qualify.</p>
        </div>
        <div class="overflow-x-auto rounded-2xl border border-white/10 bg-white/[0.02] backdrop-blur-sm">
          <table class="w-full caption-bottom text-sm">
            <thead>
              <tr class="border-b border-white/10">
                <th class="h-10 px-2 text-left text-amber-400 font-semibold">Board</th>
                <th class="h-10 px-2 text-left text-amber-400 font-semibold">Name</th>
                <th class="h-10 px-2 text-right text-amber-400 font-semibold">Entry (USDT)</th>
                <th class="h-10 px-2 text-right text-amber-400 font-semibold">Cycle Payout</th>
                <th class="h-10 px-2 text-left text-amber-400 font-semibold hidden md:table-cell">Education Focus</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="board in boards" :key="board.id" class="border-b border-white/5 hover:bg-amber-500/5 transition-colors">
                <td class="p-2 text-white font-medium">{{ board.id }}</td>
                <td class="p-2 text-white font-semibold">{{ board.name }}</td>
                <td class="p-2 text-gray-300 text-right">${{ board.entry }}</td>
                <td class="p-2 text-right"><span class="text-amber-400 font-bold">${{ board.payout }}</span><span v-if="board.bnbBonus" class="text-green-400 text-sm ml-1">+{{ board.bnbBonus }} BNB</span></td>
                <td class="p-2 text-gray-400 text-sm hidden md:table-cell">{{ board.focus }}</td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="mt-12 grid md:grid-cols-3 gap-6">
          <div class="p-6 rounded-xl bg-gradient-to-b from-amber-500/10 to-transparent border border-amber-500/20 text-center">
            <h4 class="text-white font-semibold mb-2">Instant Payouts</h4>
            <p class="text-gray-400 text-sm">Payout triggered the moment a position lands on Level 2</p>
          </div>
          <div class="p-6 rounded-xl bg-gradient-to-b from-amber-500/10 to-transparent border border-amber-500/20 text-center">
            <h4 class="text-white font-semibold mb-2">Automatic Re-entry</h4>
            <p class="text-gray-400 text-sm">Positions automatically re-enter the board upon cycling</p>
          </div>
          <div class="p-6 rounded-xl bg-gradient-to-b from-amber-500/10 to-transparent border border-amber-500/20 text-center">
            <h4 class="text-white font-semibold mb-2">One-Time Entry</h4>
            <p class="text-gray-400 text-sm">Automatic re-entry upon cycling, no waiting for full matrix</p>
          </div>
        </div>
      </div>
    </section>
  </div>


   <div id="streams">



   </div>
  <!-- Streams Section -->
  <div id="streams">
    <section class="relative py-32 bg-[#0a1628] overflow-hidden">
      <div class="absolute inset-0 bg-gradient-to-b from-amber-900/5 via-transparent to-amber-900/5"></div>
      <div class="absolute top-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-amber-500/30 to-transparent"></div>
      <div class="absolute bottom-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-amber-500/20 to-transparent"></div>
      <div class="absolute top-8 left-8 w-16 h-16 border-l-2 border-t-2 border-amber-500/20 rounded-tl-lg"></div>
      <div class="absolute top-8 right-8 w-16 h-16 border-r-2 border-t-2 border-amber-500/20 rounded-tr-lg"></div>
      <div class="absolute bottom-8 left-8 w-16 h-16 border-l-2 border-b-2 border-amber-500/20 rounded-bl-lg"></div>
      <div class="absolute bottom-8 right-8 w-16 h-16 border-r-2 border-b-2 border-amber-500/20 rounded-br-lg"></div>
      <div class="relative z-10 max-w-6xl mx-auto px-6">
        <div class="text-center mb-16">
          <span class="text-amber-400 text-sm font-medium tracking-widest uppercase mb-4 block">Multiple Income Streams</span>
          <h2 class="text-4xl md:text-5xl font-bold text-white mb-6">Four Streams of <span class="bg-gradient-to-r from-amber-400 to-yellow-300 bg-clip-text text-transparent">Abundance</span></h2>
          <p class="text-gray-400 text-lg max-w-2xl mx-auto">Designed to thrive through the coming revaluation and precious metals surge</p>
        </div>
        <div class="grid md:grid-cols-2 gap-6">
          <div v-for="stream in incomeStreams" :key="stream.id" class="group relative overflow-hidden">
            <div class="relative h-full p-8 rounded-2xl bg-gradient-to-br from-green-900/30 to-green-950/20 border border-green-800/30 backdrop-blur-sm hover:border-green-600/40 transition-all duration-500">
              <div class="flex items-start gap-5">
                <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-amber-500/20 to-yellow-500/20 flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform duration-500 border border-amber-500/20">
                  <div v-html="stream.icon"></div>
                </div>
                <div class="flex-1">
                  <div class="flex items-center justify-between mb-2 flex-wrap gap-2">
                    <h3 class="text-xl font-semibold text-white">{{ stream.title }}</h3>
                    <span class="px-3 py-1 rounded-full bg-amber-500/20 text-amber-300 text-xs font-semibold border border-amber-500/20">{{ stream.badge }}</span>
                  </div>
                  <p class="text-gray-400 leading-relaxed">{{ stream.description }}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- Renewal/Sustainability Section -->
  <div id="renewal">
    <section class="relative py-32 bg-[#0a1628] overflow-hidden">
      <div class="absolute top-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-amber-500/20 to-transparent"></div>
      <div class="absolute top-8 left-8 w-20 h-20 border-l border-t border-amber-500/15"></div>
      <div class="absolute top-8 right-8 w-20 h-20 border-r border-t border-amber-500/15"></div>
      <div class="absolute bottom-8 left-8 w-20 h-20 border-l border-b border-amber-500/15"></div>
      <div class="absolute bottom-8 right-8 w-20 h-20 border-r border-b border-amber-500/15"></div>
      <div class="relative z-10 max-w-6xl mx-auto px-6">
        <div class="text-center mb-16">
          <span class="text-amber-400 text-sm font-medium tracking-widest uppercase mb-4 block">Perpetual Sustainability</span>
          <h2 class="text-4xl md:text-5xl font-bold text-white mb-6">Tiered <span class="bg-gradient-to-r from-amber-400 to-yellow-300 bg-clip-text text-transparent">Momentum Fund</span></h2>
          <p class="text-gray-400 text-lg max-w-3xl mx-auto leading-relaxed">Every cycle renews, spillovers cascade without end, and <span class="text-white font-semibold">sudden, vast abundance</span> flows evergreen to all who participate.</p>
        </div>

        <div class="p-5 sm:p-8 rounded-2xl bg-gradient-to-r from-blue-900/30 via-cyan-900/20 to-blue-900/30 border border-cyan-500/30 mb-16">
          <div class="flex flex-col sm:flex-row items-start gap-4">
            <div class="w-12 h-12 sm:w-14 sm:h-14 rounded-xl bg-cyan-500/20 flex items-center justify-center flex-shrink-0">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="lucide lucide-infinity w-6 h-6 sm:w-7 sm:h-7 text-cyan-400"><path d="M12 12c-2-2.67-4-4-6-4a4 4 0 1 0 0 8c2 0 4-1.33 6-4Zm0 0c2 2.67 4 4 6 4a4 4 0 0 0 0-8c-2 0-4 1.33-6 4Z"></path></svg>
            </div>
            <div>
              <h3 class="text-xl font-bold text-white mb-3">The Sacred Heart of Sustainability</h3>
              <p class="text-gray-300 leading-relaxed mb-4">The ancient prophecy of Sky Starter Kit speaks of a time when all debts are cancelled, all land restored, and abundance flows freely to every soul. That time is now — and the very assets at the heart of this movement are prophesied to reach their divine price targets, unlocking a cascade of wealth that sustains the matrix, the community, and every life touched by the Sky Starter Kit covenant — <span class="text-white font-medium">forever</span>.</p>
              <ul class="space-y-2 text-gray-400">
                <li class="flex items-start gap-2"><span class="text-cyan-400 mt-1">•</span><span>When <span class="text-yellow-300 font-semibold">Gold surges</span> and <span class="text-slate-300 font-semibold">Silver rises</span> to their prophetic valuations, the harvest funds matrix cycle payouts and all bonuses <span class="text-white font-medium">in perpetuity</span></span></li>
                <li class="flex items-start gap-2"><span class="text-cyan-400 mt-1">•</span><span>When the <span class="text-amber-300 font-semibold">Iraqi Dinar revalues</span> at its long-prophesied target, the IQD vault overflows — funding <span class="text-cyan-300 font-semibold">Infinite Spillover</span> positions that fill matrices and carry every member forward without end</span></li>
                <li class="flex items-start gap-2"><span class="text-cyan-400 mt-1">•</span><span>As <span class="text-orange-300 font-semibold">BNB ascends</span> to new heights, the entire ecosystem is supercharged — sustaining the project, enriching every participant, and fulfilling the Sky Starter Kit promise across generations</span></li>
              </ul>
              <p class="text-gray-400 mt-4 italic">This is not mere speculation — it is the unfolding of a divine blueprint. When these assets reach their destined valuations, Sky Starter Kit becomes a timeless, self-renewing river of abundance, flowing freely to all who stood in faith.</p>
            </div>
          </div>
        </div>

        <div class="mb-16">
          <h3 class="text-2xl font-bold text-white text-center mb-8">Growth Abundance Engines</h3>
          <p class="text-gray-400 text-center mb-8 max-w-2xl mx-auto">These engines weave independent, compounding strength — sustaining the ecosystem through every season.</p>
          <div class="grid md:grid-cols-3 gap-6">
            <div class="p-6 rounded-2xl bg-gradient-to-b from-green-500/20 to-emerald-500/20 to-transparent border border-green-500/30">
              <div class="w-12 h-12 rounded-xl bg-white/10 flex items-center justify-center mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="lucide lucide-trending-up w-6 h-6 text-green-400"><polyline points="22 7 13.5 15.5 8.5 10.5 2 17"></polyline><polyline points="16 7 22 7 22 13"></polyline></svg>
              </div>
              <h4 class="text-white font-semibold mb-2">Gold Trading MT5 Bot</h4>
              <p class="text-gray-400 text-sm leading-relaxed">Allocation from referral overrides fueling AI gold trading yields via MT5 bot (historical average ~22% monthly, with peaks near 40%). In the pipeline: proprietary trading systems connected to decentralized exchanges like Hyperliquid, further amplifying Sky Starter Kit community yields.</p>
            </div>
            <div class="p-6 rounded-2xl bg-gradient-to-b from-amber-500/20 to-yellow-500/20 to-transparent border border-amber-500/30">
              <div class="w-12 h-12 rounded-xl bg-white/10 flex items-center justify-center mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="lucide lucide-layers w-6 h-6 text-amber-400"><path d="M12.83 2.18a2 2 0 0 0-1.66 0L2.6 6.08a1 1 0 0 0 0 1.83l8.58 3.91a2 2 0 0 0 1.66 0l8.58-3.9a1 1 0 0 0 0-1.83z"></path><path d="M2 12a1 1 0 0 0 .58.91l8.6 3.91a2 2 0 0 0 1.65 0l8.58-3.9A1 1 0 0 0 22 12"></path><path d="M2 17a1 1 0 0 0 .58.91l8.6 3.91a2 2 0 0 0 1.65 0l8.58-3.9A1 1 0 0 0 22 17"></path></svg>
              </div>
              <h4 class="text-white font-semibold mb-2">IQD Sky Starter Kit Stacking Vault</h4>
              <p class="text-gray-400 text-sm leading-relaxed">Allocation stacking physical dinars, shared by board cycle shares. When IQD revalues, this vault provides liquidity for the project's tokenized IQD token and generates spillover capital to fund infinite matrix positions for all members.</p>
            </div>
            <div class="p-6 rounded-2xl bg-gradient-to-b from-blue-500/20 to-cyan-500/20 to-transparent border border-blue-500/30">
              <div class="w-12 h-12 rounded-xl bg-white/10 flex items-center justify-center mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="lucide lucide-infinity w-6 h-6 text-blue-400"><path d="M12 12c-2-2.67-4-4-6-4a4 4 0 1 0 0 8c2 0 4-1.33 6-4Zm0 0c2 2.67 4 4 6 4a4 4 0 0 0 0-8c-2 0-4 1.33-6 4Z"></path></svg>
              </div>
              <h4 class="text-white font-semibold mb-2">Tiered Momentum Fund</h4>
              <p class="text-gray-400 text-sm leading-relaxed">The convergence of all abundance engines — external gold trading bots, IQD revaluation proceeds, PAXG appreciation, and silver surges — continuously replenishes the fund. When Sky Starter Kit assets hit their targets, proceeds are harvested and recycled to fund perpetual spillover positions and bonuses for every member in the network, indefinitely.</p>
            </div>
          </div>
        </div>

        <div class="mb-16">
          <h3 class="text-2xl font-bold text-white text-center mb-8">4 Ways to Earn Rewards and Bonuses</h3>
          <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
            <div class="p-4 rounded-xl bg-blue-500/20 border border-blue-400/30 text-center hover:border-blue-400/60 transition-colors">
              <div class="w-10 h-10 rounded-lg bg-amber-500/20 flex items-center justify-center mx-auto mb-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="lucide lucide-coins w-5 h-5 text-amber-400"><circle cx="8" cy="8" r="6"></circle><path d="M18.09 10.37A6 6 0 1 1 10.34 18"></path><path d="M7 6h1v4"></path><path d="m16.71 13.88.7.71-2.82 2.82"></path></svg>
              </div>
              <h4 class="text-white font-semibold text-sm mb-1">Matrix Payout</h4>
              <p class="text-gray-500 text-xs">Instant 3x in USDT</p>
            </div>
            <div class="p-4 rounded-xl bg-blue-500/20 border border-blue-400/30 text-center hover:border-blue-400/60 transition-colors">
              <div class="w-10 h-10 rounded-lg bg-amber-500/20 flex items-center justify-center mx-auto mb-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="lucide lucide-users w-5 h-5 text-amber-400"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M22 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
              </div>
              <h4 class="text-white font-semibold text-sm mb-1">10% Referral Bonus</h4>
              <p class="text-gray-500 text-xs">On all upgrades (fueling the engines)</p>
            </div>
            <div class="p-4 rounded-xl bg-blue-500/20 border border-blue-400/30 text-center hover:border-blue-400/60 transition-colors">
              <div class="w-10 h-10 rounded-lg bg-amber-500/20 flex items-center justify-center mx-auto mb-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="lucide lucide-piggy-bank w-5 h-5 text-amber-400"><path d="M19 5c-1.5 0-2.8 1.4-3 2-3.5-1.5-11-.3-11 5 0 1.8 0 3 2 4.5V20h4v-2h3v2h4v-4c1-.5 1.7-1 2-2h2v-4h-2c0-1-.5-1.5-1-2V5z"></path><path d="M2 9v1c0 1.1.9 2 2 2h1"></path><path d="M16 11h.01"></path></svg>
              </div>
              <h4 class="text-white font-semibold text-sm mb-1">Monthly Leadership Bonus</h4>
              <p class="text-gray-500 text-xs">Monthly BNB/USDT from 20% revenue share</p>
              <a class="text-xs text-amber-400 hover:text-amber-300 underline mt-2 block transition-colors" href="/leaderboard">View Leaderboard →</a>
            </div>
            <div class="p-4 rounded-xl bg-blue-500/20 border border-blue-400/30 text-center hover:border-blue-400/60 transition-colors">
              <div class="w-10 h-10 rounded-lg bg-amber-500/20 flex items-center justify-center mx-auto mb-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="lucide lucide-gem w-5 h-5 text-amber-400"><path d="M6 3h12l4 6-10 13L2 9Z"></path><path d="M11 3 8 9l4 13 4-13-3-6"></path><path d="M2 9h20"></path></svg>
              </div>
              <h4 class="text-white font-semibold text-sm mb-1">Sky Starter Kit Asset Renewal Bonus</h4>
              <p class="text-gray-500 text-xs">Gold (PAXG) + physical silver + tokenized IQD + BNB — earned from cycling Boards 2–9, accumulated and released on fixed bi-monthly dates (Jun 1, Aug 1, Oct 1, Dec 1, 2026…). Qualified by $25 Board 1 entry.</p>
            </div>
          </div>
        </div>

        <!-- Sky Starter Kit Renewal Package Table -->
        <div class="mb-12">
          <h3 class="text-2xl font-bold text-white text-center mb-8">Sky Starter Kit Renewal Package (Per Cycle)</h3>
          <div class="overflow-x-auto rounded-2xl border border-white/10 bg-white/[0.02] backdrop-blur-sm">
            <table class="w-full caption-bottom text-sm">
              <thead>
                <tr class="border-b border-white/10">
                  <th class="h-10 px-2 text-left text-amber-400 font-semibold">Board</th>
                  <th class="h-10 px-2 text-left text-amber-400 font-semibold">Name</th>
                  <th class="h-10 px-2 text-right text-yellow-400 font-semibold">Gold (g / PAXG)</th>
                  <th class="h-10 px-2 text-right text-slate-300 font-semibold">Silver (g / physical)</th>
                  <th class="h-10 px-2 text-right text-amber-400 font-semibold">IQD (tokenized)</th>
                  <th class="h-10 px-2 text-right text-orange-400 font-semibold">BNB</th>
                  <th class="h-10 px-2 text-right text-green-400 font-semibold">~Value (USD)</th>
                  <th class="h-10 px-2 text-right text-amber-300 font-semibold">Hypothetical Value ✦</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="item in renewalPackage" :key="item.board" class="border-b border-white/5 hover:bg-amber-500/5 transition-colors" :class="item.isTotal ? 'border-t-2 border-amber-500/40 bg-amber-500/5' : ''">
                  <td class="p-2 text-white font-medium" :class="item.isTotal ? 'text-amber-400 font-bold' : ''">{{ item.board }}</td>
                  <td class="p-2 text-white font-semibold" :class="item.isTotal ? 'text-amber-400 font-bold' : ''">{{ item.name }}</td>
                  <td class="p-2 text-yellow-300 text-right" :class="item.isTotal ? 'font-bold' : ''">{{ item.gold }}</td>
                  <td class="p-2 text-slate-300 text-right" :class="item.isTotal ? 'font-bold' : ''">{{ item.silver }}</td>
                  <td class="p-2 text-amber-300 text-right" :class="item.isTotal ? 'font-bold' : ''">{{ item.iqd }}</td>
                  <td class="p-2 text-orange-300 text-right" :class="item.isTotal ? 'font-bold' : ''">{{ item.bnb }}</td>
                  <td class="p-2 text-green-400 text-right" :class="item.isTotal ? 'font-bold' : ''">${{ item.value }}</td>
                  <td class="p-2 text-amber-300 text-right font-semibold" :class="item.isTotal ? 'font-bold' : ''">${{ item.hypothetical }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <div class="p-6 rounded-2xl bg-gradient-to-r from-amber-500/10 via-yellow-500/10 to-amber-500/10 border border-amber-500/30 mb-8">
          <h4 class="text-xl font-bold text-white text-center mb-6">Grand Total One Full Cycle (All 9 Boards)</h4>
          <div class="grid grid-cols-2 md:grid-cols-4 gap-4 sm:gap-6 text-center">
            <div><div class="text-2xl sm:text-3xl font-bold text-yellow-400">0.45g</div><div class="text-gray-400 text-xs sm:text-sm">Gold (~$72 USD / fractional PAXG)</div></div>
            <div><div class="text-2xl sm:text-3xl font-bold text-slate-300">45g</div><div class="text-gray-400 text-xs sm:text-sm">Silver (~$113 USD / physical coins or bars)</div></div>
            <div><div class="text-2xl sm:text-3xl font-bold text-amber-400">45,000</div><div class="text-gray-400 text-xs sm:text-sm">IQD tokenized (~$34 USD | $45K at 1:1 RV)</div></div>
            <div><div class="text-2xl sm:text-3xl font-bold text-orange-400">0.90 BNB</div><div class="text-gray-400 text-xs sm:text-sm">BNB (~$540 USD | $900 at $1,000/BNB)</div></div>
          </div>
          <div class="mt-6 pt-4 border-t border-amber-500/20 text-center"><p class="text-sm text-gray-400 mb-1">Hypothetical Total (all 9 boards) at <span class="text-amber-300 font-semibold">$20K gold / $400 silver / 1:1 IQD RV</span></p><p class="text-2xl font-bold text-amber-300">$46,768 USD</p></div>
          <p class="text-center text-gray-500 text-sm mt-4"><span class="text-amber-300">Delivery Flow:</span> IQD tokenized (liquidity post-RV); Gold via PAXG; Silver physical (minimums for coins).</p>
        </div>

        <div class="p-5 rounded-xl bg-blue-900/20 border border-blue-500/20">
          <div class="flex items-start gap-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="lucide lucide-info w-5 h-5 text-blue-400 flex-shrink-0 mt-0.5"><circle cx="12" cy="12" r="10"></circle><path d="M12 16v-4"></path><path d="M12 8h.01"></path></svg>
            <div class="text-sm text-gray-400"><span class="text-blue-300 font-semibold">Truth anchor (April 12, 2026):</span> Iraqi Dinar peg remains stable at approximately <span class="text-white">1 USD = 1,310 IQD</span> (Central Bank of Iraq / major exchanges). No official revaluation announced; prophetic visions of renewal remain beautiful in faith, yet speculative today. Gold spot ≈ $160 USD/gram; silver ≈ $2.50 USD/gram; PAXG ≈ $5,000 USD per full ounce token.</div>
          </div>
        </div>

        <p class="text-center text-gray-400 italic mt-12 max-w-3xl mx-auto">This everlasting fusion — education as root, matrix as rhythm, triple engines as lifeblood, trifecta assets as fruit — manifests unbreakable Sky Starter Kit prosperity. The matrices bloom forever; the spillover never ceases; the imminent wave rises eternally.</p>
      </div>
    </section>
  </div>

  <!-- Education/Courses Section -->
  <div id="courses">
    <section class="relative py-32 bg-[#0a1628] overflow-hidden">
      <div class="absolute top-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-amber-500/20 to-transparent"></div>
      <div class="absolute top-8 left-8 w-20 h-20 border-l border-t border-amber-500/15"></div>
      <div class="absolute top-8 right-8 w-20 h-20 border-r border-t border-amber-500/15"></div>
      <div class="absolute bottom-8 left-8 w-20 h-20 border-l border-b border-amber-500/15"></div>
      <div class="absolute bottom-8 right-8 w-20 h-20 border-r border-b border-amber-500/15"></div>
      <div class="absolute inset-0 pointer-events-none"><div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] rounded-full bg-amber-500/5 blur-3xl"></div></div>
      <div class="relative z-10 max-w-6xl mx-auto px-6">
        <div class="text-center mb-16">
          <span class="text-amber-400 text-sm font-medium tracking-widest uppercase mb-4 block">Education &amp; Mastery</span>
          <h2 class="text-4xl md:text-5xl font-bold text-white mb-6">Wealth Protection <span class="bg-gradient-to-r from-amber-400 to-yellow-300 bg-clip-text text-transparent">Mastery Program</span></h2>
          <p class="text-gray-400 text-lg max-w-3xl mx-auto leading-relaxed">Financial freedom begins with financial intelligence. Our five-module curriculum equips every member with the knowledge to protect, grow, and defend their wealth — no matter what the global economy does.</p>
        </div>
        <div class="space-y-4">
          <div v-for="(course, idx) in courses" :key="idx" class="relative flex flex-col sm:flex-row items-start gap-4 p-5 sm:p-6 rounded-2xl transition-all duration-300 cursor-pointer group"
               :class="course.status === 'available' ? 'bg-gradient-to-r from-amber-500/20 to-yellow-600/10 to-transparent border border-amber-500/30' : (course.status === 'coming' ? 'bg-gradient-to-r from-slate-500/20 to-gray-600/10 to-transparent border border-slate-400/30' : 'bg-gradient-to-r from-orange-500/20 to-amber-600/10 to-transparent border border-orange-500/30')">
            <div class="flex items-center justify-between w-full sm:hidden">
              <div class="flex items-center gap-3">
                <div class="flex-shrink-0 w-8 h-8 rounded-full bg-white/5 border border-white/10 flex items-center justify-center"><span class="text-white font-bold text-xs">{{ idx + 1 }}</span></div>
                <div class="flex-shrink-0 w-9 h-9 rounded-xl bg-white/5 flex items-center justify-center" v-html="course.icon"></div>
              </div>
              <div class="flex-shrink-0"><span class="text-xs px-2.5 py-1 rounded-full font-medium" :class="course.status === 'available' ? 'bg-amber-500/20 text-amber-300' : (course.status === 'coming' ? 'bg-slate-500/20 text-slate-300' : 'bg-white/5 text-gray-500')">{{ course.statusLabel }}</span></div>
            </div>
            <div class="hidden sm:flex flex-shrink-0 w-10 h-10 rounded-full bg-white/5 border border-white/10 items-center justify-center"><span class="text-white font-bold text-sm">{{ idx + 1 }}</span></div>
            <div class="hidden sm:flex flex-shrink-0 w-11 h-11 rounded-xl bg-white/5 items-center justify-center" v-html="course.icon"></div>
            <div class="flex-1 min-w-0">
              <div class="flex items-start justify-between gap-4 mb-2">
                <h3 class="text-white font-semibold leading-snug group-hover:text-amber-200 transition-colors text-sm sm:text-base">{{ course.title }}</h3>
                <div class="flex-shrink-0 hidden sm:block"><span class="text-xs px-2.5 py-1 rounded-full font-medium" :class="course.status === 'available' ? 'bg-amber-500/20 text-amber-300' : (course.status === 'coming' ? 'bg-slate-500/20 text-slate-300' : 'bg-white/5 text-gray-500')">{{ course.statusLabel }}</span></div>
              </div>
              <p class="text-gray-400 text-sm leading-relaxed">{{ course.description }}</p>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="lucide lucide-chevron-right hidden sm:block flex-shrink-0 w-5 h-5 text-gray-600 group-hover:text-amber-400 transition-all duration-300"><path d="m9 18 6-6-6-6"></path></svg>
          </div>
        </div>
        <div class="mt-12 p-6 rounded-2xl bg-gradient-to-r from-amber-900/20 via-yellow-900/10 to-amber-900/20 border border-amber-500/20 text-center">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="lucide lucide-book-open w-8 h-8 text-amber-400 mx-auto mb-3"><path d="M12 7v14"></path><path d="M3 18a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h5a4 4 0 0 1 4 4 4 4 0 0 1 4-4h5a1 1 0 0 1 1 1v13a1 1 0 0 1-1 1h-6a3 3 0 0 0-3 3 3 3 0 0 0-3-3z"></path></svg>
          <p class="text-white font-semibold mb-1">Education is included with every membership</p>
          <p class="text-gray-400 text-sm">Courses unlock progressively as you advance through the boards — knowledge compounds just like your assets.</p>
        </div>
      </div>
    </section>
  </div>

  <!-- Roadmap Section -->
  <div id="roadmap">
    <section class="relative py-32 bg-[#0a1628] overflow-hidden">
      <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[800px] bg-amber-600/10 rounded-full blur-[150px]"></div>
      <div class="absolute top-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-amber-500/25 to-transparent"></div>
      <div class="absolute bottom-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-amber-500/25 to-transparent"></div>
      <div class="absolute top-8 left-8 w-16 h-16 border-l-2 border-t-2 border-amber-500/20 rounded-tl-lg"></div>
      <div class="absolute top-8 right-8 w-16 h-16 border-r-2 border-t-2 border-amber-500/20 rounded-tr-lg"></div>
      <div class="relative z-10 max-w-6xl mx-auto px-6">
        <div class="text-center mb-20">
          <span class="text-amber-400 text-sm font-medium tracking-widest uppercase mb-4 block">Our Journey</span>
          <h2 class="text-4xl md:text-5xl font-bold text-white mb-6">Sky Starter Kit <span class="bg-gradient-to-r from-amber-400 to-yellow-300 bg-clip-text text-transparent">Roadmap</span></h2>
          <p class="text-gray-400 text-lg max-w-2xl mx-auto">A clear path to shared prosperity in the Golden Age.</p>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
          <div v-for="phase in roadmapPhases" :key="phase.quarter" class="relative p-6 rounded-2xl border backdrop-blur-sm" :class="phase.active ? 'bg-gradient-to-b from-amber-500/20 to-transparent border-amber-500/40' : 'bg-white/[0.03] border-white/[0.08]'">
            <div class="flex items-center justify-between mb-6">
              <span class="text-sm text-gray-500">{{ phase.quarter }}</span>
              <div class="w-6 h-6 rounded-full flex items-center justify-center" :class="phase.completed ? 'bg-green-500/20' : (phase.active ? 'bg-amber-500/20' : 'bg-gray-500/20')">
                <svg v-if="phase.completed" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-4 h-4 text-green-400"><path d="M20 6 9 17l-5-5"></path></svg>
                <svg v-else-if="phase.active" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-4 h-4 text-amber-400 animate-pulse"><path d="M4.5 16.5c-1.5 1.26-2 5-2 5s3.74-.5 5-2c.71-.84.7-2.13-.09-2.91a2.18 2.18 0 0 0-2.91-.09z"></path><path d="m12 15-3-3a22 22 0 0 1 2-3.95A12.88 12.88 0 0 1 22 2c0 2.72-.78 7.5-6 11a22.35 22.35 0 0 1-4 2z"></path></svg>
                <svg v-else xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-4 h-4 text-gray-400"><circle cx="12" cy="12" r="10"></circle></svg>
              </div>
            </div>
            <div class="mb-2 text-amber-400 text-sm font-medium">{{ phase.name }}</div>
            <h3 class="text-xl font-bold text-white mb-4">{{ phase.title }}</h3>
            <ul class="space-y-3">
              <li v-for="item in phase.items" :key="item" class="flex items-start gap-2 text-sm text-gray-400">
                <div class="w-1.5 h-1.5 rounded-full mt-2" :class="phase.completed ? 'bg-green-400' : (phase.active ? 'bg-amber-400' : 'bg-gray-600')"></div>
                {{ item }}
              </li>
            </ul>
            <div v-if="phase.active" class="absolute -inset-px rounded-2xl bg-gradient-to-r from-amber-500/20 via-transparent to-yellow-500/20 -z-10"></div>
          </div>
        </div>
      </div>
    </section>
  </div>
<!-- FAQ Section -->
<div id="faq">
  <section class="relative py-32 bg-[#0a1628]">
    <div class="relative z-10 max-w-3xl mx-auto px-6">
      <div class="text-center mb-16">
        <span class="text-amber-400 text-sm font-medium tracking-widest uppercase mb-4 block">FAQ</span>
        <h2 class="text-4xl md:text-5xl font-bold text-white mb-6">Frequently Asked <span class="bg-gradient-to-r from-amber-400 to-yellow-300 bg-clip-text text-transparent">Questions</span></h2>
      </div>
      <div class="border-t border-white/[0.08]">
        <div v-for="(faq, index) in faqs" :key="index" class="border-b border-white/[0.08]">
          <button class="w-full py-6 flex items-center justify-between text-left" @click="toggleFaq(index)">
            <span class="text-lg font-medium text-white pr-4">{{ faq.question }}</span>
            <div class="flex-shrink-0 transition-transform duration-300" :class="{ 'rotate-180': activeFaq === index }">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="lucide lucide-chevron-down w-5 h-5 text-gray-400"><path d="m6 9 6 6 6-6"></path></svg>
            </div>
          </button>
          <div v-show="activeFaq === index" class="overflow-hidden transition-all duration-300">
            <p class="pb-6 text-gray-400 leading-relaxed">{{ faq.answer }}</p>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

  <!-- Final CTA -->
<section class="relative py-32 bg-gradient-to-b from-[#0a1628] to-[#0d1a2e] overflow-hidden">
  <!-- Animated Background -->
  <div class="absolute inset-0">
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[800px] bg-amber-600/10 rounded-full blur-[150px] animate-pulse"></div>
    <div class="absolute top-1/2 left-1/4 -translate-y-1/2 w-[500px] h-[500px] bg-yellow-600/10 rounded-full blur-[120px] animate-pulse animation-delay-2000"></div>
    <div class="absolute bottom-0 right-0 w-[400px] h-[400px] bg-amber-500/5 rounded-full blur-[100px]"></div>
  </div>
  
  <div class="relative z-10 max-w-5xl mx-auto px-6 text-center">
    <!-- Badge -->
    <div class="inline-flex items-center gap-2 bg-white/5 backdrop-blur-sm rounded-full px-4 py-2 mb-8 border border-white/10">
      <span class="relative flex h-2 w-2">
        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-amber-400 opacity-75"></span>
        <span class="relative inline-flex rounded-full h-2 w-2 bg-amber-500"></span>
      </span>
      <span class="text-amber-400 text-xs font-medium tracking-wider">LIMITED OPPORTUNITY</span>
    </div>

    <!-- Heading with better typography -->
    <h2 class="text-5xl md:text-7xl font-bold text-white mb-6 leading-tight">
      The Horns of 
      <span class="bg-gradient-to-r from-amber-400 via-yellow-300 to-amber-500 bg-clip-text text-transparent">
        Sky Starter Kit
      </span>
      <br />
      <span class="bg-gradient-to-r from-amber-400 to-yellow-500 bg-clip-text text-transparent">
        Are Sounding
      </span>
    </h2>
    
    <p class="text-xl md:text-2xl text-gray-300 mb-4 max-w-2xl mx-auto font-light">
      Gold and silver are rising. The old system is passing away.
    </p>
    <p class="text-base md:text-lg text-gray-400 mb-12 max-w-2xl mx-auto">
      Step into Sky Starter Kit and claim your place in the greatest season of shared prosperity the world has ever known.
    </p>
    
    <!-- Buttons with better design -->
    <div class="flex flex-col sm:flex-row items-center justify-center gap-5">
      <button class="group relative bg-gradient-to-r from-amber-500 to-yellow-500 hover:from-amber-400 hover:to-yellow-400 text-black font-bold px-10 py-4 text-lg rounded-full transition-all duration-300 hover:scale-105 hover:shadow-2xl hover:shadow-amber-500/30 flex items-center gap-2 overflow-hidden">
        <span class="relative z-10">Start at Foundation ($25)</span>
        <svg class="relative z-10 w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
        </svg>
        <div class="absolute inset-0 bg-gradient-to-r from-white/20 to-transparent transform -translate-x-full group-hover:translate-x-0 transition-transform duration-500"></div>
      </button>
      
      <button class="group bg-white/10 backdrop-blur-sm hover:bg-green-600/80 text-white px-10 py-4 text-lg rounded-full flex items-center gap-2 border border-white/20 hover:border-green-400 transition-all duration-300 hover:scale-105">
        <svg class="w-5 h-5 group-hover:rotate-12 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
        </svg>
        Join Community
      </button>
    </div>
    
    <!-- Stats with HD design -->
    <div class="mt-20 flex items-center justify-center gap-12 flex-wrap">
      <!-- Growing Community with user images -->
      <div class="flex items-center gap-3 group cursor-pointer">
        <div class="flex -space-x-3">
          <div class="w-10 h-10 rounded-full bg-gradient-to-br from-amber-500 to-orange-600 border-2 border-[#0a1628] overflow-hidden shadow-lg transform hover:scale-110 transition-all duration-300">
            <img src="/user/user1.jpg" alt="User" class="w-full h-full object-cover">
          </div>
          <div class="w-10 h-10 rounded-full bg-gradient-to-br from-amber-500 to-orange-600 border-2 border-[#0a1628] overflow-hidden shadow-lg transform hover:scale-110 transition-all duration-300 delay-100">
            <img src="/user/user2.jpg" alt="User" class="w-full h-full object-cover">
          </div>
          <div class="w-10 h-10 rounded-full bg-gradient-to-br from-amber-500 to-orange-600 border-2 border-[#0a1628] overflow-hidden shadow-lg transform hover:scale-110 transition-all duration-300 delay-200">
            <img src="/user/user3.jpg" alt="User" class="w-full h-full object-cover">
          </div>
          <div class="w-10 h-10 rounded-full bg-gradient-to-br from-amber-500 to-orange-600 border-2 border-[#0a1628] overflow-hidden shadow-lg transform hover:scale-110 transition-all duration-300 delay-300">
            <img src="/user/user4.jpg" alt="User" class="w-full h-full object-cover">
          </div>
         
          <div class="w-10 h-10 rounded-full bg-gradient-to-br from-amber-500 to-orange-600 border-2 border-[#0a1628] flex items-center justify-center text-white text-xs font-bold shadow-lg transform hover:scale-110 transition-all duration-300">
            +99
          </div>
        </div>
        <div class="text-left">
          <span class="text-white text-sm font-semibold block">Growing Community</span>
          <span class="text-gray-500 text-xs">10,000+ active members</span>
        </div>
      </div>
      
      <div class="h-10 w-px bg-gradient-to-b from-transparent via-white/20 to-transparent hidden md:block"></div>
      
      <!-- Real Gold & Silver Backing with better design -->
      <div class="flex items-center gap-3 group cursor-pointer">
        <div class="flex gap-1">
          <svg class="w-5 h-5 text-amber-400 fill-current animate-pulse" viewBox="0 0 20 20">
            <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"></path>
          </svg>
          <svg class="w-5 h-5 text-amber-400 fill-current animate-pulse animation-delay-300" viewBox="0 0 20 20">
            <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"></path>
          </svg>
          <svg class="w-5 h-5 text-amber-400 fill-current animate-pulse animation-delay-600" viewBox="0 0 20 20">
            <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"></path>
          </svg>
          <svg class="w-5 h-5 text-amber-400 fill-current animate-pulse animation-delay-900" viewBox="0 0 20 20">
            <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"></path>
          </svg>
          <svg class="w-5 h-5 text-amber-400 fill-current animate-pulse animation-delay-1200" viewBox="0 0 20 20">
            <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"></path>
          </svg>
        </div>
        <div class="text-left">
          <span class="text-white text-sm font-semibold block">Real Gold & Silver Backing</span>
          <span class="text-gray-500 text-xs">100% asset-backed security</span>
        </div>
      </div>
    </div>
  </div>
</section>


  <!-- Disclaimer Notice -->
  <section class="bg-[#0a1628] border-t border-amber-500/20 px-6 py-12">
    <div class="max-w-4xl mx-auto">
      <div class="flex items-center justify-center gap-3 mb-6">
        <div class="w-10 h-10 rounded-full bg-amber-500/15 border border-amber-500/30 flex items-center justify-center flex-shrink-0">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="lucide lucide-triangle-alert w-5 h-5 text-amber-400"><path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3"></path><path d="M12 9v4"></path><path d="M12 17h.01"></path></svg>
        </div>
        <h2 class="text-xl font-bold text-amber-300">Peer-to-Peer Program — Important Notice</h2>
      </div>
      <div class="bg-amber-900/15 border border-amber-500/30 rounded-2xl p-6 mb-6">
        <p class="text-amber-100/80 text-sm leading-relaxed text-center mb-4"><strong class="text-amber-300">Sky Starter Kit is a 100% peer-to-peer (P2P) platform.</strong> There is no company, corporation, or central authority holding or guaranteeing your funds. All rewards, commissions, and bonuses are generated exclusively through the voluntary participation and growth activities of members within the network.</p>
        <p class="text-amber-100/60 text-sm leading-relaxed text-center"><strong class="text-white">No rewards are guaranteed.</strong> Your ability to earn depends entirely on your own effort — sharing your affiliate link, onboarding new members, and actively participating in the growth of the community. If you do not actively participate, you may not earn.</p>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="bg-white/[0.03] border border-white/10 rounded-xl p-4 text-center"><div class="w-10 h-10 rounded-full bg-blue-500/15 border border-blue-500/20 flex items-center justify-center mx-auto mb-3"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="lucide lucide-users w-5 h-5 text-blue-400"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M22 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg></div><h3 class="text-white font-semibold text-sm mb-2">People Power Rewards</h3><p class="text-gray-500 text-xs leading-relaxed">All commissions flow directly from member-to-member. No central pool, no company guarantee — only the network you build.</p></div>
        <div class="bg-white/[0.03] border border-white/10 rounded-xl p-4 text-center"><div class="w-10 h-10 rounded-full bg-amber-500/15 border border-amber-500/20 flex items-center justify-center mx-auto mb-3"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="lucide lucide-trending-up w-5 h-5 text-amber-400"><polyline points="22 7 13.5 15.5 8.5 10.5 2 17"></polyline><polyline points="16 7 22 7 22 13"></polyline></svg></div><h3 class="text-white font-semibold text-sm mb-2">Earnings Through Action</h3><p class="text-gray-500 text-xs leading-relaxed">Growth is earned, not given. Actively share, refer, and support your downline to maximize your participation in the matrix.</p></div>
        <div class="bg-white/[0.03] border border-white/10 rounded-xl p-4 text-center"><div class="w-10 h-10 rounded-full bg-green-500/15 border border-green-500/20 flex items-center justify-center mx-auto mb-3"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="lucide lucide-handshake w-5 h-5 text-green-400"><path d="m11 17 2 2a1 1 0 1 0 3-3"></path><path d="m14 14 2.5 2.5a1 1 0 1 0 3-3l-3.88-3.88a3 3 0 0 0-4.24 0l-.88.88a1 1 0 1 1-3-3l2.81-2.81a5.79 5.79 0 0 1 7.06-.87l.47.28a2 2 0 0 0 1.42.25L21 4"></path><path d="m21 3 1 11h-2"></path><path d="M3 3 2 14l6.5 6.5a1 1 0 1 0 3-3"></path><path d="M3 4h8"></path></svg></div><h3 class="text-white font-semibold text-sm mb-2">Mutual Accountability</h3><p class="text-gray-500 text-xs leading-relaxed">This is a community-driven model. Your success is tied to the success of those you introduce and support — not to any single entity.</p></div>
      </div>
      <p class="text-center text-gray-600 text-xs mt-6">By participating in Sky Starter Kit, you acknowledge the peer-to-peer nature of this program and accept full personal responsibility for your participation and results.</p>
    </div>
  </section>
</template>

<script setup>
import { ref } from 'vue'


import Layout from '@/Layouts/FrontendLayout.vue';
defineOptions({
  layout: Layout,
});

const activeFaq = ref(0)

const toggleFaq = (index) => {
  activeFaq.value = activeFaq.value === index ? -1 : index
}

const boards = ref([
  { id: 1, name: 'Foundation', entry: 25, payout: 75, bnbBonus: null, focus: 'Digital wealth fundamentals & system entry' },
  { id: 2, name: 'Builder', entry: 50, payout: 150, bnbBonus: null, focus: 'Building blocks of digital assets' },
  { id: 3, name: 'Growth', entry: 100, payout: 300, bnbBonus: null, focus: 'Mindset & network expansion' },
  { id: 4, name: 'Momentum', entry: 200, payout: 600, bnbBonus: null, focus: 'Consistency & leverage' },
  { id: 5, name: 'Scaler', entry: 400, payout: 1200, bnbBonus: null, focus: 'Scaling teams & compounding' },
  { id: 6, name: 'Strategist', entry: 750, payout: 2250, bnbBonus: null, focus: 'Advanced strategies & leadership' },
  { id: 7, name: 'Executive', entry: 1500, payout: 4500, bnbBonus: '0.15', focus: 'Vision building & mentoring' },
  { id: 8, name: 'Elite', entry: 3000, payout: 9000, bnbBonus: '0.30', focus: 'Long-term wealth perspective' },
  { id: 9, name: 'Legacy', entry: 5000, payout: 15000, bnbBonus: '0.45', focus: 'Wealth preservation & generational legacy' }
])

const incomeStreams = ref([
  { id: 1, title: 'Matrix Cycle Payouts', badge: '3× Returns', description: '3× return on every board, paid instantly when your position cycles', icon: '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="lucide lucide-repeat text-amber-400"><path d="m17 2 4 4-4 4"></path><path d="M3 11v-1a4 4 0 0 1 4-4h14"></path><path d="m7 22-4-4 4-4"></path><path d="M21 13v1a4 4 0 0 1-4 4H3"></path></svg>' },
  { id: 2, title: '10% Direct Referral Rewards', badge: '10% Instant', description: 'Instant commission on every board purchase by your direct referrals', icon: '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="lucide lucide-users text-amber-400"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M22 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>' },
  { id: 3, title: 'Premium Sky Starter Kit Bonuses', badge: 'Up to 0.90 BNB', description: 'Extra 0.15–0.90 BNB on Executive, Elite, and Legacy board cycles', icon: '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="lucide lucide-gift text-amber-400"><rect x="3" y="8" width="18" height="4" rx="1"></rect><path d="M12 8v13"></path><path d="M19 12v7a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2v-7"></path><path d="M7.5 8a2.5 2.5 0 0 1 0-5A4.8 8 0 0 1 12 8a4.8 8 0 0 1 4.5-5 2.5 2.5 0 0 1 0 5"></path></svg>' },
  { id: 4, title: 'Monthly Leadership Bonus Rewards', badge: '20% Monthly', description: '20% of community revenue distributed monthly in BNB or USDT to qualified leadership cyclers', icon: '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="lucide lucide-coins text-amber-400"><circle cx="8" cy="8" r="6"></circle><path d="M18.09 10.37A6 6 0 1 1 10.34 18"></path><path d="M7 6h1v4"></path><path d="m16.71 13.88.7.71-2.82 2.82"></path></svg>' }
])

const renewalPackage = ref([
  { board: 1, name: 'Foundation', gold: '0.01', silver: '1.0', iqd: '1,000', bnb: '—', value: '4.86', hypothetical: '1,019', isTotal: false },
  { board: 2, name: 'Builder', gold: '0.02', silver: '2.0', iqd: '2,000', bnb: '—', value: '9.73', hypothetical: '2,039', isTotal: false },
  { board: 3, name: 'Growth', gold: '0.03', silver: '3.0', iqd: '3,000', bnb: '—', value: '14.59', hypothetical: '3,058', isTotal: false },
  { board: 4, name: 'Momentum', gold: '0.04', silver: '4.0', iqd: '4,000', bnb: '—', value: '19.45', hypothetical: '4,077', isTotal: false },
  { board: 5, name: 'Scaler', gold: '0.05', silver: '5.0', iqd: '5,000', bnb: '—', value: '24.32', hypothetical: '5,096', isTotal: false },
  { board: 6, name: 'Strategist', gold: '0.06', silver: '6.0', iqd: '6,000', bnb: '—', value: '29.18', hypothetical: '6,116', isTotal: false },
  { board: 7, name: 'Executive', gold: '0.07', silver: '7.0', iqd: '7,000', bnb: '0.15', value: '124.04', hypothetical: '7,285', isTotal: false },
  { board: 8, name: 'Elite', gold: '0.08', silver: '8.0', iqd: '8,000', bnb: '0.30', value: '218.90', hypothetical: '8,454', isTotal: false },
  { board: 9, name: 'Legacy', gold: '0.09', silver: '9.0', iqd: '9,000', bnb: '0.45', value: '313.77', hypothetical: '9,624', isTotal: false },
  { board: 'TOTAL', name: 'All 9 Boards', gold: '0.45', silver: '45.0', iqd: '45,000', bnb: '0.90', value: '758.84', hypothetical: '46,768', isTotal: true }
])

const courses = ref([
  { title: 'Foundations of Wealth Protection in a Fiat-Dominated World', description: 'Understand the mechanics of fiat currency, inflation erosion, and the foundational principles of protecting your wealth against systemic financial risks.', status: 'available', statusLabel: 'Available', icon: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="lucide lucide-shield w-5 h-5 text-amber-400"><path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"></path></svg>' },
  { title: 'Hard Assets as Inflation Shields', description: 'Deep dive into gold, silver, and tangible asset classes — why they outperform paper assets during monetary expansion and how to build a hard-asset foundation.', status: 'available', statusLabel: 'Available', icon: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="lucide lucide-layers w-5 h-5 text-slate-300"><path d="M12.83 2.18a2 2 0 0 0-1.66 0L2.6 6.08a1 1 0 0 0 0 1.83l8.58 3.91a2 2 0 0 0 1.66 0l8.58-3.9a1 1 0 0 0 0-1.83z"></path><path d="M2 12a1 1 0 0 0 .58.91l8.6 3.91a2 2 0 0 0 1.65 0l8.58-3.9A1 1 0 0 0 22 12"></path><path d="M2 17a1 1 0 0 0 .58.91l8.6 3.91a2 2 0 0 0 1.65 0l8.58-3.9A1 1 0 0 0 22 17"></path></svg>' },
  { title: 'Cryptocurrency Fundamentals: From Fiat Alternative to Wealth Preserver', description: 'Master the basics of blockchain, decentralized assets, and how crypto functions as a sovereign alternative to government-controlled currency systems.', status: 'coming', statusLabel: 'Coming Soon', icon: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="lucide lucide-bitcoin w-5 h-5 text-orange-400"><path d="M11.767 19.089c4.924.868 6.14-6.025 1.216-6.894m-1.216 6.894L5.86 18.047m5.908 1.042-.347 1.97m1.563-8.864c4.924.869 6.14-6.025 1.215-6.893m-1.215 6.893-3.94-.694m5.155-6.2L8.29 4.26m5.908 1.042.348-1.97M7.48 20.364l3.126-17.727"></path></svg>' },
  { title: 'Crypto as the Emerging Dominant Currency: Advanced Strategies', description: 'Explore advanced positioning strategies, tokenized assets, and how to navigate the transition as digital currencies become the global monetary backbone.', status: 'coming', statusLabel: 'Coming Soon', icon: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="lucide lucide-trending-up w-5 h-5 text-blue-400"><polyline points="22 7 13.5 15.5 8.5 10.5 2 17"></polyline><polyline points="16 7 22 7 22 13"></polyline></svg>' },
  { title: 'Integrated Wealth Defense: Building a Resilient Portfolio for the Future', description: 'Synthesize everything — precious metals, crypto, matrix income, and real-world assets — into a unified, resilient wealth defense strategy built for any economic climate.', status: 'coming', statusLabel: 'Coming Soon', icon: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="lucide lucide-graduation-cap w-5 h-5 text-emerald-400"><path d="M21.42 10.922a1 1 0 0 0-.019-1.838L12.83 5.18a2 2 0 0 0-1.66 0L2.6 9.08a1 1 0 0 0 0 1.832l8.57 3.908a2 2 0 0 0 1.66 0z"></path><path d="M22 10v6"></path><path d="M6 12.5V16a6 3 0 0 0 12 0v-3.5"></path></svg>' }
])

const roadmapPhases = ref([
  { quarter: 'Q1 2026', name: 'Phase 1', title: 'Foundation Launch', active: false, completed: true, items: ['Beta launch on Binance Smart Chain', 'Foundation & Builder boards live', 'Community onboarding begins', 'Educational materials release'] },
  { quarter: 'Q2 2026', name: 'Phase 2', title: 'Growth Expansion', active: true, completed: false, items: ['Growth through Strategist boards', 'Gold trading treasury allocation', 'AI-guided education platform', 'First quarterly silver distribution'] },
  { quarter: 'Q3 2026', name: 'Phase 3', title: 'Premium Tiers', active: false, completed: false, items: ['Executive & Elite boards launch', 'Enhanced referral programs', 'Physical silver coin partnerships', 'Global community expansion'] },
  { quarter: 'Q4 2026', name: 'Phase 4', title: 'Legacy Era', active: false, completed: false, items: ['Legacy board activation', 'Full profit share implementation', 'Institutional partnerships', 'Golden Age wealth preservation'] }
])

const faqs = ref([
  { question: 'What is Sky Starter Kit?', answer: 'Sky Starter Kit is a community-driven wealth multiplication system built on the Binance Smart Chain. It combines the ancient principle of Sky Starter Kit – debt release and restoration – with modern decentralized finance, offering a 2×2 matrix cycler with real-world precious metals backing.' },
  { question: 'How does the matrix system work?', answer: 'The system uses a 2×2 "Follow-Me" matrix where you only need 2 direct referrals to qualify. When you enter a board, your position cycles automatically, and you receive a 3× return on your investment. The system features automatic re-entry and dynamic compression for faster cycling.' },
  { question: 'What returns can I expect?', answer: 'You can expect a 3× return on every board investment, instant 10% referral commissions, premium bonuses up to $300 on higher boards, quarterly silver profit shares, and precious metals renewal bonuses. The system is designed for compound growth across multiple income streams.' },
  { question: 'What is the Monthly Leadership Bonus?', answer: '20% of community revenue is distributed monthly in BNB or USDT to qualified leadership cyclers who actively participate in the growth of the community.' },
  { question: 'What are the Sky Starter Kit Asset Renewal Bonuses?', answer: 'Gold (PAXG) + physical silver + tokenized IQD + BNB bonuses earned from cycling Boards 2–9, accumulated and released on fixed bi-monthly dates. Qualified by $25 Board 1 entry.' },
  { question: 'How do I get started?', answer: 'Getting started is simple! Just click the "Join Now" button, start with the Foundation board for only $25, complete the registration process, and you\'ll be guided through the entire setup.' },
  { question: 'What makes this sustainable?', answer: 'Sustainability comes from three perpetual abundance engines: Gold Trading MT5 Bot, IQD Sky Starter Kit Stacking Vault, and the Tiered Momentum Fund. These engines work together to ensure the system remains evergreen with continuous growth and rewards.' }
])
</script>

<style scoped>
.animate-bounce {
  animation: bounce 2s infinite;
}

@keyframes bounce {
  0%, 100% { transform: translateY(0); }
  50% { transform: translateY(10px); }
}


@keyframes pulse {
  0%, 100% {
    opacity: 0.3;
  }
  50% {
    opacity: 0.8;
  }
}

.animate-pulse {
  animation: pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite;
}

.animation-delay-2000 {
  animation-delay: 2s;
}

.animation-delay-300 {
  animation-delay: 0.3s;
}

.animation-delay-600 {
  animation-delay: 0.6s;
}

.animation-delay-900 {
  animation-delay: 0.9s;
}

.animation-delay-1200 {
  animation-delay: 1.2s;
}
</style>