<script setup>
/*=========================================================================================
  File Name: login
  ----------------------------------------------------------------------------------------
  Author: Abdul Vakeel
  Author URL: https://www.skycodelab.in/
==========================================================================================*/

import { ref } from 'vue';
import { useForm } from '@inertiajs/vue3';
import ThemeModeToggler from './Partials/ThemeModeToggler.vue';

defineProps({
    canResetPassword: Boolean,
    status: String,
});


const form = useForm({
    identity: '',
    password: '',
    remember: false,
});

// Demo credentials fillers
const setAdminCredentials = () => {
    form.identity = 'admin@test.com'
    form.password = '123456'
}

const setUserCredentials = () => {
    form.identity = 'user@test.com'
    form.password = '123456'
}
/* End */

const submit = () => {
    form
        .transform((data) => ({
            ...data,
            remember: form.remember ? 'on' : '',
        }))
        .post(route('login'), {
            onFinish: () => form.reset('password'),
            onSuccess: () => {},
        });
};

const showPasswordText = ref(false);
</script>

<template>
    <Head :title="__('Log in')" />

    <AuthenticationCard>

        <section class="min-h-screen flex items-center justify-center p-4">

            <div class="w-full max-w-md bg-white dark:bg-gray-800 rounded-lg shadow-lg border border-violet-200/20">

                <!-- Header -->
                <div class="flex items-center justify-center p-6">
                    <ApplicationLogo class="h-8 w-auto" />
                    <ThemeModeToggler class="ml-4" />
                </div>

                <div class="p-4 space-y-4 md:space-y-4">

                    <div v-if="status" class="mb-4 font-medium text-sm text-success">
                        {{ status }}
                    </div>

                    <ValidationErrors />

                    <form class="space-y-2 md:space-y-4" @submit.prevent="submit">

                        <!-- Email -->
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            {{ __('Email') }}
                        </label>

                        <Input
                            id="email"
                            v-model="form.identity"
                            type="text"
                            class="bg-gray-50 border mt-2 border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full dark:bg-gray-800 dark:border-gray-600 dark:text-white"
                            :error="form.errors.identity"
                            :placeholder="__('Please Enter Email')"
                            required
                        />

                        <!-- Password -->
                        <div class="relative">

                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                {{ __('Password') }}
                            </label>

                            <Input
                                id="password"
                                v-model="form.password"
                                :type="showPasswordText ? 'text' : 'password'"
                                class="bg-gray-50 border mt-2 border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full dark:bg-gray-800 dark:border-gray-600 dark:text-white"
                                :error="form.errors.g_recaptcha_response"
                                :placeholder="__('Please Enter Password')"
                                required
                                autocomplete="current-password"
                            />

                            <span
                                class="absolute right-3 bottom-4 cursor-pointer"
                                @click="showPasswordText = !showPasswordText"
                            >
                                <Icon name="eye" class="h-5" />
                            </span>

                        </div>

                        <!-- Remember -->
                        <div class="flex items-center justify-between">

                            <label class="flex items-center">
                                <Checkbox v-model:checked="form.remember" name="remember" />
                                <span class="ml-2 text-gray-500 dark:text-gray-300">
                                    {{ __('Remember me') }}
                                </span>
                            </label>

                        </div>

                        <!-- Button -->
                        <Button
                            as="button"
                            class="text-sm py-2 block w-full"
                            shadow="primary"
                            :disabled="form.processing"
                            :processing="form.processing"
                        >
                            {{ __('Sign In') }}
                        </Button>

                        <!-- Signup -->
                        <p class="text-sm text-center text-gray-600 dark:text-gray-400">
                            {{ ('Don’t have an account yet?') }}
                            <Link
                                :href="route('register')"
                                class="text-indigo-600 hover:text-indigo-500 dark:text-indigo-400 dark:hover:text-indigo-300"
                            >
                                {{ ('Sign Up') }}
                            </Link>
                        </p>

                    </form>

                    <!-- Divider -->
                    <div class="relative my-6">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-300 dark:border-gray-600"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-2 bg-white dark:bg-gray-800 text-gray-500 dark:text-gray-400">
                                Quick Login
                            </span>
                        </div>
                    </div>

                    <!-- Demo Buttons -->
                    <div class="grid grid-cols-2 gap-3">
                        <button
                            type="button"
                            @click="setAdminCredentials"
                            class="py-2 px-4 rounded-lg border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 font-medium hover:bg-gray-50 dark:hover:bg-gray-700 transition-all duration-300 hover:scale-[1.02]"
                        >
                            👑 Admin Login
                        </button>
                        <button
                            type="button"
                            @click="setUserCredentials"
                            class="py-2 px-4 rounded-lg border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 font-medium hover:bg-gray-50 dark:hover:bg-gray-700 transition-all duration-300 hover:scale-[1.02]"
                        >
                            👤 User Login
                        </button>
                    </div>

                    <!-- Demo Credentials Hint -->
                    <div class="mt-4 p-3 rounded-lg bg-gray-50 dark:bg-gray-700/50 border border-gray-200 dark:border-gray-600">
                        <p class="text-xs text-center text-gray-500 dark:text-gray-400">
                            <span class="font-semibold">Demo Credentials:</span><br>
                            Admin: admin@test.com / 123456<br>
                            User: user@test.com / 123456
                        </p>
                    </div>
                </div>
            </div>

        </section>

    </AuthenticationCard>
</template>

<script>
import Layout from '@/Layouts/EmptyLayout.vue';
import { defineComponent } from 'vue';

export default defineComponent({
    layout: Layout,
});
</script>