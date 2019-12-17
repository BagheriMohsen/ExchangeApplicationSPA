/*!

=========================================================
* Vue Argon Dashboard - v1.0.0
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright 2019 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md)

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

*/
import Vue from 'vue'
// import BootstrapVue from 'bootstrap-vue'
import App from './App.vue'
import router from './router'
import './registerServiceWorker'
import ArgonDashboard from './plugins/argon-dashboard'
import axios from 'axios'
import VueToastr from "vue-toastr";
import CKEditor from '@ckeditor/ckeditor5-vue';
import {ClientTable} from 'vue-tables-2';


Vue.use( CKEditor );
Vue.use(VueToastr);
Vue.prototype.$http = axios
Vue.config.productionTip = false
Vue.use(ArgonDashboard)
Vue.use(ClientTable);


new Vue({
  router,
  render: h => h(App)
}).$mount('#app')
