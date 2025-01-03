import { ref, computed } from 'vue';
import { usePage } from '@inertiajs/vue3';
import usePermissions from '@/Composables/usePermissions.js';

const { hasPermissions } = usePermissions();
const user = computed(() => usePage().props.user);
const app = computed(() => usePage().props.app);

export default function useNavigations() {
  const userNavItems = [

    {
      visible: true,
      name: __('menus.Dashboard'),
      icon: 'dashboard',
      href: route('user.dashboard'),
      current: route().current('home') || route().current('user.dashboard'),
    },


  ];

  const adminNavItems = [

    {
      visible: user.value.is_super_admin || hasPermissions(['update_dashboard']),
      name: __('Dashboard'), 
      icon: 'home',
      href: route('admin.dashboard'),
      current: route().current('admin.dashboard'),
    },

    {
      visible: user.value.is_super_admin || hasPermissions(['update_user']),
      name: __('Manage User'), 
      icon: 'active-user',
      href: route('admin.users.index'),
      current: route().current('admin.users.index'),
    },

    {
      visible: user.value.is_super_admin || hasPermissions(['update_users']),
      name: __('Manage Staffs'),
      icon: 'users',
      current: route().current('admin.role.*') || route().current('admin.staffs.index*') ,
      children: [
       
        {
          visible: true,
          name: __('Roles & Permissions'),
          href: route('admin.role.index'),
          current: route().current('admin.role.*'),
        },

        
        {
          visible: true,
          name: __('Staffs'),
          href: route('admin.staffs.index'),
          current: route().current('admin.staffs.index*'),
        },


      ],
    },

    {
      visible: user.value.is_super_admin || hasPermissions(['update_users']),
      name: __('Components'),
      icon: 'components',
      current: route().current('admin.components.buttion.*') || route().current('admin.components.heading*') ,
      children: [
       
       
    {
      visible: true,
      name: __('Buttion'), 
      href: route('admin.components.buttion'),
      current: route().current('admin.components.buttion'),
    },


    {
      visible: true,
      name: __('Heading'), 
      href: route('admin.components.heading'),
      current: route().current('admin.components.heading'),
    },


      ],
    },
    

  
  ];

  return {
    userNavItems,
        adminNavItems,
  };
}



