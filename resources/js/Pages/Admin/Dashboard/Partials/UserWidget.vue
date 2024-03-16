<script setup>


const app = computed(() => usePage().props.app);

const data = computed(() => usePage().props.data);



</script>
<template>
	<div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-4">

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
	 

	
</template>