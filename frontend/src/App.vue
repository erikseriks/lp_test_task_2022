<template>
  <div id="app">
    <navigation/>
    <b-container fluid="xl" class="pt-2">
      <router-view/>
    </b-container>
  </div>
</template>

<script>
import Vue from 'vue';

const Navigation = () => import('@/module/app/components/NavBar');

export default Vue.extend({
  components: {
    Navigation,
  },
});
</script>

<style lang="scss">
  @import '~bootstrap/scss/bootstrap.scss';
  @import '~bootstrap-vue/src/index.scss';
  @import "~vue-wysiwyg/dist/vueWysiwyg.css";

  .editr--content {
    background: white;
  }

  @media print {
    .btn {
      display: none;
    }
  }

  @page {
    margin-top: 2cm;
    margin-bottom: 2cm;
    margin-left: 2cm;
    margin-right: 2cm;
  }
</style>
