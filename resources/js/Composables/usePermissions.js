import { usePage, useForm } from '@inertiajs/vue3';
import { computed } from 'vue';

const user = computed(() => usePage().props.user);

export default function useHelpers() {

  function hasRole(rolesArray) {
    return rolesArray.some(item => user.value?.allRoles.includes(item))


  }

  function hasPermissions(permissionsArray) {
    return  permissionsArray.some(item => user.value?.allPermissions.includes(item))
  }


  return {
    hasPermissions,
    hasRole,

  };

}
