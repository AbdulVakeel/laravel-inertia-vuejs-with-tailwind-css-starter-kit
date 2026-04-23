<script setup>
import { ref, computed } from 'vue';
import { useForm, usePage } from '@inertiajs/vue3';

import useModal from '@/Composables/useModal.js';
import ThemeModeToggler from './Partials/ThemeModeToggler.vue';
import VueMultiselect from 'vue-multiselect';

/*=========================================================================================
  File Name: register
  ----------------------------------------------------------------------------------------
  Author: Abdul Vakeel
  Author URL: https://www.skycodelab.in/
==========================================================================================*/

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
</script>

<template>
    <AuthenticationCard>

        <section class="min-h-screen flex items-center justify-center p-4">

            <div class="w-full max-w-md bg-white dark:bg-gray-800 rounded-lg shadow-lg border border-violet-200/20 p-2">

                <!-- Header -->
                <div class="flex items-center justify-center p-6">
                    <ApplicationLogo class="h-8 w-auto" />
                    <ThemeModeToggler class="ml-4" />
                </div>

                <div class="py-2">
                    <ValidationErrors />
                </div>

                <form @submit.prevent="submit" class="px-1 py-2">

                    <!-- First / Last Name -->
                    <div class="grid grid-cols-2 gap-5 mt-4">

                        <Input
                            id="first_name"
                            v-model="form.first_name"
                            type="text"
                            class="sm:text-sm rounded-lg block w-full dark:bg-gray-800"
                            :error="form.errors.first_name"
                            placeholder="First Name"
                            required
                            autofocus
                        />

                        <Input
                            id="last_name"
                            v-model="form.last_name"
                            type="text"
                            class="sm:text-sm rounded-lg block w-full dark:bg-gray-800"
                            :error="form.errors.last_name"
                            placeholder="Last Name"
                            required
                        />

                    </div>

                    <!-- Username / Email -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mt-4">

                        <Input
                            id="username"
                            v-model="form.username"
                            type="text"
                            class="sm:text-sm rounded-lg block w-full dark:bg-gray-800"
                            :error="form.errors.username"
                            placeholder="Username"
                            required
                            autocomplete="off"
                        />

                        <Input
                            id="email"
                            v-model="form.email"
                            type="email"
                            class="sm:text-sm rounded-lg block w-full dark:bg-gray-800"
                            :error="form.errors.email"
                            placeholder="Email"
                            required
                            autocomplete="off"
                        />

                    </div>

                    <!-- Country + Mobile -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-2 mt-2">

                        <div class="mt-2">
                            <VueMultiselect
                                v-model="selectedCountry"
                                :options="countries"
                                :searchable="true"
                                label="country"
                                track-by="country"
                                placeholder="Select Country"
                            />
                        </div>

                        <div class="mt-2">

                            <TextInput
                                type="number"
                                id="mobile"
                                v-model="form.mobile"
                                class="w-full"
                                placeholder="Mobile No."
                            />

                            <InputError class="mt-2" :message="form.errors.mobile" />

                        </div>

                    </div>

                    <!-- Password -->
                    <div class="grid grid-cols-2 gap-5 mt-4">

                        <div class="relative">

                            <Input
                                id="password"
                                v-model="form.password"
                                :type="showPasswordText ? 'text' : 'password'"
                                class="sm:text-sm rounded-lg block w-full dark:bg-gray-800"
                                placeholder="Password"
                                required
                                autocomplete="new-password"
                                :error="form.errors.password"
                            />

                            <span
                                class="absolute right-3 bottom-[14px] cursor-pointer"
                                @click="showPasswordText = !showPasswordText"
                            >
                                <Icon name="eye" class="h-3 md:h-5" />
                            </span>

                        </div>

                        <div class="relative">

                            <Input
                                id="password_confirmation"
                                v-model="form.password_confirmation"
                                :type="showPasswordTextconfirmation ? 'text' : 'password'"
                                class="sm:text-sm rounded-lg block w-full dark:bg-gray-800"
                                placeholder="Repeat Password"
                                required
                                autocomplete="new-password"
                                :error="form.errors.password_confirmation"
                            />

                            <span
                                class="absolute right-3 bottom-[14px] cursor-pointer"
                                @click="showPasswordTextconfirmation = !showPasswordTextconfirmation"
                            >
                                <Icon name="eye" class="h-3 md:h-5" />
                            </span>

                        </div>

                    </div>

                    <!-- Submit -->
                    <div class="flex flex-col items-center mt-6 mb-7">

                        <Button
                            as="button"
                            class="w-full text-sm py-2"
                            shadow="primary"
                            :disabled="form.processing"
                            :processing="form.processing"
                        >
                            {{ __('Sign Up') }}
                        </Button>

                        <p class="text-sm text-center text-gray-600 pt-4 dark:text-gray-400">
                            {{ ('Already Have An Account') }}
                            <Link
                                :href="route('login')"
                                class="text-indigo-600 hover:text-indigo-500 dark:text-indigo-400 dark:hover:text-indigo-300"
                            >
                                {{ ('Login Here') }}
                            </Link>
                        </p>

                    </div>

                </form>

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