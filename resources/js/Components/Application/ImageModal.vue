<script setup>

const { imageUrl, show, maxWidth, closeable } = defineProps({
    imageUrl: [String],
    show: { type: Boolean, default: false },
    maxWidth: { type: String, default: '2xl' },
    closeable: { type: Boolean, default: true },
});

const emit = defineEmits(['closeImgModal']);

</script>
<template>
    <Modal :show="show" :max-width="maxWidth" :closeable="closeable" @close="emit('closeImgModal')">
        <div class="flex items-center justify-end w-full px-3 pt-3 cursor-pointer" @click="emit('closeImgModal')">
            <Icon name="close" class="h-7" />
        </div>
        <div class="flex items-center justify-center w-full">
            <img :src="imageUrl" alt="">
        </div>
    </Modal>
</template>
