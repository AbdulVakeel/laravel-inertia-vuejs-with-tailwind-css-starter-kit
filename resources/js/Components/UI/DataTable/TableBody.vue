<script setup>
const data = defineProps({
	data: Array,
	columns: Array,
});

const renderCell = (item, column) => {
	if (column.hasOwnProperty('content')) {
		return column.content(item);
	}
	return _.get(item, column.path);
};
</script>

<template>
	<tbody class="bg-white divide-y divide-secondary-200">
		<tr v-for="(item, i) in data" :key="i">
			<td v-for="(column, j) in columns" :key="j">
				<div class="text-sm text-secondary-900 px-6 py-4" v-html="renderCell(item[0], column)"></div>
			</td>
			<slot />
		</tr>
	</tbody>
</template>
