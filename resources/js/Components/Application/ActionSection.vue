<script setup>

</script>

<template>
	<div class="md:grid md:grid-cols-3 md:gap-6">
		<SectionTitle>
			<template #title>
				<slot name="title" />
			</template>
			<template #description>
				<p class="text-light">
					<slot name="description" />
				</p>
			</template>
		</SectionTitle>

		<div
			class="mt-5 md:mt-0 md:col-span-2 bg-light dark:shadow-gray-50/10 dark:shadow shadow-md dark:rounded-lg rounded-lg">
			<div class="px-4 py-5 sm:p-6">
				<slot name="content" />
			</div>
		</div>
	</div>
</template>
