import Vue from 'vue'
import App from './App.vue'
import router from './router'
import vuetify from './vuetify'
import axios from 'axios'
import VueAxios from 'vue-axios'
import Notify from 'vue2-notify'
import iView from 'iview'
import 'iview/dist/styles/iview.css'

import VueI18n from 'vue-i18n'
import i18n from './plugins/i18n';

Vue.use(vuetify);

Vue.use(VueAxios, axios)
import { BModal, BootstrapVue, IconsPlugin } from 'bootstrap-vue'

// Import Bootstrap an BootstrapVue CSS files (order is important)
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
// Make BootstrapVue available throughout your project

import "bootstrap/dist/css/bootstrap.css"
import "bootstrap/dist/js/bootstrap.js"
Vue.use(BootstrapVue)
// Optionally install the BootstrapVue icon components plugin
Vue.use(IconsPlugin)
Vue.use(Notify)
Vue.use(iView);
Vue.use(VueI18n);

Vue.prototype.$hostname = 'metmarket/idrovalencia'
new Vue({
    i18n,
    router,
    vuetify,
    render: h => h(App)
}).$mount('#app')

