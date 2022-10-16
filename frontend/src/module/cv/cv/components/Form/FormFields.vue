<template>
  <b-row>
    <b-form-group
      class="col-md-6"
      :label="$t('cv.cv.module.first_name')"
      :invalid-feedback="errors.first_name && $t(`validation.errors.${errors.first_name}`)"
      :state="false === !errors.first_name ? false : null"
    >
      <b-form-input
        v-model="val.first_name"
        type="text"
        :state="false === !errors.first_name ? false : null"
      />
    </b-form-group>

    <b-form-group
      class="col-md-6"
      :label="$t('cv.cv.module.last_name')"
      :invalid-feedback="errors.last_name && $t(`validation.errors.${errors.last_name}`)"
      :state="false === !errors.last_name ? false : null"
    >
      <b-form-input
        v-model="val.last_name"
        type="text"
        :state="false === !errors.last_name ? false : null"
      />
    </b-form-group>

    <b-form-group
      class="col-md-6"
      :label="$t('cv.cv.module.email')"
      :invalid-feedback="errors.email && $t(`validation.errors.${errors.email}`)"
      :state="false === !errors.email ? false : null"
    >
      <b-form-input
        v-model="val.email"
        type="email"
        :state="false === !errors.email ? false : null"
      />
    </b-form-group>

    <b-form-group
      class="col-md-6"
      :label="$t('cv.cv.module.phone')"
      :invalid-feedback="errors.phone && $t(`validation.errors.${errors.phone}`)"
      :state="false === !errors.phone ? false : null"
    >
      <b-form-input
        v-model="val.phone"
        type="text"
        :state="false === !errors.phone ? false : null"
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
