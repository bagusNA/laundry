import { createApp, h, onMounted } from 'vue';
import { createInertiaApp } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import '@/assets/css/app.scss';

InertiaProgress.init();

createInertiaApp({
  resolve: name => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
  setup({el, App, props, plugin}) {
    createApp({
      setup() {
        onMounted(() => delete el.dataset.page);
      },
      render: () => h(App, props)},
    )
    .use(plugin)
    .mount(el);
  }
});