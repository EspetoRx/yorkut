// resources/js/router/index.js
import { createRouter, createWebHistory } from 'vue-router';
import Welcome from '../components/outer/Welcome.vue';
import About from '../components/ExampleComponent.vue';
import Register from '../components/outer/Register.vue';

const routes = [
    { path: '/', name: 'Wellcome', component: Welcome },
    { path: '/register', name: 'Registrar', component: Register },
]

const router = createRouter({
    history: createWebHistory(),
    routes,
})

export default router