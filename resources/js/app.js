
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
window.Vue = require('vue');
import Vue from 'vue'

import Vuetify from 'vuetify'

Vue.use(Vuetify)

import 'vuetify/dist/vuetify.min.css'

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const VueUploadComponent = require('vue-upload-component')
Vue.component('file-upload', VueUploadComponent)
Vue.component('example-component', require('./components/ExampleComponent.vue').default);

Vue.component('Chat', require('./components/Chat.vue').default);
Vue.component('PrivateChat', require('./components/PrivateChat.vue').default);

// const app = new Vue({
//     el: '#app'
// });
const app = new Vue({
    el: '#app',
   vuetify: new Vuetify(),
});
