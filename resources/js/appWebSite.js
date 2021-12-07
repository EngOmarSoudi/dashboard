
import BootstrapVue from "bootstrap-vue";
require('./bootstrap');
window.Vue = require('vue');
import { i18n } from './lang.js'
import LightGallery from 'vue-light-gallery';
Vue.use(LightGallery);


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

import AOS from 'aos'
import 'aos/dist/aos.css'

import router from './routerWebSite';

import { VueperSlides, VueperSlide } from "vueperslides";
import "vueperslides/dist/vueperslides.css";
Vue.component("vueper-slides", VueperSlides);
Vue.component("vueper-slide", VueperSlide);


// Website
// Vue.component('navbarindex', require('./components/website/global/MyNavbar.vue').default);
// Vue.component('footerwebsite', require('./components/website/global/Footer.vue').default);
// Vue.component('index', require('./components/website/index.vue').default);

Vue.use(BootstrapVue)
const app = new Vue({
    el: '#app',
    router,
    i18n,
    created() {
        AOS.init();
    },

});


