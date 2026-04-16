import { defineStore } from 'pinia';

export const rolePermissionStore = defineStore('role-permission-store', {
  state() {
    return {
      loading: false,
      error: null,
      items: [],
      form: {},
      role: '',
    };
  },


  getters: {
    getItems(state) {
      return state.items;
    },
  },

  actions: {
    handleSubmit() {
      if (this.form?.id) {
        this.form.post(route('admin.role.update', this.form.id), {
          preserveScroll: true,
        });
      } else {
        this.form.post(route('admin.role.store'), {
          preserveScroll: true,
        });
      }
    },

    addPermission() {
      this.form.permissions.push({
        name: '',
        isEdit: true,
      })
    },

    removePermission(index) {

      if (confirm('Are you sure want to delete permission?')) {
        const permission = this.form.permissions[index];

        const rolePermissionIndex = this.form.role_permissions.findIndex(obj => obj === permission.name)
        this.form.role_permissions.splice(rolePermissionIndex, 1);        
        
        this.form.permissions.splice(index, 1);
      }

    },

    reset() {
      this.form.value = _.mapValues(form.value, () => null);
    },

    search(url) {
      const { form, queryParams, processing } = useSearchFilter(url);
      this.form = form.value;
    },

    getItem(id) {
      return this.items.filter((item) => item.id === id)[0];
    },

    isExist(id) {
      return this.items.some((obj) => obj.id === id);
    },



    resetItems() {
      this.items = [];
    },

  },
});
