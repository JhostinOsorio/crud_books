require('./bootstrap');

import 'jquery/dist/jquery'
import 'popper.js/dist/popper'
import 'bootstrap/dist/js/bootstrap';

import Vue from 'vue';
import swal from 'sweetalert';

const axios = require('axios')

Vue.component('table-book', require('./components/TableComponent.vue').default);
Vue.component('modal-book', require('./components/ModalComponent.vue').default);
Vue.component('container-book', require('./components/BookComponent.vue').default);

const app = new Vue({
    el: "#app"
})
