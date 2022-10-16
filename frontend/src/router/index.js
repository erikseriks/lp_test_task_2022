import Vue from 'vue';
import VueRouter from 'vue-router';
import cv from '@/module/cv/router';
import RouterComponent from '@/module/app/components/Router.vue';

Vue.use(VueRouter);

const routes = [
  {
    component: RouterComponent,
    path: '/cv',
    children: cv,
  },
  {
    component: RouterComponent,
    path: '',
    children: cv,
  },
];

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes,
});

export default router;
