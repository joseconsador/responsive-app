require('./bootstrap');

import { createApp } from 'vue';
import Contact from './components/Contact.vue';

const app = createApp({});
app.component('Contact', Contact);
app.mount('#app');