import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
    server: {
        https: false,     // ← これを追加
        host: 'localhost',
        port: 5173        // デフォルトポート (任意、指定しなくてもOK)
    },
});
