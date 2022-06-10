import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/inertia-vue3'
import { InertiaProgress } from '@inertiajs/progress'

createInertiaApp({
    resolve: name => require(`./Pages/${name}`),
    setup({ el, App, props, plugin }) {
        const VueApp = createApp({ render: () => h(App, props) });

        VueApp.config.globalProperties.$route = route;

        VueApp.use(plugin)
            .mount(el);

        return VueApp;
    },
});

InertiaProgress.init({
    showSpinner: true,
});
