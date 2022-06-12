require('bootstrap');

import { createApp, h } from 'vue'
import { createInertiaApp, Link, Head } from '@inertiajs/inertia-vue3'
import { InertiaProgress } from '@inertiajs/progress'
import Layout from './Shared/Layout.vue';

createInertiaApp({
    resolve: async name => {
        let page = (await import(`./Pages/${name}`)).default;
        // let page = require(`./Pages/${name}`).default;

        page.layout ??= Layout;

        return page;
    },
    setup({ el, App, props, plugin }) {
        const VueApp = createApp({ render: () => h(App, props) });

        VueApp.config.globalProperties.$route = route;

        VueApp.use(plugin)
            .component('Link', Link)
            .component('Head', Head)
            .mount(el);

        return VueApp;
    },
    title: title => `charitAble - ${title}` 
});

InertiaProgress.init({
    showSpinner: true,
});


