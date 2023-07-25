import './bootstrap';

import {createApp} from 'vue'
import router from './routes.js'
import axios from 'axios'; 
import App from './App.vue'

const app = createApp(App);

app.config.globalProperties.$http = axios;

app.use(router).mount("#app") 

