<template>
  <div>
    <b-button to="/cv/add" class="mb-2">
      {{ $t('actions.add') }}
    </b-button>

    <item-table />
  </div>
</template>

<script>
import Vue from 'vue';

const ItemTable = () => import('@/module/cv/cv/components/Table');

export default Vue.extend({
  components: {
    ItemTable,
  },
});
</script>
