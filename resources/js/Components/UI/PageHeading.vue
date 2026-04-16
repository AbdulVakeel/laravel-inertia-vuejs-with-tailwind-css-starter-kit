<template>
	<div class="md:flex md:items-center md:justify-between mb-6">
		<div class="flex-1 min-w-0">
			<h2 class="text-2xl font-semibold leading-7 text-secondary-800 sm:truncate">
				<slot name="title" />
				<slot />
			</h2>
		</div>
		<div class="mt-4 flex md:mt-0 md:ml-4">
			<slot name="links" />
		</div>
	</div>
</template>

