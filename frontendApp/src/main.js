import Vue from 'vue'
import App from './App.vue'
import store from './store'
import BootstrapVue from 'bootstrap-vue'
import axios from 'axios';
import vueAxios from 'vue-axios';
import vSelect from 'vue-select'

import './styles/app.scss'

const client = axios.create({
  baseURL: 'http://frankie.symfonyart.com',
});

Vue.use(vueAxios, client);
Vue.use(BootstrapVue);
Vue.component('v-select', vSelect);

Vue.config.productionTip = false;

new Vue({
  store,
  render: h => h(App)
}).$mount('#app');
