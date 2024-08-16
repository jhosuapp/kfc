import { resolve } from 'path';
import { defineConfig } from 'vite';

export default defineConfig({
  root: 'sources',
  build: {
    lib: {
      entry: resolve(__dirname, 'sources/js/app.js'),
      name: 'Mainscript',
      fileName: 'js/mainscript'
    },
    rollupOptions: {
      output: {
        assetFileNames: "css/main.css",
      },
    },
    sourcemap: true,
    devtool: 'source-map',
    watch: true,
    target: "es2015",
    outDir: '../public_html/wp-content/themes/kfckanding',
    emptyOutDir: false,
  },
});