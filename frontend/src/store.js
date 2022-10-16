import Vue from 'vue';
import Vuex from 'vuex';
import cv from '@/module/cv/store';

Vue.use(Vuex);

export default new Vuex.Store({
  modules: {
    cv,
  },
});
