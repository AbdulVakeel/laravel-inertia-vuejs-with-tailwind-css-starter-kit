<script setup>
defineProps({
	type: {type: String, 		default: 'submit',	},
	as: {type: String, 		default: 'button',	},
});
</script>

<template>
	<button v-if="as == 'button'" :type="type" v-wave class="btn btn-primary shadow-md dark:shadow-primary/50">
		<slot />
	</button>

	<a v-else-if="as == 'a'"  v-wave class="btn btn-primary shadow-md dark:shadow-primary/50">
		<slot />
	</a>

	<Link v-else  v-wave class="btn btn-primary shadow-md dark:shadow-primary/50">
		<slot />
	</Link>

</template>
