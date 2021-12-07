
import BootstrapVue from "bootstrap-vue";
require('./bootstrap');
window.Vue = require('vue');

import {
    Form,
    HasError,
    AlertError,
    AlertErrors,
    AlertSuccess
    } from 'vform';

    window.Form = Form;
    Vue.component(HasError.name, HasError);
    Vue.component(AlertError.name, AlertError);
    Vue.component(AlertErrors.name, AlertErrors);
    Vue.component(AlertSuccess.name, AlertSuccess);

import * as VueGoogleMaps from 'vue2-google-maps';
Vue.use(VueGoogleMaps, {
    load: {
        key: 'AIzaSyBz-jO2cHx_PTk5Y5pdPY7uKqJig78LceU',
        region: 'AR',
        language: 'ar',
    },
});


import ToggleButton from 'vue-js-toggle-button';
Vue.use(ToggleButton);

import  VueEditor  from "vue2-editor";
Vue.use(VueEditor);



// ES6 Modules or TypeScript
import Swal from 'sweetalert2';
window.Swal = Swal;


const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
})
window.Toast = Toast;


import router from './router';

// Admin
Vue.component('navbar', require('./components/dashboard/global/navbar.vue').default);
Vue.component('mainapp', require('./components/dashboard/main-vue.vue').default);

import myDraggable from "vuedraggable";
Vue.component('draggable', myDraggable);

Vue.use(BootstrapVue)
const app = new Vue({
    el: '#app',
    router
});
