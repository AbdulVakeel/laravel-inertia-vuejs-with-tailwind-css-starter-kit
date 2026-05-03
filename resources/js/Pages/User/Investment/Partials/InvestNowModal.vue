<script setup>
import { computed, ref, watch } from 'vue';
import { usePage, useForm } from '@inertiajs/vue3';
import useCurrencyFormatter from '@/Composables/useCurrencyFormatter.js';
import VueMultiselect from 'vue-multiselect';

// Props - ab investment hai, plan nahi
const props = defineProps({
    investment: {
        type: Object,
        default: () => ({})
    },
    show: {
        type: Boolean,
        default: false
    },
    maxWidth: {
        type: String,
        default: '2xl'
    },
    closeable: {
        type: Boolean,
        default: true
    }
});

const emit = defineEmits(['close']);
const { formatCurrency, formatCurrencySymbol } = useCurrencyFormatter();
const page = usePage();

const user = computed(() => page.props.user);
const app = computed(() => page.props.app);

const selectedCurrency = ref(null);

const gatewayCurrencies = computed(() => [
    { id: 'deposit_wallet', name: __('Deposit Wallet') + ' - ' + formatCurrencySymbol(user.value?.deposit_wallet || 0) },
    { id: 'earning_wallet', name: __('Income Wallet') + ' - ' + formatCurrencySymbol(user.value?.earning_wallet || 0) }
]);

const form = useForm({
    amount: props.investment?.amount || 0,
    wallet_type: '',
    investment_id: props.investment?.id || null
});

watch(() => props.investment, (newInvestment) => {
    if (newInvestment && newInvestment.id) {
        form.investment_id = newInvestment.id;
        form.amount = newInvestment.amount || 0;
    }
}, { immediate: true, deep: true });

const debugForm = () => {
    console.log('Investment ID:', form.investment_id);
    console.log('Amount:', form.amount);
    console.log('Investment:', props.investment);
};

const submit = () => {
    debugForm();
    
    if (!selectedCurrency.value) {
        form.errors.wallet_type = __('Please select a wallet');
        return;
    }
    
    if (!form.investment_id) {
        form.errors.investment_id = __('Investment plan not selected');
        console.error('Investment ID is missing!', props.investment);
        return;
    }
    
    form.wallet_type = selectedCurrency.value.id;
    
    form.post(route('invest.investment.store'), {
        preserveState: true,
        onSuccess: () => {
            emit('close');
            form.reset();
            selectedCurrency.value = null;
        },
        onError: (errors) => {
            console.error('Investment failed:', errors);
        }
    });
};

const closeModal = () => {
    if (!form.processing && props.closeable) {
        emit('close');
        form.reset();
        selectedCurrency.value = null;
    }
};
</script>

<template>
    <Modal 
        :show="show" 
        :max-width="maxWidth" 
        :closeable="!form.processing && closeable" 
        @close="closeModal"
    >
        <SectionCard class="rounded-none dark:rounded-none">
            <ValidationErrors class="py-5" />

            <div 
                class="flex items-center justify-end w-full px-3 pt-3 cursor-pointer"
                @click="closeModal"
            >
                <Icon name="close" class="h-7" />
            </div>

            <div class="px-14 pb-7">
                <h1 class="text-dark mb-5 text-xl font-bold text-center">
                    {{ __('Confirm Investment') }} - {{ investment?.name || 'Investment' }}
                </h1>

                <!-- Wallet Selection -->
                <div class="mt-4">
                    <Label>{{ __('Select Wallet') }}</Label>
                    <VueMultiselect
                        :searchable="true"
                        v-model="selectedCurrency"
                        :placeholder="__('Select wallet')"
                        :options="gatewayCurrencies"
                        track-by="id"
                        label="name"
                    />
                    <InputError :message="form.errors.wallet_type" />
                </div>

                <!-- Amount Display -->
                <div class="mt-4">
                    <Label>{{ __('Investment Amount') }}</Label>
                    <div class="text-2xl font-bold text-green-600 mt-1">
                        {{ formatCurrency(form.amount) }}
                    </div>
                </div>

                <!-- Submit Button -->
                <Button
                    :processing="form.processing"
                    :disabled="form.processing || !selectedCurrency"
                    intent="primary"
                    as="button"
                    class="mt-5 w-full"
                    @click="submit"
                >
                    {{ __('Submit') }}
                </Button>
            </div>
        </SectionCard>
    </Modal>
</template>

<style src="vue-multiselect/dist/vue-multiselect.css"></style>