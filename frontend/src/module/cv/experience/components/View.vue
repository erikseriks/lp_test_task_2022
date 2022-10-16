<template>
  <div>
    <h3>{{ value.name }}</h3>

    <p v-if="value.faculty">
      {{ $t('cv.experience.module.faculty') }} :
      {{ value.faculty }}
    </p>

    <p v-if="value.position">
      {{ $t('cv.experience.module.position') }} :
      {{ value.position }}<br>
    </p>

    <p v-if="value.work_load">
      {{ $t('cv.experience.module.work_load') }} :
      {{ value.work_load }}<br>
    </p>

    <p v-if="value.start_year">
      {{ $t('cv.experience.module.start_year') }} :
      {{ value.start_year}} -
      {{ $t('cv.experience.module.start_month') }} :
      {{ $t(`global.months.${value.start_month}`) }}<br>
    </p>

    <p v-if="value.end_year">
      {{ $t('cv.experience.module.end_year') }} :
      {{ value.end_year }} -
      {{ $t('cv.experience.module.end_month') }} :
      {{ $t(`global.months.${value.end_month}`) }}
    </p>

    <h4 v-if="value.skills.length > 0">{{ $t(`cv.experience.form.skills`) }}</h4>

    <skill-view v-for="skill in value.skills" :key="'exp-skill' + skill.id" :value="skill" />
  </div>
</template>

<script>
import Vue from 'vue';

const SkillView = () => import('@/module/cv/skill/components/View');

export default Vue.extend({
  props: {
    value: {
      type: Object,
      default: () => ({}),
    },
  },
  components: {
    SkillView,
  },
});
</script>
