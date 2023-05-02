import {postRequest} from "@/store/api";

export default {
    state: {},
    getters: {},
    mutations: {},
    actions: {
        signIn({commit}) {
            return postRequest('https://oauth2.googleapis.com/token', {
                code: 'https://accounts.google.com/o/oauth2/token',
                client_id: '79912145008-rdltp746o1vdt3ouik0iaj3t83jdch22.apps.googleusercontent.com',
                client_secret: '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',
                redirect_uri: 'http://127.0.0.1:8000/api/google',
                grant_type: 'authorization_code',
            })
                .then(response => commit("setToken", response.access_token))
                .catch(error => Promise.reject(error));
        },
    },
}