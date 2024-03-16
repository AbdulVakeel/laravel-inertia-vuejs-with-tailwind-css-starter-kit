<template>
	<div class="bg-dark">
		<AppContainer>
			<div
				:class="[
					'grid grid-cols-1 min-h-screen bg-dark text-light overflow-hidden',
					$slots.logo ? 'md:grid-cols-[35%_auto]' : 'md:grid-cols-1',
				]">
				<div
					v-if="$slots.logo"
					class="w-full px-3 md:px-6 py-2 md:py-4 bg-light rounded-xl dark:rounded-xl m-4 ">
					<slot name="logo" />
				</div>

				<div class="h-full w-full">
					<slot />
				</div>
			</div>
		</AppContainer>
	</div>
</template>
