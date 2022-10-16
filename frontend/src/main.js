import '@babel/polyfill';
import 'mutationobserver-shim';
import Vue from 'vue';
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue';
import wysiwyg from 'vue-wysiwyg';
import App from './App.vue';
import router from './router';
import store from './store';
import i18n from './i18n';

Vue.config.productionTip = false;

Vue.use(BootstrapVue);
Vue.use(IconsPlugin);
Vue.use(wysiwyg, {
  hideModules: {
    image: true,
    table: true,
    removeFormat: true,
    separator: true,
  },
});

new Vue({
  router,
  store,
  i18n,
  render: (h) => h(App),
}).$mount('#app');
