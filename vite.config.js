import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import path from 'path';


export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
            ],
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
    ],
    css: {
        preprocessorOptions: {
            scss: {
                api: 'modern-compiler',
            },
        },
    },
    resolve: {
        alias: {
            vue: 'vue/dist/vue.esm-bundler.js',
            '@': path.resolve(__dirname, 'src'),
        },
    },
    server: {
        host: '0.0.0.0', // Required to be accessible from outside container
        port: 5173,
        strictPort: true,
        watch: {
            usePolling: true, // Important for file change detection inside Docker
        },
        hmr: {
            host: 'localhost', // or your local IP (e.g., 192.168.x.x)
            port: 5173,
        },
    }
});
