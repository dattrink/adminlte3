require('./bootstrap');

// import Alpine from 'alpinejs';
import jQuery from 'jquery';
import '@fortawesome/fontawesome-free/js/all.js';
import 'bootstrap';

// window.Alpine = Alpine;

// Alpine.start();

window.$ = jQuery;
window.jQuery = jQuery;

require('./../plugins/AdminLTE-3.2.0/js/adminlte');
require('./../plugins/AdminLTE-3.2.0/js/demo');
