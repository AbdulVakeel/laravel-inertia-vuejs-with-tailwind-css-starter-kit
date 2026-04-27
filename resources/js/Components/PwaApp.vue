<script setup>
import { ref, onMounted } from 'vue';
import { Icon } from '@iconify/vue';

const { show, maxWidth, closeable } = defineProps({
  show: { type: Boolean, default: false },
  maxWidth: { type: String, default: 'sm' },
  closeable: { type: Boolean, default: true }
});

const emit = defineEmits(['close']);

const showInstallPopup = ref(false);
let deferredPrompt = null;

onMounted(() => {
  // Listen for the beforeinstallprompt event
  window.addEventListener('beforeinstallprompt', (event) => {
    event.preventDefault();
    deferredPrompt = event;
    showInstallPopup.value = true; // Show the install prompt
  });

  // Listen for the appinstalled event
  window.addEventListener('appinstalled', () => {
    showInstallPopup.value = false; // Hide the popup after installation
    console.log('App installed successfully!');
  });
});

function installPWA() {
  if (deferredPrompt) {
    // Show the native installation prompt
    deferredPrompt.prompt();
    deferredPrompt.userChoice.then((choiceResult) => {
      if (choiceResult.outcome === 'accepted') {
        console.log('User accepted the install prompt');
      } else {
        console.log('User dismissed the install prompt');
      }
      deferredPrompt = null; // Reset the deferred prompt
    });
  }
}

function dismissPopup() {
  showInstallPopup.value = false;
  emit('close');
}
</script>

<template>
  <!-- Main Modal -->
  <Modal :show="show || showInstallPopup" :max-width="maxWidth" :closeable="closeable">
    <div class="modal-container" @click.self="dismissPopup">
      <SectionCard class="rounded-none dark:rounded-none">
        <!-- Close Button -->
        <div class="flex items-center justify-end w-full px-3 pt-3 cursor-pointer" @click="dismissPopup">
          <Icon icon="mdi:close" class="text-xl dark:text-white" />
        </div>

        <div class="px-4 pb-4">
          <header class="border-b border-secondary/10 dark:border-secondary mb-4 -mt-3">
            <h1 class="text-dark text-md font-bold inline-flex items-center">
              <Icon icon="wpf:android" class="custom-icon-24" />
            </h1>
          </header>

          <div v-if="showInstallPopup" class="text-center">
            <h3 class="text-lg font-bold dark:text-white">Install Our App</h3>
            <p class="text-sm mb-4 dark:text-white">Get a Better Experience With Our App. Install it on Your Device!</p>

            <!-- Install Button -->
            <div class="flex justify-center gap-2">
              <Button @click="installPWA" class="px-4 py-2 rounded">
                Install Now
              </Button>
            </div>
          </div>
        </div>
      </SectionCard>
    </div>
  </Modal>
</template>
