// resources/js/router/index.js
import { createRouter, createWebHistory } from 'vue-router';
import Welcome from '../components/outer/Welcome.vue';
import About from '../components/ExampleComponent.vue';
import Register from '../components/outer/Register.vue';
import Home from '../components/inner/home/Home.vue';

const routes = [
    { path: '/', name: 'Bem Vindo', component: Welcome },
    { path: '/registration', name: 'Registrar', component: Register },
    { path: '/home', name: 'Home', component: Home },
]

const router = createRouter({
    history: createWebHistory(),
    routes,
})

export default router