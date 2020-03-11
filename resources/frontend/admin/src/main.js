import Vue from 'vue'
import App from './App.vue'
import router from './router'
import './registerServiceWorker'
import ArgonDashboard from './plugins/argon-dashboard'
import axios from 'axios'
import VueToastr from "vue-toastr";
import CKEditor from '@ckeditor/ckeditor5-vue';
import {ServerTable, ClientTable, Event} from 'vue-tables-2';

axios.defaults.headers.post["Content-Type"] = "application/json";
axios.defaults.baseURL = 'http://localhost:8000/'
Vue.use( CKEditor );
Vue.use(VueToastr);
Vue.prototype.$http = axios
Vue.config.productionTip = false
Vue.use(ArgonDashboard)
Vue.use(ClientTable)


new Vue({
  router,
  render: h => h(App)
}).$mount('#app')
