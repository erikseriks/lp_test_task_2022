<template>
  <div>
    <h3>{{ $t(`cv.skill.typeOptions.${value.type}`) }}</h3>

    <p v-html="value.description" />
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
