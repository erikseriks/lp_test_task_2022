const url = 'http://localhost:8001/cv';

const initialState = () => ({
  items: {},
  total: 0,
});

const storeState = initialState();

const storeGetters = {
  get: (state) => (id) => state.items[id] && JSON.parse(JSON.stringify(state.items[id])),
};

const actions = {
  async removeItem({ commit }, id) {
    await fetch(`${url}/${id}`, {
      method: 'DELETE',
      headers: {
        Accept: 'application/json',
        'Content-Type': 'application/json',
      },
    });

    commit('REMOVE_ITEM', id);
  },
  async loadItems({ getters, commit }, params) {
    const response = await fetch(`${url}?${new URLSearchParams(params)}`);
    const data = await response.json();

    commit(
      'SET_ITEMS',
      data.data.map((i) => ({
        ...i,
        ...getters.get(i.id),
        listLoaded: !getters.get(i.id) || getters.get(i.id).listLoaded,
      })),
    );
    commit('SET_TOTAL', data.total);

    return data;
  },
  async loadItem({ getters, commit }, id) {
    const item = getters.get(id);

    if (item && !item.listLoaded) {
      return item;
    }

    const response = await fetch(`${url}/${id}`);

    const data = await response.json();

    commit('SET_ITEM', data);

    return getters.get(id);
  },
  async storeItem({ getters, commit }, item) {
    const storeUrl = item.id ? `${url}/${item.id}` : url;

    const response = await fetch(storeUrl, {
      method: item.id ? 'PATCH' : 'POST',
      headers: {
        Accept: 'application/json',
        'Content-Type': 'application/json',
      },
      body: JSON.stringify(item),
    });

    if (!response.ok) {
      if (response.status === 422 || response.status === 400) {
        const errors = await response.json();
        const parsedErrors = {};

        Object.keys(errors).forEach((k) => {
          const parts = k.split('.');
          let lastPart = parsedErrors;

          parts.forEach((p, idx) => {
            const last = idx + 1 === parts.length;

            if (!last) {
              lastPart[p] = lastPart[p] || {};

              lastPart = lastPart[p];
            } else {
              lastPart[p] = (errors[k][0] || '').split('.').join('-');
            }
          });
        });

        return { errors: parsedErrors };
      }

      throw new Error('RequestFailed');
    }

    const data = await response.json();

    commit('SET_ITEM', data);

    return { errors: null, item: getters.get(data.id) };
  },
};

const mutations = {
  SET_ITEM: (state, item) => {
    state.items = {
      ...state.items,
      [item.id]: item,
    };
  },
  REMOVE_ITEM: (state, id) => {
    delete state.items[id];
  },
  SET_ITEMS: (state, items) => {
    const newItems = items.reduce((acc, i) => ({ ...acc, [i.id]: i }), {});

    state.items = {
      ...state.items,
      ...newItems,
    };
  },
  SET_TOTAL: (state, total) => {
    state.total = total;
  },
};

export default {
  namespaced: true,
  state: storeState,
  getters: storeGetters,
  actions,
  mutations,
};
