import {getRequest} from "@/store/api";

export default {
    state: {
        palette: null,
        palettes: null,
    },
    getters: {
        getPallete: state => state.palette,
        getPalletes: state => state.palettes,
    },
    mutations: {
        setPalette(state, data) {
            state.palette = data
        },
        setPalettes(state, data) {
            state.palettes = data
        },
    },
    actions: {
        getPallete({commit}, id) {
            return getRequest(`/palette/${id}`, '')
                .then(response => commit("setPalette", response.data))
                .catch(error => Promise.reject(error));
        },
        getPalletes({commit}, data) {
            return getRequest('/palette', {limit: data})
                .then(response => commit("setPalettes", response.data))
                .catch(error => Promise.reject(error));
        },
    },
}