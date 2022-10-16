<template>
  <div>
    <h3>{{ value.name }}</h3>

    <p v-if="value.listening">
      {{ $t('cv.language.module.listening') }} :
      {{ $t(`cv.language.levelOptions.${value.listening}`) }}
    </p>

    <p v-if="value.reading">
      {{ $t('cv.language.module.reading') }} :
      {{ $t(`cv.language.levelOptions.${value.reading}`) }}
    </p>

    <p v-if="value.talking">
      {{ $t('cv.language.module.talking') }} :
      {{ $t(`cv.language.levelOptions.${value.talking}`) }}
    </p>

    <p v-if="value.writing">
      {{ $t('cv.language.module.writing') }} :
      {{ $t(`cv.language.levelOptions.${value.writing}`) }}
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
