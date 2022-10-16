<template>
  <b-row>
    <b-form-group
      class="col-4"
      :label="$t('cv.address.module.country')"
      :invalid-feedback="errors.country && $t(`validation.errors.${errors.country}`)"
      :state="false === !errors.country ? false : null"
    >
      <b-form-input
        v-model="val.country"
        type="text"
        :state="false === !errors.country ? false : null"
      />
    </b-form-group>

    <b-form-group
      class="col-md-4"
      :label="$t('cv.address.module.index')"
      :invalid-feedback="errors.index && $t(`validation.errors.${errors.index}`)"
      :state="false === !errors.index ? false : null"
    >
      <b-form-input
        v-model="val.index"
        type="text"
        :state="false === !errors.index ? false : null"
      />
    </b-form-group>

    <b-form-group
      class="col-md-4"
      :label="$t('cv.address.module.city')"
      :invalid-feedback="errors.city && $t(`validation.errors.${errors.city}`)"
      :state="false === !errors.city ? false : null"
    >
      <b-form-input
        v-model="val.city"
        type="text"
        :state="false === !errors.city ? false : null"
      />
    </b-form-group>

    <b-form-group
      class="col-md-8"
      :label="$t('cv.address.module.street')"
      :invalid-feedback="errors.street && $t(`validation.errors.${errors.street}`)"
      :state="false === !errors.street ? false : null"
    >
      <b-form-input
        v-model="val.street"
        type="text"
        :state="false === !errors.street ? false : null"
      />
    </b-form-group>

    <b-form-group
      class="col-md-4"
      :label="$t('cv.address.module.number')"
      :invalid-feedback="errors.number && $t(`validation.errors.${errors.number}`)"
      :state="false === !errors.number ? false : null"
    >
      <b-form-input
        v-model="val.number"
        type="text"
        :state="false === !errors.number ? false : null"
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
