<script setup>
const { columns } = defineProps({
	columns: Array,
});
</script>

<template>
	<thead class="bg-secondary-50">
		<tr>
			<template v-for="col in columns" :key="col">
				<th class="t-head text-sm font-semibold">
					<span :class="{ 'sr-only': !col.visible }">{{ col.label }}</span>
				</th>
			</template>
		</tr>
	</thead>
</template>
