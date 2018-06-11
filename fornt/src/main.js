// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import App from './App'
import router from './router'
import axios from 'axios'
import ElementUI from 'element-ui';
// import common from './methods/common';
import 'element-ui/lib/theme-chalk/index.css';
// import $ from 'jquery'
// import 'bootstrap/dist/js/bootstrap.min.js'
// import 'bootstrap/dist/css/bootstrap.min.css'
Vue.config.productionTip = false
Vue.prototype.$axios = axios
Vue.use(ElementUI);
// Vue.use(common);
/* eslint-disable no-new */
new Vue({
  el: '#app',
  router,
  components: { App },
  template: '<App/>'
})
