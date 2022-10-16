<template>
  <b-row>
    <b-form-group
      class="col-12"
      :label="$t('cv.language.module.name')"
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
      class="col-3"
      :label="$t('cv.language.module.listening')"
      :invalid-feedback="errors.listening && $t(`validation.errors.${errors.listening}`)"
      :state="false === !errors.listening ? false : null"
    >
      <b-form-select
        v-model="val.listening"
        :state="false === !errors.listening ? false : null"
        :options="[
          { value: null, text: $t('global.pleaseSelect') },
          { value: 1, text: $t('cv.language.levelOptions.1') },
          { value: 2, text: $t('cv.language.levelOptions.2') },
          { value: 3, text: $t('cv.language.levelOptions.3') },
          { value: 4, text: $t('cv.language.levelOptions.4') },
          { value: 5, text: $t('cv.language.levelOptions.5') },
          { value: 6, text: $t('cv.language.levelOptions.6') },
        ]"
      />
    </b-form-group>

    <b-form-group
      class="col-3"
      :label="$t('cv.language.module.reading')"
      :invalid-feedback="errors.reading && $t(`validation.errors.${errors.reading}`)"
      :state="false === !errors.reading ? false : null"
    >
      <b-form-select
        v-model="val.reading"
        :state="false === !errors.reading ? false : null"
        :options="[
          { value: null, text: $t('global.pleaseSelect') },
          { value: 1, text: $t('cv.language.levelOptions.1') },
          { value: 2, text: $t('cv.language.levelOptions.2') },
          { value: 3, text: $t('cv.language.levelOptions.3') },
          { value: 4, text: $t('cv.language.levelOptions.4') },
          { value: 5, text: $t('cv.language.levelOptions.5') },
          { value: 6, text: $t('cv.language.levelOptions.6') },
        ]"
      />
    </b-form-group>

    <b-form-group
      class="col-3"
      :label="$t('cv.language.module.talking')"
      :invalid-feedback="errors.talking && $t(`validation.errors.${errors.talking}`)"
      :state="false === !errors.talking ? false : null"
    >
      <b-form-select
        v-model="val.talking"
        :state="false === !errors.talking ? false : null"
        :options="[
          { value: null, text: $t('global.pleaseSelect') },
          { value: 1, text: $t('cv.language.levelOptions.1') },
          { value: 2, text: $t('cv.language.levelOptions.2') },
          { value: 3, text: $t('cv.language.levelOptions.3') },
          { value: 4, text: $t('cv.language.levelOptions.4') },
          { value: 5, text: $t('cv.language.levelOptions.5') },
          { value: 6, text: $t('cv.language.levelOptions.6') },
        ]"
      />
    </b-form-group>

    <b-form-group
      class="col-3"
      :label="$t('cv.language.module.writing')"
      :invalid-feedback="errors.writing && $t(`validation.errors.${errors.writing}`)"
      :state="false === !errors.writing ? false : null"
    >
      <b-form-select
        v-model="val.writing"
        :state="false === !errors.writing ? false : null"
        :options="[
          { value: null, text: $t('global.pleaseSelect') },
          { value: 1, text: $t('cv.language.levelOptions.1') },
          { value: 2, text: $t('cv.language.levelOptions.2') },
          { value: 3, text: $t('cv.language.levelOptions.3') },
          { value: 4, text: $t('cv.language.levelOptions.4') },
          { value: 5, text: $t('cv.language.levelOptions.5') },
          { value: 6, text: $t('cv.language.levelOptions.6') },
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
