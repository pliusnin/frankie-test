import Vue from 'vue'
import App from './App.vue'
import store from './store'
import BootstrapVue from 'bootstrap-vue'
import axios from 'axios';
import vueAxios from 'vue-axios';

import './styles/app.scss'

const client = axios.create({
  baseURL: 'http://localhost',
});

Vue.use(vueAxios, client);
Vue.use(BootstrapVue);
Vue.config.productionTip = false;

new Vue({
  store,
  render: h => h(App)
}).$mount('#app');
