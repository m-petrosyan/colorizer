import {createRouter, createWebHistory} from 'vue-router'
import HomeView from '../views/home/HomeView.vue'
import HexGenerate from "@/views/hex/HexGenerate.vue";
import ExploreHex from "@/views/hex/ExploreHex.vue";
import DashboardLayout from "@/components/layouts/DashboardLayout.vue";
import DashboardPalettes from "@/views/dashboard/DashboardPalettes.vue";

const router = createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: '/',
            name: 'home',
            component: HomeView,
        },
        {
            path: '/generate',
            name: 'generate',
            component: HexGenerate,
        },
        {
            path: '/explore',
            name: 'explore',
            component: ExploreHex,
        },
        {
            path: '/dashboard',
            component: DashboardLayout,
            children: [
                {
                    path: 'palettes',
                    name: 'db-palettes',
                    component: DashboardPalettes
                },
                {
                    path: 'palettes',
                    name: 'db-liked-palettes',
                    component: DashboardPalettes
                },
                {
                    path: 'palettes',
                    name: 'db-settings',
                    component: DashboardPalettes
                },
            ]
        },
    ]
})

export default router
