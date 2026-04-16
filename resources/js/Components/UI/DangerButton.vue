<script setup>
defineProps({
    type: {
        type: String,
        default: 'button',
    },
});
</script>

<template>
    <button :type="type" class="btn btn-danger shadow-md shadow-danger">
        <slot />
    </button>
</template>
