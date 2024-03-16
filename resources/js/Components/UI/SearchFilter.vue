<script setup>
import useSearchFilter from '@/Stores/useSearchFilter.js';

const { url } = defineProps({
	url: String,
});

const { form, queryParams, reset, processing } = useSearchFilter(url);


</script>

<template>
	<!-- Search -->
	<!-- <div class="flex items-center justify-between"> -->
	<!-- <SelectInput class="text-sm text-secondary-600" v-model="form.perPage" v-if="showPaging">
				<option v-for="item in [25, 50, 100, 500, 1000]" :key="item" :value="item">{{ item }} Per Page</option>
			</SelectInput> -->
	<div class="">
		<SearchInput v-model="form.filter.global" @reset="reset"></SearchInput>
			<h2 class="text-center text-2xl bgwhit">SearchInput: {{ processing }}</h2>
	</div>
	<!-- </div> -->
</template>
