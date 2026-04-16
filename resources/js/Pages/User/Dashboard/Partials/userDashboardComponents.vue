<script setup>

const { item } = defineProps({
	item: [Array, Object],
});

const data = computed(() => usePage().props.data);
const app = computed(() => usePage().props.app);

</script>
<template>
	<div class="grid grid-cols-1 md:grid-cols-3 gap-5  ">


		<SectionCard>
			<div class="flex justify-between items-center px-5 py-3">
				<div>
					<h1 class="py-2 text-[18px] font-bold">USD 30</h1>
					<p class="text-[14px]  pt-2 font-semibold">{{ __(' Deposit Wallet Balance') }}</p>
				</div>
				<div>
					<span class="w-20 h-20 rounded-full inline-flex items-center justify-center">
						<Icon name="All_User_Income" class="h-10 " />
					</span>
				</div>
			</div>
		</SectionCard>


<SectionCard>
	<div class="flex justify-between items-center px-5 py-3 ">
		<div>
			<h1 class="py-2 text-[18px] font-bold">USD 50</h1>
			<p class="text-[14px]  pt-2 font-semibold">{{ __('Encash Wallet') }}</p>
		</div>
		<div>
			<span class="w-20 h-20 rounded-full inline-flex items-center justify-center">
				<Icon name="cash-wallets" class="h-10 " />
			</span>
		</div>
	</div>
</SectionCard>



<SectionCard>
	<div class="flex justify-between items-center px-5 py-3 ">
		<div>
			<h1 class="py-2 text-[18px] font-bold">USD 200</h1>
			<p class="text-[14px]  pt-2 font-semibold">{{ __('Promotion wallet') }}</p>
		</div>
		<div>
			<span class="w-20 h-20 rounded-full inline-flex items-center justify-center">
				<Icon name="promotion-wallets" class="h-10 " />
			</span>
		</div>
	</div>
</SectionCard>




	</div>
</template>
