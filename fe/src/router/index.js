import {createRouter, createWebHistory} from 'vue-router'
import HomeView from '../views/HomeView.vue'
import HexGenerate from "@/views/HexGenerate.vue";
import ExploreHex from "@/views/ExploreHex.vue";

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes: [
        {
            path: '/',
            name: 'home',
            component: HomeView,
        },
        {
            path: '/hex',
            name: 'hex',
            component: HexGenerate,
        },
        {
            path: '/explore',
            name: 'explore',
            component: ExploreHex,
        }
    ]
})

export default router
