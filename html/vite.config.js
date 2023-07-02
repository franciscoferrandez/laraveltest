import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    server: {
        host: '0.0.0.0',
        port: 5173,
        hmr: {
            host: 'localhost'
        },
        watch: {
            usePolling: true
        }
    },
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
        // viteStaticCopy({ // <-- Add this code block
        //     targets: [
        //         { //For build
        //             src: 'node_modules/bootstrap-icons/font/fonts/*',
        //             dest: 'assets/fonts'
        //         },
        //         { // For Dev
        //             src: 'node_modules/bootstrap-icons/font/fonts/*',
        //             dest: 'resources/sass/fonts'
        //         }
        //     ]
        // }),
    ],
});
