import { ref, watch } from 'vue';
import { router } from '@inertiajs/vue3';

export default function useSearchFilter(searchUrl, additionalFilters = {}) {

  const processing = ref(false);
  const queryFilterParams = ref('');
  const uri = location.search.substring(1);
  const queryParams = new URLSearchParams(uri);
  queryFilterParams.value = queryParams.get('filter[global]');
  
  const form = ref({
    filter: { global: queryFilterParams.value ?? '' },
    ...additionalFilters,
  });

  watch(
    () => form.value,
    (newValue, oldValue) => {
      processing.value = true;

      if (typeof window.LIT !== 'undefined') {
        clearTimeout(window.LIT);
      }

      window.LIT = setTimeout(() => {
        router.get(searchUrl, _.pickBy(form.value), {
          preserveState: true,
          preserveScroll: true,
          replace: true,
          onFinish: (() => processing.value = false),
        });
      }, 700);
    },
    {
      deep: true,
      // immediate: true
    }
  );

  const onSort = (col) => {
    // console.log(col);     // return; 

    if (!col?.sortable) return;

    form.value.sort = form.value.sort !== col.key ? col.key : `-${col.key}`;
  };

  const reset = () => {
    // form.value = _.mapValues(form.value, () => null);
    // form.value.filter = { global: '' };
    form.value = {
      filter: { global:  '' },
      ...additionalFilters,
    }
  };



  const dateRange = ref('');

  watch(
    () => dateRange.value,
    (newValue, oldValue) => {
      if (dateRange.value && dateRange.value.length) {
        form.value.start_date = dateRange.value[0] ?? null;
        form.value.end_date = dateRange.value[1] ?? null;
      } else {
        form.value.start_date = form.value.end_date = null;
      }
    }
  );


  return {
    form,
    queryParams,
    reset,
    onSort,
    processing,
    dateRange,
  };
}
