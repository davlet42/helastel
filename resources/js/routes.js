import Profile from './components/Profile.vue';
import Persons from './components/Persons.vue';

export default {
    routes: [{
            path: '/',
            component: Persons,
            name: 'persons',
            meta: {
                title: 'Persons'
            },
        },
        {
            path: '/profile',
            component: Profile,
            name: 'profile',
            meta: {
                title: 'Profile'
            },
        },
    ],
};
