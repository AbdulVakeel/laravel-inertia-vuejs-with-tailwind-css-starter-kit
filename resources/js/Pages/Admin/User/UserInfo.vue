<script setup>
import { computed, ref } from 'vue';
import { Icon } from '@iconify/vue';
import Grid from '@/Components/GridWrapper/Grid.vue';
import SelectWalletInput from '@/Components/SelectWalletInput.vue';
const data = computed(() => usePage().props.data);
const { formatCurrencySymbol } = useCurrencyFormatter();
const user = computed(() => data.value.user);
const pageTitle = computed(() => data.value.pageTitle || 'Users Info');

const walletForm = useForm({
  user_id: user.value.id,
  amount: '',
  type: '',
  wallet: '',
});

const updateWallet = () => {
  walletForm.post(route('admin.update-wallet'), {
    preserveScroll: true,
    onSuccess: () => {
      walletForm.reset();
    },
  });
};

const cardDetails = [
    {
        key: 'earning_wallet',
        title: ('Withdraw Wallet Balance'),
        icon: 'mdi:wallet-outline',
    },
    {
        key: 'deposit_wallet',
        title: ('Deposit Wallet Balance'),
        icon: 'mdi:bank-outline',
    },
    
];
</script>

<template>
     <Head :title="__(pageTitle)"/>
    <AppContainer>
        <PageHeading>
			<template #title>{{ __(pageTitle) }}</template>
			
		</PageHeading>

        <Grid :columns="'grid-cols-1 md:grid-cols-3'" :gap="'gap-4'">
        

            <SectionCard v-for="(card, index) in cardDetails" :key="index">
                <div class="flex justify-between items-center px-5 py-3">
                    <div>
                        <h1>{{ card.key ? formatCurrencySymbol(data[card.key]) : data[card.key] }}</h1>
                        <h2>{{ card.title }}</h2>
                    </div>
                    <div>
                        <Icon :icon="card.icon" class="custom-icon-36" />
                    </div>
                </div>
            </SectionCard>
               
        </Grid>

        <SectionCard class="mb-5 p-3 bg-white dark:bg-gray-800 rounded-lg shadow-sm">
            <h2 class="text-xl font-semibold mb-6 text-dark dark:text-white">
                {{ ('Balance Credit Or Debit') }}
            </h2>

            <form @submit.prevent="updateWallet">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- User ID (Hidden) -->
                    <input type="hidden" v-model="walletForm.user_id" />

                    <!-- Amount -->
                    <div>
                        <TextInput
                            :label="('Amount')"
                            id="amount"
                            v-model="walletForm.amount"
                            type="number"
                            class="w-full px-2 py-2 rounded-lg focus:ring focus:ring-blue-300"
                            :placeholder="('Please Enter Amount')"
                            required
                        />
                    </div>

                    <!-- Wallet Type -->
                    <div>
                        <SelectWalletInput
                            :label="('Wallet Type')"
                            id="wallet"
                            v-model="walletForm.wallet"
                            class="w-full px-2 py-2 rounded-lg focus:ring focus:ring-blue-300"
                            required
                        >
                            <option value="earning_wallet">{{ ('Earning Wallet') }}</option>
                            <option value="deposit_wallet">{{ ('Deposit Wallet') }}</option>
                            <!-- <option value="bnb_wallet">{{ ('Reward Wallet') }}</option> -->
                        </SelectWalletInput>
                    </div>

                    <!-- Transaction Type -->
                    <div class="mt-2">
                        <SelectWalletInput
                            :label="('Transaction Type')"
                            id="type"
                            v-model="walletForm.type"
                            class="w-full px-2 py-2 rounded-lg focus:ring focus:ring-blue-300"
                            required
                        >
                            <option value="credit">{{ ('Credit Funds') }}</option>
                            <option value="debit">{{ ('Debit Funds') }}</option>
                        </SelectWalletInput>
                    </div>
                </div>

                <!-- Submit Button -->
               <Button
    type="submit"
    as="button" 
    :disabled="walletForm.processing"
    class="w-full sm:w-auto px-6 py-2 text-white bg-blue-600 hover:bg-blue-700 rounded-lg transition duration-300"
>
    {{ ('Update Wallet') }}
</Button>
            </form>
        </SectionCard>
    </AppContainer>
</template>

<script>
import Layout from '@/Layouts/AdminLayout.vue'
import { defineComponent } from 'vue'

export default defineComponent({
  layout: Layout,
})
</script>