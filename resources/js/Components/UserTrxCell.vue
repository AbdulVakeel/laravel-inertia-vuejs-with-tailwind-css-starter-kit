<template>
	<div class="flex items-center p-2">
	  <img
		v-if="item.user?.profile_photo_url"
		:src="item.user.profile_photo_url"
		:alt="item.user.username"
		class="h-7 w-7 rounded-full mr-2"
	  />
  	  <div>
		<p
		  v-if="item.user?.username"
		  class="px-2 mr-4  text-sm text-info font-semibold cursor-pointer"
		  @click="selectUser(item.user.username)"
		>
		  {{ item.user.username }}
		</p>
  		
	  </div>
	</div>
  </template>
  
  <script setup>
  import { defineProps } from 'vue';
    const props = defineProps({
	item: Object,
	form: Object, 
  });
  
  const selectUser = (username) => {
	props.form.user = username; 
  };
  </script>
  
