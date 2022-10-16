<template>
  <b-row>
    <b-form-group
      class="col-12"
      :label="$t('cv.education.module.name')"
      :invalid-feedback="errors.name && $t(`validation.errors.${errors.name}`)"
      :state="false === !errors.name ? false : null"
    >
      <b-form-input
        v-model="val.name"
        type="text"
        :state="false === !errors.name ? false : null"
      />
    </b-form-group>

    <b-form-group
      class="col-md-6"
      :label="$t('cv.education.module.faculty')"
      :invalid-feedback="errors.faculty && $t(`validation.errors.${errors.faculty}`)"
      :state="false === !errors.faculty ? false : null"
    >
      <b-form-input
        v-model="val.faculty"
        type="text"
        :state="false === !errors.faculty ? false : null"
      />
    </b-form-group>

    <b-form-group
      class="col-md-6"
      :label="$t('cv.education.module.field')"
      :invalid-feedback="errors.field && $t(`validation.errors.${errors.field}`)"
      :state="false === !errors.field ? false : null"
    >
      <b-form-input
        v-model="val.field"
        type="text"
        :state="false === !errors.field ? false : null"
      />
    </b-form-group>

    <b-form-group
      class="col-md-6"
      :label="$t('cv.education.module.level')"
      :invalid-feedback="errors.level && $t(`validation.errors.${errors.level}`)"
      :state="false === !errors.level ? false : null"
    >
      <b-form-input
        v-model="val.level"
        type="text"
        :state="false === !errors.level ? false : null"
      />
    </b-form-group>

    <b-form-group
      class="col-md-6"
      :label="$t('cv.education.module.status')"
      :invalid-feedback="errors.status && $t(`validation.errors.${errors.status}`)"
      :state="false === !errors.status ? false : null"
    >
      <b-form-select
        v-model="val.status"
        :state="false === !errors.status ? false : null"
        :options="[
          { value: null, text: $t('global.pleaseSelect') },
          { value: 1, text: $t('cv.education.statusOptions.1') },
          { value: 2, text: $t('cv.education.statusOptions.2') },
          { value: 3, text: $t('cv.education.statusOptions.3') },
        ]"
      />
    </b-form-group>

    <b-form-group
      class="col-md-3"
      :label="$t('cv.education.module.start_year')"
      :invalid-feedback="errors.start_year && $t(`validation.errors.${errors.start_year}`)"
      :state="false === !errors.start_year ? false : null"
    >
      <b-form-input
        v-model="val.start_year"
        type="text"
        :state="false === !errors.start_year ? false : null"
      />
    </b-form-group>

    <b-form-group
      class="col-md-3"
      :label="$t('cv.education.module.start_month')"
      :invalid-feedback="errors.start_month && $t(`validation.errors.${errors.start_month}`)"
      :state="false === !errors.start_month ? false : null"
    >
      <b-form-select
        v-model="val.start_month"
        :state="false === !errors.start_month ? false : null"
        :options="[
          { value: null, text: $t('global.pleaseSelect') },
          { value: 1, text: $t('global.months.1') },
          { value: 2, text: $t('global.months.2') },
          { value: 3, text: $t('global.months.3') },
          { value: 4, text: $t('global.months.4') },
          { value: 5, text: $t('global.months.5') },
          { value: 6, text: $t('global.months.6') },
          { value: 7, text: $t('global.months.7') },
          { value: 8, text: $t('global.months.8') },
          { value: 9, text: $t('global.months.9') },
          { value: 10, text: $t('global.months.10') },
          { value: 11, text: $t('global.months.11') },
          { value: 12, text: $t('global.months.12') },
        ]"
      />
    </b-form-group>

    <b-form-group
      class="col-md-3"
      :label="$t('cv.education.module.end_year')"
      :invalid-feedback="errors.end_year && $t(`validation.errors.${errors.end_year}`)"
      :state="false === !errors.end_year ? false : null"
    >
      <b-form-input
        v-model="val.end_year"
        type="text"
        :state="false === !errors.end_year ? false : null"
      />
    </b-form-group>

    <b-form-group
      class="col-md-3"
      :label="$t('cv.education.module.end_month')"
      :invalid-feedback="errors.end_month && $t(`validation.errors.${errors.end_month}`)"
      :state="false === !errors.end_month ? false : null"
    >
      <b-form-select
        v-model="val.end_month"
        :state="false === !errors.end_month ? false : null"
        :options="[
          { value: null, text: $t('global.pleaseSelect') },
          { value: 1, text: $t('global.months.1') },
          { value: 2, text: $t('global.months.2') },
          { value: 3, text: $t('global.months.3') },
          { value: 4, text: $t('global.months.4') },
          { value: 5, text: $t('global.months.5') },
          { value: 6, text: $t('global.months.6') },
          { value: 7, text: $t('global.months.7') },
          { value: 8, text: $t('global.months.8') },
          { value: 9, text: $t('global.months.9') },
          { value: 10, text: $t('global.months.10') },
          { value: 11, text: $t('global.months.11') },
          { value: 12, text: $t('global.months.12') },
        ]"
      />
    </b-form-group>
  </b-row>
</template>

<script>
import Vue from 'vue';

export default Vue.extend({
  props: {
    value: {
      type: Object,
      default: () => ({}),
    },
    errors: {
      type: Object,
      default: () => ({}),
    },
  },
  data() {
    return {
      val: this.value,
    };
  },
  watch: {
    val: {
      handler() {
        this.$emit('input', this.val);
      },
      deep: true,
    },
    value: {
      handler(value) {
        Object.assign(this.val, value);
      },
      deep: true,
    },
  },
});
</script>
