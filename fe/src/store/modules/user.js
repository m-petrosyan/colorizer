import {getRequest, postRequest, putRequest} from "@/store/api";

export default {
    state: {
        auth: null,
        user: null,
        userError: null,
    },
    getters: {
        getUser: state => state.user,
        getAuth: state => state.auth,
        getUserError: state => state.userError,
    },
    mutations: {
        setToken(state, data) {
            sessionStorage.setItem('token', data)
        },
        setUserError(state, data) {
            state.userError = data
        },
        setAuth(state, data) {
            state.auth = data
        },
        setUser(state, data) {
            state.user = data
        },
    },
    actions: {
        signIn({commit}, data) {
            return postRequest('/oauth/token', {
                username: data.username,
                password: data.password,
                grant_type: 'password',
                client_id: import.meta.env.VITE_APP_CLIENT_ID,
                client_secret: import.meta.env.VITE_APP_CLIENT_SECRET
            })
                .then(response => commit("setToken", response.access_token))
                .catch(error => Promise.reject(error));
        },
        auth({commit}) {
            return getRequest('/user/auth', '')
                .then(response => commit("setAuth", response.data))
                .catch(error => {
                    sessionStorage.removeItem('token')
                    return Promise.reject(error)
                })
        },
        getUser({commit}, id) {
            return getRequest(`/user/${id}`, '')
                .then(response => commit("setUser", response.data))
                .catch(error => Promise.reject(error));
        },
        getUsers({commit}, data) {
            return getRequest('/user', data)
                .then(response => commit("setUsers", response))
                .catch(error => Promise.reject(error));
        },
        updateUser({commit}, data) {
            return putRequest(`/user`, data, commit)
                .catch(error => Promise.reject(error));
        },
    },
}