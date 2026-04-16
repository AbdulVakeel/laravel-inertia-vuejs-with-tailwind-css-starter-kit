<script>
import Layout from '@/Layouts/AdminLayout.vue';
import {defineComponent} from 'vue';

export default defineComponent({
    layout: Layout,
});
</script>


<template>
   <AppContainer>
  <h1 class="custom-card-section-title">Button</h1>

<div class="grid grid-cols-1 md:grid-cols-3 gap-2 pb-2 ">
  <Button intent="primary">Primary Button</Button>
  <Button intent="success">Success Button</Button>
  <Button intent="light">Light Button</Button>
  <Button intent="danger">Danger Button</Button>
  <Button intent="warning">Warning Button</Button>
  <Button intent="dark">Dark Button</Button>

</div>


<h1 class="custom-card-section-title">Button Gradient</h1>

<div class="grid grid-cols-1 md:grid-cols-4 gap-2 pb-2 ">
  <button type="button"
    class="text-white bg-gradient-to-r from-blue-400 via-blue-500 to-blue-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-200 dark:focus:ring-blue-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Blue</button>
  <button type="button"
    class="text-white bg-gradient-to-r from-green-300 via-green-400 to-green-500 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Green</button>
  <button type="button"
    class="text-white bg-gradient-to-r from-cyan-400 via-cyan-400 to-cyan-500 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-200 dark:focus:ring-cyan-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Cyan</button>
  <button type="button"
    class="text-white bg-gradient-to-r from-teal-300 via-teal-400 to-teal-500 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Teal</button>
  <button type="button"
    class="text-gray-900 bg-gradient-to-r from-lime-100 via-lime-300 to-lime-400 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-lime-300 dark:focus:ring-lime-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Lime</button>
  <button type="button"
    class="text-white bg-gradient-to-r from-red-300 via-red-400 to-red-500 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Red</button>
  <button type="button"
    class="text-white bg-gradient-to-r from-pink-300 via-pink-400 to-pink-500 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-pink-300 dark:focus:ring-pink-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Pink</button>
  <button type="button"
    class="text-white bg-gradient-to-r from-purple-400 via-purple-500 to-purple-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Purple</button>
</div>


<h1 class="custom-card-section-title">Button Gradient duotone</h1>

<div class="grid grid-cols-1 md:grid-cols-4 gap-2 pb-2 ">
  <button type="button"
    class="text-white bg-gradient-to-br from-purple-500 to-blue-400 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-200 dark:focus:ring-blue-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Purple
    to Blue</button>
  <button type="button"
    class="text-white bg-gradient-to-r from-cyan-400 to-blue-400 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-200 dark:focus:ring-cyan-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Cyan
    to Blue</button>
  <button type="button"
    class="text-white bg-gradient-to-br from-green-300 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-100 dark:focus:ring-green-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Green
    to Blue</button>
  <button type="button"
    class="text-white bg-gradient-to-r from-purple-400 to-pink-400 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-purple-100 dark:focus:ring-purple-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Purple
    to Pink</button>
  <button type="button"
    class="text-white bg-gradient-to-br from-pink-400 to-orange-300 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-pink-00 dark:focus:ring-pink-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Pink
    to Orange</button>
  <button type="button"
    class="text-gray-900 bg-gradient-to-r from-teal-100 to-lime-100 hover:bg-gradient-to-l hover:from-teal-200 hover:to-lime-200 focus:ring-4 focus:outline-none focus:ring-lime-200 dark:focus:ring-teal-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Teal
    to Lime</button>
  <button type="button"
    class="text-gray-900 bg-gradient-to-r from-red-100 via-red-200 to-yellow-100 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-red-100 dark:focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Red
    to Yellow</button>
</div>

<h1 class="custom-card-section-title">Button Disabled</h1>

<div class="grid grid-cols-1 md:grid-cols-3 gap-2 pb-2 ">
  <Button intent="primary" disabled>Disabled Primary Button</Button>
  <Button intent="success" disabled>Disabled Success Button</Button>
  <Button intent="light" disabled>Disabled Light Button</Button>
  <Button intent="danger" disabled>Disabled Danger Button</Button>
  <Button intent="warning" disabled>Disabled Warning Button</Button>
  <Button intent="dark" disabled>Disabled Dark Button</Button>
</div>


<h1 class="custom-card-section-title">Button Loading</h1>

<div class="grid grid-cols-1 md:grid-cols-4 gap-2 pb-2 ">
  <button disabled type="button"
    class="text-white bg-blue-700 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 inline-flex items-center">
    <svg aria-hidden="true" role="status" class="inline w-4 h-4 me-3 text-white animate-spin" viewBox="0 0 100 101"
      fill="none" xmlns="http://www.w3.org/2000/svg">
      <path
        d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
        fill="#E5E7EB" />
      <path
        d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
        fill="currentColor" />
    </svg>
    Loading...
  </button>
  <button disabled type="button"
    class="py-2.5 px-5 me-2 text-sm font-medium text-gray-800 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:outline-none focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 inline-flex items-center">
    <svg aria-hidden="true" role="status" class="inline w-4 h-4 me-3 text-gray-100 animate-spin dark:text-gray-600"
      viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path
        d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
        fill="currentColor" />
      <path
        d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
        fill="#1C64F2" />
    </svg>
    Loading...
  </button>
</div>


<h1 class="custom-card-section-title">Button Size</h1>


<button type="button" class="px-3 mr-1 py-2 text-xs font-medium text-center text-white bg-blue-600 rounded-lg hover:bg-blue-900 focus:ring-4 focus:outline-none focus:ring-blue-200 dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-700">Extra small</button>
<button type="button" class="px-3 mr-1 py-2 text-sm font-medium text-center text-white bg-blue-600 rounded-lg hover:bg-blue-900 focus:ring-4 focus:outline-none focus:ring-blue-200 dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-700">Small</button>
<button type="button" class="px-5 mr-1 py-2.5 text-sm font-medium text-white bg-blue-700 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-center dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-700">Base</button>
<button type="button" class="px-5 mr-1 py-3 text-base font-medium text-center text-white bg-blue-600 rounded-lg hover:bg-blue-900 focus:ring-4 focus:outline-none focus:ring-blue-200 dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-700">Large</button>
<button type="button" class="px-6 mr-1 py-3.5 text-base font-medium text-white bg-blue-700 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-center dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-700">Extra large</button>
</AppContainer>

</template>
