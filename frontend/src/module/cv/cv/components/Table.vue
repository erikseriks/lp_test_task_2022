<template>
  <div>
    <b-table
      ref="table"
      striped
      hover
      :per-page="perPage"
      :current-page="currentPage"
      :busy.sync="isBusy"
      :items="loadItems"
      :fields="[
        {
          key: 'first_name',
          label: $t('cv.cv.module.first_name'),
        },
        {
          key: 'last_name',
          label: $t('cv.cv.module.last_name'),
        },
        {
          key: 'phone',
          label: $t('cv.cv.module.phone'),
        },
        {
          key: 'email',
          label: $t('cv.cv.module.email'),
        },
        {
          key: 'actions',
          label: '',
        },
      ]"
    >
      <template #cell(actions)="{item}">
        <div class="d-flex">
          <b-button
            class="ml-auto"
            size="sm"
            :to="`/cv/${item.id}/edit`"
          >
            {{ $t('actions.edit') }}
          </b-button>
          <b-button
            class="ml-1"
            size="sm"
            :to="`/cv/${item.id}`"
          >
            {{ $t('actions.view') }}
          </b-button>
          <b-button
            variant="danger"
            class="ml-1"
            size="sm"
            @click="() => deleteItem(item.id)"
          >
            {{ $t('actions.delete') }}
          </b-button>
        </div>
      </template>
    </b-table>

    <b-pagination
      v-if="rows > perPage"
      v-model="currentPage"
      :total-rows="rows"
      :per-page="perPage"
      aria-controls="my-table"
    />
  </div>
</template>

<script>
import Vue from 'vue';

export default Vue.extend({
  props: {
    perPage: {
      type: Number,
      default: 15,
    },
  },
  data() {
    return {
      currentPage: 1,
      rows: 0,
      isBusy: false,
    };
  },
  methods: {
    async loadItems() {
      const data = await this.$store.dispatch(
        'cv/cv/loadItems',
        {
          page: this.currentPage,
        },
      );

      this.rows = data.total;

      return data.data;
    },
    async deleteItem(id) {
      const confirm = await this.$bvModal.msgBoxConfirm(this.$t('actions.deleteMessage'), {
        title: `${this.$t('actions.delete')}?`,
        okVariant: 'danger',
        headerClass: 'p-2 border-bottom-0',
        footerClass: 'p-2 border-top-0',
        centered: true,
        okTitle: this.$t('global.yes'),
        cancelTitle: this.$t('global.no'),
      });

      if (confirm) {
        await this.$store.dispatch('cv/cv/removeItem', id);
        this.$refs.table.refresh();
      }
    },
  },
});
</script>
