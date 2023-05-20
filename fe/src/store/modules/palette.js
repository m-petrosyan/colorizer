import {getRequest, patchRequest,} from "@/store/api";

export default {
    state: {
        palette: null,
        palettes: null,
    },
    getters: {
        getPallete: state => state.palette,
        getPalettes: state => state.palettes,
    },
    mutations: {
        setPalette(state, data) {
            state.palette = data
        },
        setPalettes(state, data) {
            state.palettes = data
        },
        setPaletteLike(state, id) {
            state.palettes = state.palettes.filter(item => {
                if (item.id === id) {
                    item.liked = !item.liked
                    item.likes = item.liked ? item.likes + 1 : item.likes - 1
                }
                return item;
            })
        },
    },
    actions: {
        getPalette({commit}, id) {
            return getRequest(`/palette/${id}`, '')
                .then(response => commit("setPalette", response.data))
                .catch(error => Promise.reject(error));
        },
        getUserPalettes({commit}) {
            return getRequest(`/palette/user`)
                .then(response => commit("setPalettes", response.data))
                .catch(error => Promise.reject(error));
        },
        getPalettes({commit}, data) {
            return getRequest('/palette', {limit: data})
                .then(response => commit("setPalettes", response.data))
                .catch(error => Promise.reject(error));
        },
        likePallete({commit}, id) {
            return patchRequest(`/palette/${id}/like`)
                .then(() => commit("setPaletteLike", id))
                .catch(error => Promise.reject(error));
        },
    },
}