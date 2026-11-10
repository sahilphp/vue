import { resolve } from 'path'
import { fileURLToPath, URL } from 'node:url'
import Vue from '@vitejs/plugin-vue'
import { defineConfig } from 'vite'

export default defineConfig({
  plugins: [Vue()],
  resolve: {
    alias: {
      '@': fileURLToPath(new URL('./src', import.meta.url)),
    },
  },
  build: {
    outDir: 'public/build',
    emptyOutDir: true,
    manifest: true,
    sourcemap: false,
    target: 'es2022',
    assetsDir: 'assets',
    rollupOptions: {
      input: fileURLToPath(new URL('./src/main.ts', import.meta.url)),
    },
  },
  server: {
    host: '127.0.0.1',
    port: 5173,
    strictPort: true,
  },
})