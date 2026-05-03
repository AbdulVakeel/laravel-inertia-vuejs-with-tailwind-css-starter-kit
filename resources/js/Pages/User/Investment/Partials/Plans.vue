<script setup>
import { computed, ref } from 'vue';
import { usePage } from '@inertiajs/vue3';
import InvestNowModal from './InvestNowModal.vue';
import useCurrencyFormatter from '@/Composables/useCurrencyFormatter.js';

const { formatCurrency } = useCurrencyFormatter();
const page = usePage();

const investments = computed(() => page.props.data?.investments || []);

const showModal = ref(false);
const selectedInvestment = ref(null);

const handleInvestNow = (investment) => {
    console.log('Selected investment:', investment);
    selectedInvestment.value = investment;
    showModal.value = true;
};

const handleCloseModal = () => {
    showModal.value = false;
    selectedInvestment.value = null;
};
</script>

<template>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <SectionCard v-for="investment in investments" :key="investment.id">
            <div class="p-6">
                <h3 class="text-xl font-semibold text-center text-gray-800 dark:text-white mb-4">
                    {{ investment.name }}
                </h3>

                <div class="text-center mb-6">
                    <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('Investment Amount') }}</p>
                    <p class="text-2xl font-bold text-green-600 dark:text-green-400">
                        {{ formatCurrency(investment.amount) }}
                    </p>
                </div>

                <Button 
                    @click="handleInvestNow(investment)"
                    class="w-full"
                    intent="primary"
                >
                    {{ __('Invest Now') }}
                </Button>
            </div>
        </SectionCard>

        <div v-if="investments.length === 0" class="col-span-full text-center py-12">
            <p class="text-gray-500">{{ __('No investment plans available.') }}</p>
        </div>

        <InvestNowModal 
            v-if="selectedInvestment"
            :investment="selectedInvestment"
            :show="showModal"
            @close="handleCloseModal"
        />
    </div>
</template>