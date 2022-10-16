<template>
  <div>
    <h3>{{ value.name }}</h3>

    <p v-if="value.faculty">
      {{ $t('cv.education.module.faculty') }} :
      {{ value.faculty }}
    </p>

    <p v-if="value.field">
      {{ $t('cv.education.module.field') }} :
      {{ value.field }}<br>
    </p>

    <p v-if="value.level">
      {{ $t('cv.education.module.level') }} :
      {{ value.level }}<br>
    </p>

    <p v-if="value.status">
      {{ $t('cv.education.module.status') }} :
      {{ value.status ? $t(`cv.education.statusOptions.${value.status}`) : '' }}<br>
    </p>

    <p v-if="value.start_year">
      {{ $t('cv.education.module.start_year') }} :
      {{ value.start_year}}
      <span v-if="value.start_month">
        -
        {{ $t('cv.education.module.start_month') }} :
        {{ $t(`global.months.${value.start_month}`) }}<br>
      </span>
    </p>

    <p v-if="value.end_year">
      {{ $t('cv.education.module.end_year') }} :
      {{ value.end_year }}
      <span v-if="value.end_month">
        -
        {{ $t('cv.education.module.end_month') }} :
        {{ $t(`global.months.${value.end_month}`) }}
      </span>
    </p>
  </div>
</template>

<script>
import Vue from 'vue';

export default Vue.extend({
  props: {
    value: {
      type: Object,
      default: () => ({}),
    },
  },
});
</script>
