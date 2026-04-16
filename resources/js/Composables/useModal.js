import { ref, watch } from 'vue';

export default function useModal() {

  const showModal = ref(false);
  const selectedItem = ref('');

  const handleShowModal = (item) => {
    selectedItem.value = item;
    showModal.value = true;
  };

  const handleCloseModal = () => {
    showModal.value = false;
    selectedItem.value = {};
  };

  return {
    showModal,
    selectedItem,
    handleShowModal, 
    handleCloseModal
  };
}
