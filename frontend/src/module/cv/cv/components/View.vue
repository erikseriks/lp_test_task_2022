<template>
  <b-overlay :show="loading" rounded="sm" class="print">
    <h1>
      {{ item.first_name }}
      {{ item.last_name }}
    </h1>

    <p>
      {{ $t('cv.cv.module.email') }} : {{ item.email }} <br>
      {{ $t('cv.cv.module.phone') }} : {{ item.phone }}
    </p>

    <h2 v-if="item.education.length">
      {{ $t('cv.cv.form.education') }}
    </h2>

    <education-view v-for="edu in item.education" :key="'edu' + edu.id" :value="edu" />

    <h2 v-if="item.experience.length">
      {{ $t('cv.cv.form.experience') }}
    </h2>

    <experience-view v-for="exp in item.experience" :key="'exp' + exp.id" :value="exp" />

    <h2 v-if="item.skills.length">
      {{ $t('cv.cv.form.skills') }}
    </h2>

    <skill-view v-for="skill in item.skills" :key="'skill' + skill.id" :value="skill" />

    <h2 v-if="item.addresses.length">
      {{ $t('cv.cv.form.addresses') }}
    </h2>

    <address-view
      v-for="(address, idx) in item.addresses"
      :key="'address' + address.id"
      :value="address"
      :idx="idx + 1"
    />

    <h2 v-if="item.languages.length">
      {{ $t('cv.cv.form.languages') }}
    </h2>

    <language-view
      v-for="language in item.languages"
      :key="'language' + language.id"
      :value="language"
    />
  </b-overlay>
</template>

<script>
import Vue from 'vue';

const EducationView = () => import('@/module/cv/education/components/View');
const ExperienceView = () => import('@/module/cv/experience/components/View');
const SkillView = () => import('@/module/cv/skill/components/View');
const AddressView = () => import('@/module/cv/address/components/View');
const LanguageView = () => import('@/module/cv/language/components/View');

export default Vue.extend({
  props: {
    id: Number,
  },
  components: {
    EducationView,
    ExperienceView,
    SkillView,
    AddressView,
    LanguageView,
  },
  data() {
    return {
      loading: false,
      item: {
        id: null,
        first_name: '',
        last_name: '',
        phone: '',
        email: '',
        education: [],
        experience: [],
        skills: [],
        addresses: [],
        languages: [],
      },
      errors: {},
    };
  },
  created() {
    if (this.id) {
      this.loadData();
    }
  },
  methods: {
    async submit() {
      if (this.loading) {
        return;
      }

      this.loading = true;

      const response = await this.$store.dispatch('cv/cv/storeItem', this.item);

      if (response.errors) {
        this.errors = response.errors;
      } else {
        this.item = response.item;
        this.errors = {};

        this.$emit('stored', this.item);
      }

      this.loading = false;
    },
    async loadData() {
      if (this.loading) {
        return;
      }

      this.loading = true;

      this.item = await this.$store.dispatch('cv/cv/loadItem', this.id);

      this.loading = false;
    },
  },
});
</script>
