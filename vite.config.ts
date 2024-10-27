import { defineConfig } from 'vite'
import path from 'path'
import react from '@vitejs/plugin-react'
import viteImagemin from 'vite-plugin-imagemin'

// https://vite.dev/config/
export default defineConfig({
  base: '/telesznicole.github.io/',
  plugins: [react(), viteImagemin()],
  resolve: {
    alias: {
      '@': path.resolve(__dirname, './src')
    }
  },
  css: {
    preprocessorOptions: {
      scss: {
        api: 'modern-compiler',
        additionalData: '@use "@/styles/global.scss" as *;'
      }
    }
  }
})
