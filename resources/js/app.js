import './bootstrap';
import '../scss/app.scss';
import '../../node_modules/vue-multiselect/dist/vue-multiselect.css'


import { createApp, h, computed } from 'vue';
import { Head, Link, createInertiaApp, usePage } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';
import { createPinia } from 'pinia';

import moment from 'moment';
import VWave from 'v-wave'


/* For translation / localization */
import translations from '@/Composables/useTranslations.js';
/* ============ */



// app components
import AppLayout from '@/Layouts/AppLayout.vue';
/* ============ */




createInertiaApp({
    resolve: (name) => {
        const page = resolvePageComponent(
            `./Pages/${name}.vue`,
            import.meta.glob("./Pages/**/*.vue")
        );
        page.then((module) => {
            module.default.layout = module.default.layout != false ? module.default.layout || AppLayout : '';
        });
        return page;
    },
    setup({ el, App, props, plugin }) {



        const app = createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue, Ziggy)
            .use(createPinia())
            .use(VWave, {
                initialOpacity: 0.4,
                easing: 'ease-in',
                duration: 0.4,
            })


        app.component('Head', Head);
        app.component('Link', Link);

        app.config.globalProperties.$route = window.route = route;
        app.config.globalProperties.moment = window.moment = moment;
        app.config.globalProperties.ago = (val) => val ? moment(val).fromNow() : '';

        app.config.globalProperties.formatNumber = window.formatNumber = (val, precision = 2) => val ? parseFloat(val).toFixed(precision) : '';

        app.config.globalProperties.randomKey = window.randomKey = (val = null) => val ?? Date.now().toString() + Math.random();

        app.config.globalProperties.__ = window.__ = (key, replacements = {}) => translations(key, replacements = {});

        app.mount(el);
        return app;
    },
    progress: {
        color: '#009ef7',
        showSpinner: true,
    },
});
