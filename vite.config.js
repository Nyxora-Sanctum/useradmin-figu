import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import tailwindcss from "@tailwindcss/vite";

export default defineConfig({
    plugins: [
        tailwindcss(),
        laravel({
            input: [
                //css
                "resources/scss/icons.scss",
                "resources/scss/style.scss",
                "node_modules/quill/dist/quill.snow.css",
                "node_modules/quill/dist/quill.bubble.css",
                "node_modules/flatpickr/dist/flatpickr.min.css",
                "node_modules/flatpickr/dist/themes/dark.css",
                "node_modules/gridjs/dist/theme/mermaid.css",
                "node_modules/flatpickr/dist/themes/dark.css",
                "node_modules/gridjs/dist/theme/mermaid.min.css",

                //js
                "resources/js/app.js",
                "resources/js/config.js",
                "resources/js/pages/dashboard.js",
                "resources/js/user-pages/shop.js",
                "resources/js/pages/chart.js",
                "resources/js/pages/form-quilljs.js",
                "resources/js/pages/form-fileupload.js",
                "resources/js/pages/form-flatepicker.js",
                "resources/js/pages/table-gridjs.js",
                "resources/js/pages/maps-google.js",
                "resources/js/pages/maps-vector.js",
                "resources/js/pages/maps-spain.js",
                "resources/js/pages/maps-russia.js",
                "resources/js/pages/maps-iraq.js",
                "resources/js/pages/maps-canada.js",
            ],
            refresh: true,
        }),
    ],
    server: {
        sourcemap: false, // Matikan source map agar tidak mencari file .map yang hilang
    },
});
