import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

import AutoImport from 'unplugin-auto-import/vite'
import Components from 'unplugin-vue-components/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: 'resources/js/app.js',
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
        Components({
            dirs: [
                './resources/js/Components/**',
            ],
            imports: [
                {
                    '@inertiajs/vue3': ['Head', 'Link',],
                },
            ],

            dts: true,
        }),
        AutoImport({
            defaultExportByFilename: true,
            dts: true,

            include: [
                /\.vue$/, /\.vue\?vue/, 
            ],
            imports: [
                'vue',
                {
                    '@inertiajs/vue3': ['usePage', 'router', 'useForm',],
                    '@vueuse/core': [
						'useStorage', 
					],
                },
            ],
            dirs: [
                './resources/js/Composables/**',
                './resources/js/Stores/**',
            ],

        }),
    ],
});
