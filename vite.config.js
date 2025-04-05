import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import tailwindcss from "@tailwindcss/vite";
import commonjs from "vite-plugin-commonjs";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                // CSS
                "resources/scss/icons.scss",
                "resources/scss/style.scss",
                "node_modules/quill/dist/quill.snow.css",
                "node_modules/quill/dist/quill.bubble.css",
                "node_modules/flatpickr/dist/flatpickr.min.css",
                "node_modules/flatpickr/dist/themes/dark.css",
                "node_modules/gridjs/dist/theme/mermaid.css",
                "node_modules/gridjs/dist/theme/mermaid.min.css",
                "resources/user/css/plugins/bootstrap.min.css",
                "resources/user/css/plugins/swiper.bundle.css",
                "resources/user/css/plugins/mobile.css",
                "resources/user/css/plugins/magnific-popup.css",
                "resources/user/css/plugins/slick-slider.css",
                "resources/user/css/plugins/owlcarousel.min.css",
                "resources/user/css/plugins/aos.css",
                "resources/user/css/typography.css",
                "resources/user/css/master.css",
                "resources/user/css/plugins/fontawesome.css",

                // JavaScriptt
                "resources/js/admin-pages/manageuser.js",
                "resources/js/admin-pages/config.js",
                "resources/js/admin-pages/invoices.js",
                "resources/js/admin-pages/managetemplate.js",
                "resources/js/admin-pages/manageuser.js",
                "resources/js/admin-pages/template-table-editor.js",
                "resources/js/admin-pages/transactions.js",
                "resources/js/admin-pages/user-table-editor.js",
                "resources/js/admin-pages/dashboard.js",
                "resources/js/user-pages/editor.js",
                "resources/user/js/plugins/gsap.min.js",
                "resources/js/user-pages/auth.js",
                "resources/user/js/plugins/slick-slider.js",
                "resources/user/js/plugins/bootstrap.min.js",
                "resources/user/js/plugins/mobilemenu.js",
                "resources/user/js/plugins/waypoints.js",
                "resources/user/js/plugins/magnific-popup.js",
                "resources/user/js/main.js",
                "resources/user/js/plugins/jquery-3-6-0.min.js",
                "resources/user/js/plugins/swiper.bundle.js",
                "resources/user/js/plugins/ScrollTrigger.min.js",
                "resources/user/js/plugins/aos.js",
                "resources/user/js/plugins/owlcarousel.min.js",
                "resources/user/js/plugins/counter.js",
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
            buildDirectory: "build", // Ensure manifest.json is inside public/build
            refresh: true,
        }),
        commonjs(),
        tailwindcss(),
    ],
    server: {
        sourcemap: false, // Matikan source map agar tidak mencari file .map yang hilang
    },
});
