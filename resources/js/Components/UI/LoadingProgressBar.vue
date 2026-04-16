<template>
	<div class="rounded-lg h-1 relative overflow-hidden bg-primary-dark">
		<div class="indeterminate-progress-bar-animation bg-primary-light rounded-lg absolute b-0 top-0 w-1/2 h-1"></div>
	</div>
</template>

<style>
.indeterminate-progress-bar-animation {
	/* Move the bar infinitely */
	animation-duration: 2s;
	animation-iteration-count: infinite;
	animation-name: indeterminate-progress-bar;
}

@keyframes indeterminate-progress-bar {
	from {
		left: -50%;
	}
	to {
		left: 100%;
	}
}
</style>
