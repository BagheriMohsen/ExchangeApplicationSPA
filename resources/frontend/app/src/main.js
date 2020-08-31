import Vue from 'vue'
import App from './App.vue'
import router from './router'
import axios from 'axios'
import vuetify from './plugins/vuetify';
import '@/assets/css/custom.css';
import VueSimpleAlert from "vue-simple-alert";
import './registerServiceWorker'






Vue.use(VueSimpleAlert);
Vue.config.productionTip = false

axios.defaults.baseURL = 'http://localhost:8000/'
Vue.prototype.$http = axios

// export var OneSignal = window.OneSignal || [];

new Vue({
    router,
    vuetify,
    render: h => h(App)
}).$mount('#app')
