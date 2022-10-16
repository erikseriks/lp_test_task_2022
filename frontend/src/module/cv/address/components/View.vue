<template>
  <div>
    <h3>{{ $t('cv.address.view.address') }} {{ idx }}</h3>

    <p v-if="value.country">
      {{ $t('cv.address.module.country') }} :
      {{ value.country }}
    </p>

    <p v-if="value.index">
      {{ $t('cv.address.module.index') }} :
      {{ value.index }}<br>
    </p>

    <p v-if="value.city">
      {{ $t('cv.address.module.city') }} :
      {{ value.city }}<br>
    </p>

    <p v-if="value.street">
      {{ $t('cv.address.module.street') }} :
      {{ value.street }}<br>
    </p>

    <p v-if="value.number">
      {{ $t('cv.address.module.number') }} :
      {{ value.number }}<br>
    </p>
  </div>
</template>

<script>
import Vue from 'vue';

export default Vue.extend({
  props: {
    idx: Number,
    value: {
      type: Object,
      default: () => ({}),
    },
  },
});
</script>
