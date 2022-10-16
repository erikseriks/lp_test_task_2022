<template>
  <b-row>
    <b-form-group
      class="col-12"
      :label="$t('cv.skill.module.type')"
      :invalid-feedback="errors.type && $t(`validation.errors.${errors.type}`)"
      :state="false === !errors.type ? false : null"
    >
      <b-form-select
        v-model="val.type"
        :state="false === !errors.type ? false : null"
        :options="[
          { value: null, text: $t('global.pleaseSelect') },
          { value: 1, text: $t('cv.skill.typeOptions.1') },
          { value: 2, text: $t('cv.skill.typeOptions.2') },
          { value: 3, text: $t('cv.skill.typeOptions.3') },
          { value: 4, text: $t('cv.skill.typeOptions.4') },
        ]"
      />
    </b-form-group>

    <b-form-group
      class="col-md-12"
      :label="$t('cv.skill.module.description')"
      :invalid-feedback="errors.description && $t(`validation.errors.${errors.description}`)"
      :state="false === !errors.description ? false : null"
    >
      <wysiwyg v-model="val.description" />
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
