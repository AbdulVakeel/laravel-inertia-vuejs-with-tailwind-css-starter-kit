<template>
  <div class="flex items-center space-x-3 p-2">
    <img
      class="h-8 w-8 rounded-full"
      :src="user.profile_photo_url"
      :alt="user.firstname"
    />
    <div>
      <p class="text-sm font-semibold">{{ user.username }}</p>
      
      <p class="text-sm">
		  {{ user.email }}
		</p>
    </div>
  </div>
</template>

<script setup>

const props = defineProps({
  user: {
    type: Object,
    required: true
  }
});

</script>
