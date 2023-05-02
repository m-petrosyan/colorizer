import {createStore} from 'vuex'
import user from "@/store/modules/user";


export default createStore({
    state: {
        task: [1, 2],
    },
    getters: {
        getTask: (state) => state.task
    },
    mutations: {},
    actions: {},
    modules: {
        user,
    }
})
