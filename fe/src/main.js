import {createApp} from 'vue'
import App from './App.vue'
import router from './router'
import store from "@/store/index.js";
import './assets/style/main.scss'
import './assets/style/style.scss'

const app = createApp(App)

app.use(router).use(store)

app.mount('#app')
