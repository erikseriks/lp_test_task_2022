<template>
  <b-overlay :show="loading" rounded="sm">
    <b-form @submit.prevent="submit">
      <b-card :title="$t('cv.cv.form.main-information')">
        <form-fields v-model="item" :errors="errors" />
      </b-card>

      <b-card
        v-for="name in ['education', 'experience', 'skills', 'addresses', 'languages']"
        :key="name"
        :title="$t(`cv.cv.form.${name}`)"
        class="my-2"
      >
        <div v-if="name === 'languages'">
          <b-form-group
            class="col-12"
            :label="$t('cv.cv.module.native_language')"
            :invalid-feedback="
              errors.native_language
              && $t(`validation.errors.${errors.native_language}`)
            "
            :state="false === !errors.native_language ? false : null"
          >
            <b-form-input
              v-model="item.native_language"
              type="text"
              :state="false === !errors.native_language ? false : null"
            />
          </b-form-group>
        </div>

        <b-card
          v-for="(i, idx) in item[name]"
          :key="idx"
          bg-variant="light"
          class="my-1"
        >
          <div class="d-flex w-100">
            <b-button
              class="ml-auto"
              variant="danger"
              size="sm"
              @click="item[name].splice(idx, 1)"
            >
              {{ $t('actions.delete') }}
            </b-button>
          </div>

          <education-form-fields
            v-if="name === 'education'"
            v-model="item[name][idx]"
            :errors="errors && errors[name] && errors[name][idx]"
          />
          <experience-form-fields
            v-if="name === 'experience'"
            v-model="item[name][idx]"
            :errors="errors && errors[name] && errors[name][idx]"
          />
          <skill-form-fields
            v-if="name === 'skills'"
            v-model="item[name][idx]"
            :errors="errors && errors[name] && errors[name][idx]"
          />
          <address-form-fields
            v-if="name === 'addresses'"
            v-model="item[name][idx]"
            :errors="errors && errors[name] && errors[name][idx]"
          />
          <language-form-fields
            v-if="name === 'languages'"
            v-model="item[name][idx]"
            :errors="errors && errors[name] && errors[name][idx]"
          />
        </b-card>

        <b-button
          class="w-100"
          variant="success"
          size="lg"
          @click="item[name].push({})"
        >
          {{ $t('actions.add') }}
        </b-button>
      </b-card>
    </b-form>
  </b-overlay>
</template>

<script>
import Vue from 'vue';

const FormFields = () => import('@/module/cv/cv/components/Form/FormFields');
const EducationFormFields = () => import('@/module/cv/education/components/Form/FormFields');
const ExperienceFormFields = () => import('@/module/cv/experience/components/Form/FormFields');
const SkillFormFields = () => import('@/module/cv/skill/components/Form/FormFields');
const AddressFormFields = () => import('@/module/cv/address/components/Form/FormFields');
const LanguageFormFields = () => import('@/module/cv/language/components/Form/FormFields');

export default Vue.extend({
  props: {
    id: Number,
  },
  components: {
    FormFields,
    EducationFormFields,
    ExperienceFormFields,
    SkillFormFields,
    AddressFormFields,
    LanguageFormFields,
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
