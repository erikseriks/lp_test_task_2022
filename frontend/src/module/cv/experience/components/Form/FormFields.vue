<template>
  <b-row>
    <b-form-group
      class="col-12"
      :label="$t('cv.experience.module.name')"
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
      :label="$t('cv.experience.module.position')"
      :invalid-feedback="errors.position && $t(`validation.errors.${errors.position}`)"
      :state="false === !errors.position ? false : null"
    >
      <b-form-input
        v-model="val.position"
        type="text"
        :state="false === !errors.position ? false : null"
      />
    </b-form-group>

    <b-form-group
      class="col-md-6"
      :label="$t('cv.experience.module.work_load')"
      :invalid-feedback="errors.work_load && $t(`validation.errors.${errors.work_load}`)"
      :state="false === !errors.work_load ? false : null"
    >
      <b-form-input
        v-model="val.work_load"
        type="text"
        :state="false === !errors.work_load ? false : null"
      />
    </b-form-group>

    <b-form-group
      class="col-md-3"
      :label="$t('cv.experience.module.start_year')"
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
      :label="$t('cv.experience.module.start_month')"
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
      :label="$t('cv.experience.module.end_year')"
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
      :label="$t('cv.experience.module.end_month')"
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

    <b-card :title="$t(`cv.experience.form.skills`)" class="my-2 col-12">
      <b-card
        v-for="(i, idx) in val.skills"
        :key="idx"
        bg-variant="light"
        class="my-1"
      >
        <div class="d-flex w-100">
          <b-button
            class="ml-auto"
            variant="danger"
            size="sm"
            @click="val.skills.splice(idx, 1)"
          >
            {{ $t('actions.delete') }}
          </b-button>
        </div>

        <skill-form-fields
          v-model="val.skills[idx]"
          :errors="errors && errors.skills && errors.skills[idx]"
        />
      </b-card>

      <b-button
        class="w-100"
        variant="success"
        size="lg"
        @click="() => {val.skills = [...(val.skills || []), {}]}"
      >
        {{ $t('actions.add') }}
      </b-button>
    </b-card>
  </b-row>
</template>

<script>
import Vue from 'vue';

const SkillFormFields = () => import('@/module/cv/skill/components/Form/FormFields');

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
      val: {
        skills: [],
        ...this.value,
      },
    };
  },
  components: {
    SkillFormFields,
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
