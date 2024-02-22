// vite.config.js
import { defineConfig } from 'vite';
import usePHP from 'vite-plugin-php';

export default defineConfig({
    // Configuration options
    // For example:
    plugins: [usePHP({
        binary: 'localhost:8000',
        entry: [
            'index.php',
            'about.php',
            'contact.php',
            'pages/**/*.php',
        ],
    })],
    server: {
        port: 3000,
    },
    build: {
        outDir: 'dist',
    },
    // Add more configurations as needed
});
