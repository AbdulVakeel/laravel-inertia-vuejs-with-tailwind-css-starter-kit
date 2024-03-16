

<script setup>
/*=========================================================================================
  File Name: login
  
  ----------------------------------------------------------------------------------------
  Author: Sky Code Lab
  Author URL: https://www.skycodelab.io/
==========================================================================================*/

import ThemeModeToggler from './Partials/ThemeModeToggler.vue';


defineProps({
    canResetPassword: Boolean,
    status: String,
});

const flash = computed(() => usePage().props.flash);

const app = computed(() => usePage().props.app);


const form = useForm({
    identity: '',
    password: '',
    remember: false,

});



/* End */

const submit = () => {
    form
        .transform((data) => ({
            ...data,
            remember: form.remember ? 'on' : '',
        }))
        .post(route('login'), {
            onFinish: () => form.reset('password'),
            onSuccess: () => {
            },
        });
};
const showPasswordText = ref(false);


</script>

<template>
    <Head :title="__('Log in')" />

    <AuthenticationCard>

     
            <div class="flex flex-col items-center justify-center px-6 py-4 mx-auto md:h-screen lg:py-0">
                <div
                    class="relative w-full  rounded-lg shadow  md:mt-0 sm:max-w-md xl:p-0 ">

                    <div class="flex items-center justify-center ">

                        <div class="flex items-start p-2 ">
                            <ApplicationLogo class='w-56 p-2  ' />
                        </div>
                        <div class="absolute right-1 flex items-end p-2">
                            <ThemeModeToggler class='' />
                        </div>
                    </div>

                    

                    <div class="p-4 space-y-4 md:space-y-4">

                        <div v-if="status" class="mb-4 font-medium text-sm text-success">
                            {{ status }}
                        </div>

                        <div>
                            <ValidationErrors />
                        </div>


                        <form class="space-y-2 md:space-y-4" @submit.prevent="submit">

                            <Input id="email" v-model="form.identity" type="text"
                                class=" sm:text-sm rounded-lg  block w-full  dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400  "
                                :error="form.errors.identity" :placeholder="__('Please Enter Email or Username')" required />

                            <div class="relative">
                              
                                <Input id="password" v-model="form.password" :placeholder="__('Please Enter Password')"
                                    :type="showPasswordText ? 'text' : 'password'" :error="form.errors.g_recaptcha_response"
                                    class=" sm:text-sm rounded-lg  block w-full  dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400  "
                                    required autocomplete="current-password"  />
                                <span class="absolute right-3 bottom-4 cursor-pointer"
                                    @click="showPasswordText = !showPasswordText">
                                    <Icon name="eye" class="h-5" />
                                </span>
                            </div>

                            <div class="flex items-center justify-between">
                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                    </div>
                                    <div class="ml-3 text-sm">
                                        <label class="flex items-center">
                                            <Checkbox v-model:checked="form.remember" name="remember" />
                                            <span class="ml-2 text-gray-500 dark:text-gray-300">{{ __('Remember me') }}</span>
                                        </label>
                                    </div>
                                </div>
                              

                            </div>
                          
                            <Button
				as="button"
				class="text-sm py-2 block w-full"
				shadow="primary"
				:disabled="form.processing"
				:processing="form.processing"
				>
				{{ __('Sign In') }}
			</Button>
                            
                            <p class="text-sm  text-center">
                                Don’t have an account yet?

                                <Link :href="route('register')"
                                    class="font-medium ">
                                {{ __('Sign Up') }}
                                </Link>

                            </p>
                        </form>

                       
                    </div>
                </div>
            </div>


    </AuthenticationCard>
</template>

<script>
import Layout from '@/Layouts/EmptyLayout.vue';

export default defineComponent({

    layout: Layout,



});
</script>
