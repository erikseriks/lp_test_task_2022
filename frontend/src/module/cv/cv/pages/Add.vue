<template>
  <div>
    <div class="d-flex w-100 mb-2">
      <b-button
        @click="cancel"
        class="ml-auto"
        variant="secondary"
      >
        {{ $t('actions.cancel') }}
      </b-button>

      <b-button
        @click="$refs.form.submit()"
        class="ml-2"
        variant="success"
      >
        {{ $t('actions.save') }}
      </b-button>
    </div>

    <item-form
      ref="form"
      @stored="(i) => $router.push(`/cv/${i.id}`)"
    />
  </div>
</template>

<script>
import Vue from 'vue';

const ItemForm = () => import('@/module/cv/cv/components/Form');

export default Vue.extend({
  components: {
    ItemForm,
  },
  methods: {
    async cancel() {
      const confirm = await this.$bvModal.msgBoxConfirm(this.$t('actions.cancelEdit'), {
        title: this.$t('actions.cancel'),
        okVariant: 'danger',
        headerClass: 'p-2 border-bottom-0',
        footerClass: 'p-2 border-top-0',
        centered: true,
        okTitle: this.$t('global.yes'),
        cancelTitle: this.$t('global.no'),
      });

      if (confirm) {
        if (window.history.length > 1) {
          this.$router.go(-1);
        } else {
          this.$router.push(`/cv/${this.$route.params.cv}`);
        }
      }
    },
  },
});
</script>
