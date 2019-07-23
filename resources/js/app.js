/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import $ from 'jquery';
window.$ = window.jQuery = $;


import 'jquery-ui/ui/widgets/datepicker.js';
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('navbar-dropdown', require('./components/navbar/NavbarDropdownItem.vue').default);

Vue.component('navigation-menu', require('./components/sidebar/NavigationMenu.vue').default);
Vue.component('navigation-item', require('./components/sidebar/NavigationItem.vue').default);
Vue.component('navigation-dropdown', require('./components/sidebar/NavigationDropdownItem.vue').default);

Vue.component('section-component', require('./components/SectionComponent.vue').default);

Vue.component('environment-lister', require('./components/EnvironmentLister.vue').default);
Vue.component('environment-item', require('./components/EnvironmentItem.vue').default);

Vue.component('widget-count', require('./components/CountWidget.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});

$( ".week-picker" ).datepicker({
    dateFormat: "dd-mm-yy",
    showOtherMonths: true,
    selectOtherMonths: true,
    changeMonth: true,
    changeYear: true
});

