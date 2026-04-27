import { ref, computed } from 'vue';
import { usePage } from '@inertiajs/vue3';
import usePermissions from '@/Composables/usePermissions.js';
import { Icon } from '@iconify/vue';

const { hasPermissions } = usePermissions();

const user = computed(() => usePage().props.user);
const app = computed(() => usePage().props.app);

export default function useNavigations() {

  /**
   * USER NAVIGATION
   */
  const userNavItems = [
    {
      visible: true,
      name: __('menus.Dashboard'),
      icon: 'mdi:home',
      href: route('user.dashboard'),
      current: route().current('home') || route().current('user.dashboard'),
    },

      {
            visible: true,
            name: ('Reports'),
            icon: 'mdi:file-report',
            current:  route().current('user.reports.transaction'),
            children: [
                {
                    visible: true,
                    name: ('Transactions'),
                    href: route('user.reports.transaction'),
                    current: route().current('user.reports.transaction'),
                },


            ],
        },

    {
      visible: true,
      name: _('Faq'),
      icon: 'qlementine-icons:faq-16',
      href: route('user.faq.index'),
      current: route().current('user.faq.index'),
    },
    {
      visible: true,
      name: _('Support'),
      icon: 'fluent:person-support-24-filled',
      href: route('user.ticket.index'),
      current: route().current('user.ticket.index'),
    },
  ];

  /**
   * ADMIN NAVIGATION
   */
  const adminNavItems = [
    {
      visible: user.value.is_super_admin || hasPermissions(['update_dashboard']),
      name: __('Dashboard'),
      icon: 'mdi:home',
      href: route('admin.dashboard'),
      current: route().current('admin.dashboard'),
    },

    {
      visible: user.value.is_super_admin || hasPermissions(['update_user']),
      name: __('Manage User'),
      icon: 'mdi:account-group',
      href: route('admin.users.index'),
      current: route().current('admin.users.index'),
    },

    {
      visible: user.value.is_super_admin || hasPermissions(['update_users']),
      name: __('Manage Staffs'),
      icon: 'mdi:user',
      // current: route().current('admin.role.*') || route().current('admin.staffs.index*'),
      current: route().current('admin.staffs.index*'),
      children: [
        // {
        //   visible: true,
        //   name: __('Roles & Permissions'),
        //   href: route('admin.role.index'),
        //   current: route().current('admin.role.*'),
        // },
        {
          visible: true,
          name: __('Create Staffs'),
          href: route('admin.staffs.index'),
          current: route().current('admin.staffs.index*'),
        },
      ],
    },

    {
      visible: user.value.is_super_admin || hasPermissions(['update_users']),
      name: __('Membership'),
      icon: 'mdi:finance',
      current: route().current('admin.investment.index'),
      children: [
        {
          visible: true,
          name: __('Packages'),
          href: route('admin.investment.index'),
          current: route().current('admin.investment.index'),
        },
      ],
    },

     {
           visible: user.value.is_super_admin || hasPermissions(['update_users']),
            name: ('Reports'),
            icon: 'mdi:file-report',
            current: route().current('admin.report.transaction'),
            children: [
                {
                    visible: true,
                    name: ('Transactions Log'),
                    href: route('admin.report.transaction'),
                    current: route().current('admin.report.transaction'),
                },

            ],
        },

    {
      visible: true,
      name: _('Faq'),
      icon: 'qlementine-icons:faq-16',
      href: route('admin.faqs.index'),
      current: route().current('admin.faqs.index'),
    },

    {
      visible: true,
      name: _('Support'),
      icon: 'fluent:person-support-24-filled',
      href: route('admin.ticket.index'),
      current: route().current('admin.ticket.index'),
    },

    {
      visible: true,
      name: _('Buttion'),
       icon: 'skill-icons:styledcomponents',
      href: route('admin.components.buttion'),
      current: route().current('admin.components.buttion'),
    },
  ];

  return {
    userNavItems,
    adminNavItems,
  };
}