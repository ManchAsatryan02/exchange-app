import { createRouter, createWebHistory } from "vue-router";
import List from "./pages/List.vue";
import History from "./pages/History.vue";
import NotFounde from "./pages/NotFounde.vue";

const router = createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: '/',
            name: 'currency.list.home',
            component: List
        },
        {
            path: '/currency/list',
            name: 'currency.list',
            component: List
        },
        {
            path: '/currency/history/:slug/:slug_date',
            name: 'currency.history',
            component: History
        },
        {
            path: '/:pathMatch(.*)*',
            name: 'notfounde',
            component: NotFounde 
        }
    ]
})

export default router
