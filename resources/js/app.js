require('./bootstrap');

import {
    createApp
} from 'vue';
import App from './components/App.vue';
import Persons from './components/Persons.vue';

import {
    createRouter,
    createWebHistory
} from 'vue-router';
import routes from './routes.js';

const app = createApp({
    components: {
        App,
        Persons
    }
});

const router = createRouter({
    history: createWebHistory(),
    routes: routes.routes,
});

app.use(router);
app.mount('#app');
