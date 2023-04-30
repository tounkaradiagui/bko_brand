import { createApp } from 'vue';
// import vue from "vue-router";

// app.mount('#app');

import {createRouter, createWebHistory} from "vue-router";

import Routes from './routes.js';

const app = createApp({});

const router = createRouter({
    routes: Routes,
    history: createWebHistory(),
});

app.use(router);
app.mount('#app');
