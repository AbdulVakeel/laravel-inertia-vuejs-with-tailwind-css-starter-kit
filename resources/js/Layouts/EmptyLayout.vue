<script setup>

defineProps({
	title: String,
});
</script>

<template>
	<Head :title="title" />
	<div>
		<FlashMessage />
		<div class="min-h-screen bg-white dark:bg-secondary-dark text-light  bg-dark text-dark">
			<main>
				<slot />
			</main>
		</div>		
	</div>
	
</template>

<style scoped>
.bottom-right {
	position: fixed;
	top: 2rem;
	right: 2rem;
	z-index: 1000;
	width: 20rem;
}
</style>
