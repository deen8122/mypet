import {createApp} from 'vue';
import App from './App.vue';
import ElementPlus from 'element-plus';
import 'element-plus/dist/index.css';
import httpClient from './axiosHttp';
import router from './router';

window.axiosInstance = httpClient;

createApp(App).use(router).use(ElementPlus).mount('#app');