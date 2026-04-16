<script setup>
const { columns, rowClass, items, filters, url } = defineProps({
	columns: Array,
	rowClass: [String, Array],
	items: Object,
	url: String,
	currentPage: {type: Number, default: 0},
	perPage: {type: Number, default: 0},
});

const emit = defineEmits(['onSort']);

const form = ref({
	sort: '',
});

const renderCell = (item, column) => {
	return _.get(item, column.key);
};

const sort = (col) => {
	if (!col.sortable) return;

	form.value.sort = form.value.sort !== col.key ? col.key : `-${col.key}`;

	emit('onSort', col);
};
</script>

<template>
	<div>
		<div class="w-full hidden md:block overflow-auto">
			<table class="min-w-full">
				<!-- Table Head -->
				<thead class="bg-dark">
					<tr>

						<th class="px-2 py-3 bg-secondary-lighter border-b dark:border-b-0 dark:bg-secondary-dark text-dark text-sm font-semibold"
							v-for="col in columns" :key="col">
							<slot :name="`column(${col.key})`" :col="col">
								<div class="cursor-pointer flex items-center mr-5 my-1 whitespace-nowrap"
									@click="sort(col)">
									<span>{{ col.label }}</span>
									<div v-if="col.sortable">
										<svg v-if="form.sort === col.key" class="h-5 text-green-500"
											xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
											viewBox="0 0 32 32">
											<path d="M24 24l-8 8l-8-8z" fill="currentColor"></path>
										</svg>

										<svg v-else-if="form.sort === `-${col.key}`" class="h-5 text-green-500"
											xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
											viewBox="0 0 32 32">
											<path d="M8 8l8-8l8 8z" fill="currentColor"></path>
										</svg>

										<svg v-else class="w-3 h-3 ml-2 text-gray-400" aria-hidden="true"
											xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" sorted="false">
											<path fill="currentColor"
												d="M41 288h238c21.4 0 32.1 25.9 17 41L177 448c-9.4 9.4-24.6 9.4-33.9 0L24 329c-15.1-15.1-4.4-41 17-41zm255-105L177 64c-9.4-9.4-24.6-9.4-33.9 0L24 183c-15.1 15.1-4.4 41 17 41h238c21.4 0 32.1-25.9 17-41z">
											</path>
										</svg>
									</div>
								</div>
							</slot>
						</th>
					</tr>
				</thead>
				<!-- Table Body -->
				<tbody class="bg-white dark:bg-secondary-dark text-light">
					<slot name="body">
						<tr v-for="(item, i) in items" :key="i"
							class="border-solid border-b border-secondary-light/50 dark:border-secondary dark:hover:bg-secondary hover:bg-secondary-light/20">

							<td v-for="(column, j) in columns" :key="j">
								<slot :name="`cell(${column.key})`" :item="item">
									<div class="text-sm px-3 py-2 font-semibold">
										<!-- {{ column.key == 'sr' ? i + 1 : renderCell(item, column) }} -->
										{{ column.key == 'sr'
											? ((currentPage - 1) * perPage) + i + 1
											: renderCell(item, column)
										}}

									</div>
								</slot>
							</td>
						</tr>
					</slot>
				</tbody>
			</table>
		</div>

		<!-- For Mobile view -->
		<div class="md:hidden grid grid-cols-1 gap-3 divide-y-2 divide-primary">
			<div v-for="(item, i) in items" :key="i" class="">
				<div v-for="(column, j) in columns" :key="j" class="">
					<div
						class="flex items-center justify-between flex-wrap text-light text-sm px-4 dark:hover:bg-secondary hover:bg-secondary-lighter">
						<div class="text-dark font-semibold">{{ column.label }} :</div>
						<slot :name="`cell(${column.key})`" :item="item">
							<p class="py-2">
								{{ column.key == 'sr' ? i + 1 : renderCell(item, column) }}
							</p>
						</slot>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>
