import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/inertia-vue3'

createInertiaApp({
  resolve: name => require(`./Pages/${name}`),
  setup({ el, App, props, plugin }) {
      const VueApp = createApp({ render: () => h(App, props) });

      VueApp.config.globalProperties.$route = route;

      VueApp.use(plugin)
          .mount(el);

      return VueApp;
  },
})
<<<<<<< HEAD
=======


>>>>>>> b9b856d93d5a7d894d4a9f01bd063ebaaf24f806
