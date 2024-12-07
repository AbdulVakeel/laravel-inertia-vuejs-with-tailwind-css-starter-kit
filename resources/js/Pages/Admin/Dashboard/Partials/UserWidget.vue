<script setup>

import { IonIcon } from '@ionic/vue';
import {
  person, people, removeCircleOutline, removeCircle, briefcase, closeCircleOutline,
  cash, checkmarkCircleOutline, trophy, cube, wallet, logoUsd, trendingUp, cart, pricetags, archive,
  trendingDown, journal, remove, arrowUp, alert, recording, codeDownload, barcode, gitCompare, list
} from 'ionicons/icons';
import useCurrencyFormatter from '@/Composables/useCurrencyFormatter.js';
const { formatCurrencySymbol, formatNumber } = useCurrencyFormatter();

const dashboard = [
  { label: 'Total User', icon: people, amount: formatNumber(3000) },
  { label: 'Active User', icon: person, amount: formatNumber(1950) },
  { label: 'Inactive User', icon: removeCircleOutline, amount: formatNumber(1050) },
  { label: 'Banned User', icon: removeCircle, amount: formatNumber(450) },
  { label: 'Kyc Verified', icon: checkmarkCircleOutline, amount: formatNumber(1575) },
  { label: 'Kyc Unverified', icon: closeCircleOutline, amount: formatNumber(1425) },
  { label: 'Deposit Wallet', icon: wallet, amount: formatCurrencySymbol(17000) },
  { label: 'EWallet Balance', icon: logoUsd, amount: formatCurrencySymbol(5450) },
  { label: 'Recharge Wallet', icon: trendingUp, amount: formatCurrencySymbol(3450) },
  { label: 'Shopping Wallet', icon: cart, amount: formatCurrencySymbol(3350) },
  { label: 'Coupons Wallet', icon: pricetags, amount: formatCurrencySymbol(1890) },
  { label: 'Total Package Buy', icon: cube, amount: formatCurrencySymbol(20450) },
  { label: 'Total Rank Bonus', icon: trophy, amount: formatCurrencySymbol(10500) },
  { label: 'Total Earnings', icon: cash, amount: formatCurrencySymbol(24000) },
  { label: 'Total Deposits', icon: briefcase, amount: formatCurrencySymbol(9500) },
  { label: 'Pending Deposits', icon: remove, amount: formatCurrencySymbol(7500) },
  { label: 'Rejected Deposits', icon: alert, amount: formatCurrencySymbol(1450) },
  { label: 'Deposits Charges', icon: barcode, amount: formatCurrencySymbol(450) },
  { label: 'Total Withdrawals', icon: trendingDown, amount: formatCurrencySymbol(12000) },
  { label: 'Pending Withdrawals', icon: arrowUp, amount: formatCurrencySymbol(5400) },
  { label: 'Rejected Withdrawals', icon: codeDownload, amount: formatCurrencySymbol(2350) },
  { label: 'Withdrawal Charges', icon: journal, amount: formatCurrencySymbol(700) },
  { label: 'Email Verified Users', icon: recording, amount: formatCurrencySymbol(2050) },
  { label: 'Email Unverified Users', icon: archive, amount: formatCurrencySymbol(1050) },
];


const home = [
  { label: 'Total Sales', icon: cart, amount: formatCurrencySymbol(4500) },
  { label: 'Total Orders', icon: pricetags, amount: formatNumber(150) },
  { label: 'Total Posts', icon: list, amount: formatNumber(250) },
  { label: 'Total Comments', icon: gitCompare, amount: formatNumber(350) },
];
const app = computed(() => usePage().props.app);

const data = computed(() => usePage().props.data);



</script>
<template>
	<div class="grid grid-cols-1 md:grid-cols-4 gap-3 mb-4">

			<SectionCard><div class="flex justify-between items-center px-5 py-3">
				<div>
					<h1 class="py-2 text-[18px] font-bold">{{ (data.all_users) }}</h1>
					<p class="text-[14px]  pt-2 font-semibold">{{ __(' All User') }}</p>
				</div>
				<div>
					<span class="w-20 h-20   inline-flex items-center justify-center">
						<Icon name="alluser" class="h-10" />
					</span>
				</div>
			</div>
		</SectionCard>
		

		<SectionCard>
			<div class="flex justify-between items-center  px-5 py-3">
				<div>
					<h1 class="py-2 text-[18px] font-bold">{{ (data.banned_users) }}</h1>
					

					<p class="text-[14px]  pt-2 font-semibold">{{ __('Banned User') }}</p>
				</div>
				<div>
					<span class="w-20 h-20   inline-flex items-center justify-center">
						<Icon name="banned_users"  class="h-10"  />
					</span>
				</div>
			</div>
		</SectionCard>
		<SectionCard>
			<div class="flex justify-between items-center px-5 py-3">
				<div>
					<h1 class="py-2 text-[18px] font-bold">{{ (data.verify_users) }}</h1>
					

					<p class="text-[14px]  pt-2 font-semibold">{{ __('Email Verified Users') }}</p>
				</div>
				<div>
					<span class="w-20 h-20   inline-flex items-center justify-center">
						<Icon name="verified_users"  class="h-10"  />
					</span>
				</div>
			</div>
		</SectionCard>

		<SectionCard>
			<div class="flex justify-between items-center px-5 py-3">
				<div>
					<h1 class="py-2 text-[18px] font-bold">{{ (data.email_unverified_users) }}</h1>
						

					<p class="text-[14px]  pt-2 font-semibold">{{ __('Email Unverified Users') }}</p>
				</div>
				<div>
					<span class="w-20 h-20   inline-flex items-center justify-center">
						<Icon name="email_unverified_users"  class="h-10"  />
					</span>
				</div>
			</div>
		</SectionCard>





		</div>
	 
		<div class="grid grid-cols-1 md:grid-cols-3 gap-5 pb-2 ">
      <div class="box  overflow-hidden sales-card bg-gradient-to-r from-cyan-400 via-cyan-400 to-cyan-500 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-200 dark:focus:ring-cyan-700 font-medium !rounded-sm">
        <div class="px-4 pt-4 pb-2">
          <div>
            <h6 class="mb-3 text-[.75rem] font-medium text-fixed-white">TODAY EARNINGS</h6>
          </div>
          <div class="pb-0 mt-0">
            <div class="flex">
              <div>
                <h4 class="text-[1.25rem] font-bold text-fixed-white">$1,330.17</h4>
                <p class="mb-0  text-[.75rem] text-fixed-white opacity-[0.7]">Compared to last week</p>
              </div>
              <span class="float-end my-auto ms-auto">
                <i class="fas fa-arrow-circle-down text-fixed-white"></i>
                <span class="text-fixed-white opacity-[0.7]"> -13.09%</span>
              </span>
            </div>
          </div>
        </div>
    </div>
   
      <div class="box  overflow-hidden sales-card bg-gradient-to-r from-green-300 via-green-400 to-green-500 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-700 font-medium  !rounded-sm">
        <div class="px-4 pt-4 pb-2">
          <div>
            <h6 class="mb-3 text-[.75rem] font-medium text-fixed-white">TOTAL EARNINGS</h6>
          </div>
          <div class="pb-0 mt-0">
            <div class="flex">
              <div>
                <h4 class="text-[1.25rem] font-bold text-fixed-white">$3,125.70</h4>
                <p class="mb-0 text-[.75rem] text-fixed-white opacity-[0.7]">Compared to last week</p>
              </div>
              <span class="float-end my-auto ms-auto">
                <i class="fas fa-arrow-circle-up text-fixed-white"></i>
                <span class="text-fixed-white opacity-[0.7]"> 72.09%</span>
              </span>
            </div>
          </div>
        </div>
      </div>
  
      <div class="box  overflow-hidden sales-card bg-gradient-to-r from-blue-400 via-blue-500 to-blue-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-200 dark:focus:ring-blue-700 font-medium !rounded-sm">
        <div class="px-4 pt-4 pb-2">
          <div>
            <h6 class="mb-3 text-[.75rem] font-medium text-fixed-white">PRODUCT SOLD</h6>
          </div>
          <div class="pb-0 mt-0">
            <div class="flex">
              <div>
                <h4 class="text-[1.25rem] font-bold text-fixed-white">$8,820.50</h4>
                <p class="mb-0 text-[.75rem] text-fixed-white opacity-[0.7]">Compared to last week</p>
              </div>
              <span class="float-end my-auto ms-auto">
                <i class="fas fa-arrow-circle-down text-fixed-white"></i>
                <span class="text-fixed-white opacity-[0.7]"> -352.3</span>
              </span>
            </div>
          </div>
        </div>
    </div>
</div>


  <div class="grid grid-cols-1 md:grid-cols-4 gap-5 pb-2 ">

    <!-- card -->
    <SectionCard v-for="(adminhome, homeindex) in home" :key="homeindex" class="card-section">
      <div class="card-body flex items-center">

        <span class="card-section-span m-2 rounded p-2   bg-gradient-to-r from-blue-400 via-blue-500 to-blue-600 text-white ">
          <IonIcon :icon="adminhome.icon" class="h-10 w-10 " />
        </span>
        <div class="flex flex-col">
          <h1 class="card-section-title">{{ adminhome.label }}</h1>
          <p class="card-section-span-p"> {{ adminhome.amount }}</p>
        </div>

      </div>
    </SectionCard>


  </div>


  <div class="grid grid-cols-1 md:grid-cols-3 gap-5 pb-2 ">

    <SectionCard v-for="(admindashboard, index) in dashboard" :key="index" class="custom-card-section">
      <div class="flex justify-between items-center px-5 py-3">
        <div>
          <h1 class="custom-card-section-title">{{ admindashboard.amount }}</h1>
          <p class="custom-card-section-span-p">{{ admindashboard.label }}</p>
        </div>
        <div>
          <span class="custom-card-section-span">
            <IonIcon :icon="admindashboard.icon" class="h-10 w-10" />
          </span>
        </div>
      </div>
    </SectionCard>

  </div>

	
</template>