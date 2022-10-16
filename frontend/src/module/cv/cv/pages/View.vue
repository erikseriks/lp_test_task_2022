<template>
  <div>
    <div class="d-flex w-100 mb-2">
      <b-button
        :to="`/cv`"
        class="ml-auto"
        variant="secondary"
      >
        {{ $t('actions.back') }}
      </b-button>

      <b-button
        :to="`/cv/${$route.params.cv}/edit`"
        class="ml-2"
        variant="success"
      >
        {{ $t('actions.edit') }}
      </b-button>

      <b-button
        @click="print"
        class="ml-2"
        variant="primary"
      >
        {{ $t('actions.print') }}
      </b-button>
    </div>

    <item-view :id="parseInt($route.params.cv)"/>
  </div>
</template>

<script>
import Vue from 'vue';

const ItemView = () => import('@/module/cv/cv/components/View');

export default Vue.extend({
  components: {
    ItemView,
  },
  methods: {
    print() {
      window.print();
    },
  },
});
</script>
