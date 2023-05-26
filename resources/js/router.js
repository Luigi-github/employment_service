import { createRouter, createWebHistory } from 'vue-router';
import CompanyFormView from './views/CompanyFormView.vue';
import CompanyListView from './views/CompanyListView.vue';
import PersonFormView from './views/PersonFormView.vue';
import PersonListView from './views/PersonListView.vue';
import PositionFormView from './views/PositionFormView.vue';
import PositionListView from './views/PositionListView.vue';
import AvailablePositionListView from './views/AvailablePositionListView.vue';

const routes = [
    {
        path: '/',
        component: AvailablePositionListView,
    },
    {
        path: '/companies',
        component: CompanyListView,
    },
    {
        path: '/companies/:id',
        component: CompanyFormView,
    },
    {
        path: '/people',
        component: PersonListView,
    },
    {
        path: '/people/:id',
        component: PersonFormView,
    },
    {
        path: '/positions',
        component: PositionListView,
    },
    {
        path: '/positions/:id',
        component: PositionFormView,
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;
