import { defineConfig } from 'vite';
import tailwindcss from '@tailwindcss/vite';
import fs from 'node:fs';
import path from 'node:path';

const hotFile = 'public/build/hot';

export default defineConfig({
    publicDir: false,
    plugins: [
        tailwindcss(),
        {
            name: 'laravel-hot-file',
            configureServer(server) {
                const ensureDir = (dir) => {
                    if (!fs.existsSync(dir)) fs.mkdirSync(dir, { recursive: true });
                };

                server.httpServer?.once('listening', () => {
                    const address = server.httpServer.address();
                    const port = typeof address === 'object' ? address.port : 5173;
                    ensureDir(path.dirname(hotFile));
                    fs.writeFileSync(hotFile, `http://localhost:${port}`);
                });

                server.httpServer?.once('close', () => {
                    if (fs.existsSync(hotFile)) fs.unlinkSync(hotFile);
                });
            },
        },
    ],
    build: {
        manifest: 'manifest.json',
        outDir: 'public/build',
        rollupOptions: {
            input: [
                'resources/js/app.js',
                'resources/css/frontend.css',
            ],
        },
    },
    server: {
        host: true,
        port: 5173,
    },
});
