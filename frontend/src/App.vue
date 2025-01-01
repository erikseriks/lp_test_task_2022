<template>
  <div id="app">
    <b-container
      fluid="xl"
      class="pt-2"
    >
      <router-view />
    </b-container>
  </div>
</template>

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
