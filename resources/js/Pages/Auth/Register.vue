<script setup>

import useModal from '@/Composables/useModal.js';
import ThemeModeToggler from './Partials/ThemeModeToggler.vue';
import VueMultiselect from 'vue-multiselect';


const countries = computed(() => usePage().props.countries);
const referUser = computed(() => usePage().props.referUser);

const selectedCountry = ref();

const form = useForm({
    username: '',
    first_name: '',
    last_name: '',
    email: '',
    password: '',
    password_confirmation: '',
    country: '',
    mobile: '',
});



const submit = () => {
    form.country = selectedCountry.value?.country;

    form.post(route('register.store'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};


const showPasswordText = ref(false);
const showPasswordTextconfirmation = ref(false);
/*=========================================================================================
  File Name: register
  
  ----------------------------------------------------------------------------------------
  Author: Sky Code Lab
  Author URL: https://www.skycodelab.io/
==========================================================================================*/


</script>

<template>

    <AuthenticationCard>


            <div class="flex flex-col items-center justify-center px-3 pb-3 mt-1 mx-auto md:h-screen lg:py-0">
                <div class="relative w-full  shadow  md:mt-0 sm:max-w-lg xl:p-0 ">

                    <div class="flex items-center justify-center ">

                        <div class="flex items-start mt-5">
                            <ApplicationLogo class=' w-56 p-2' />
                        </div>
                    </div>

                    <div class="absolute right-1 flex items-end p-2">
                        <ThemeModeToggler class='' />
                    </div>


                    <div class="py-3">
                        <ValidationErrors />
                    </div>

                    <form @submit.prevent="submit" class="px-1 py-2 ">

                       

                        <div class="grid grid-cols-2 md:grid-cols-2 gap-5 mt-4">
                            <Input id="first_name" v-model="form.first_name" type="text"
                                class="  sm:text-sm rounded-lg  block w-full  dark:bg-gray-800  "
                                :error="form.errors.first_name" required autofocus autocomplete="first_name"
                                placeholder="First Name" />
                            <Input id="last_name" v-model="form.last_name" :error="form.errors.last_name" type="text"
                                class="  sm:text-sm rounded-lg  block w-full  dark:bg-gray-800  "
                                required autocomplete="last_name" placeholder="Last Name" />
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mt-4">
                            <Input id="username" v-model="form.username" type="text"
                                class="  sm:text-sm rounded-lg  block w-full  dark:bg-gray-800  "
                                :error="form.errors.username" required autocomplete="off" placeholder="Username" />

                            <Input id="email" v-model="form.email" :error="form.errors.email" type="email"
                                class="  sm:text-sm rounded-lg  block w-full  dark:bg-gray-800  "
                                autocomplete="off" required placeholder="Email" />
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-0 md:gap-2 mt-2">

                            <div class="mt-2">
                                <VueMultiselect v-model="selectedCountry" :options="countries" :searchable="true"
                                    label="country" track-by="country" placeholder="Select Country">
                                </VueMultiselect>
                            </div>


                            <div class="mt-2">
                                <div class="flex items-center w-full">
                                   
                                    <TextInput type="number" wrapper-class="flex-1" id="mobile" v-model="form.mobile"
                                        class="w-full rounded-none dark:rounded-none rounded-r-lg dark:rounded-r-lg"
                                        placeholder="Mobile No." />
                                </div>
                                <InputError class="mt-2" :message="form.errors.mobile" />
                            </div>


                        </div>

                        <div class="grid grid-cols-2 md:grid-cols-2 gap-5 mt-4 md:mt-2">
                            <div class="relative">
                                <Input id="password" v-model="form.password" :type="showPasswordText ? 'text' : 'password'"
                                    class="  sm:text-sm rounded-lg  block w-full  dark:bg-gray-800 "
                                    required autocomplete="new-password" placeholder="Password"
                                    :help="__('Use 8 or more characters with a mix of letters, numbers & symbols.')"
                                    :error="form.errors.password" />
                                <span class="absolute right-3 bottom-[14px] cursor-pointer"
                                    @click="showPasswordText = !showPasswordText">
                                    <Icon name="eye" class="h-3 md:h-5" />
                                </span>
                            </div>
                            <div class="relative">
                                <Input id="password_confirmation" v-model="form.password_confirmation"
                                    :type="showPasswordTextconfirmation ? 'text' : 'password'"
                                    class="  sm:text-sm rounded-lg  block w-full  dark:bg-gray-800  "
                                    required autocomplete="new-password" placeholder="Repeat Password"
                                    :error="form.errors.password_confirmation" />
                                <span class="absolute right-3 bottom-[14px] cursor-pointer"
                                    @click="showPasswordTextconfirmation = !showPasswordTextconfirmation">
                                    <Icon name="eye" class="h-3 md:h-5" />
                                </span>
                            </div>
                        </div>
                     
                        

                        <div class="flex flex-col flex-wrap items-center justify-between mt-4 mb-7">
                         
                            <Button
				as="button"
				class="text-sm py-2 block w-full"
				shadow="primary"
				:disabled="form.processing"
				:processing="form.processing"
				>
				{{ __('Sign Up') }}
			</Button>
                            
                         
                            <p class="text-sm f pt-4 text-center ">
                                Already Have An Account

                                <Link :href="route('login')"
                                    class="font-medium ">
                                {{ __('Login Here') }}
                                </Link>

                            </p>


                        </div>
                    </form>

                </div>
            </div>

       
    </AuthenticationCard>
</template>

<script>
import Layout from '@/Layouts/EmptyLayout.vue';
import { defineComponent } from 'vue';

export default defineComponent({
    layout: Layout,
});
</script>
