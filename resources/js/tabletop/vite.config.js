import { defineConfig } from 'vite';
import path from 'path';

export default defineConfig({
    root: '.', // raiz do projeto é resources/js/tabletop/
    base: './', // caminhos relativos para o build
    build: {
        outDir: path.resolve(__dirname, '../../../public/tabletop'), // output final
        emptyOutDir: true, // limpa a pasta antes do build
        rollupOptions: {
            input: path.resolve(__dirname, 'index.html'), // ponto de entrada
            output: {
                entryFileNames: 'src/main.js', // nome final do bundle
                assetFileNames: 'assets/[name].[ext]',
            },
        },
    },
});
