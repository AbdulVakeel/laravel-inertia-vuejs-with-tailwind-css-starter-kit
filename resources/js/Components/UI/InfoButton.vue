<script setup>
defineProps({
	type: {type: String, 		default: 'submit',	},
	as: {type: String, 		default: 'button',	},
});
</script>

<template>
	<button v-if="as == 'button'" :type="type" v-wave class="btn btn-info shadow-md dark:shadow-info/50">
		<slot />
	</button>

	<a v-else-if="as == 'a'"  v-wave class="btn btn-info shadow-md dark:shadow-info/50">
		<slot />
	</a>

	<Link v-else  v-wave class="btn btn-info shadow-md dark:shadow-info/50">
		<slot />
	</Link>

</template>
