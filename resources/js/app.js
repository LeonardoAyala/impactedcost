/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

//require('./bootstrap');

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.Vue = require('vue');
import store from './store/index';
import VueRouter from 'vue-router';
//import {routes} from './routes';
//import ModalEnvAdd from './components/environment/EnvironmentModalAdd.vue'

Vue.use(VueRouter);

const router = new VueRouter({
    router,
    mode: 'history'
});


import { Form, HasError, AlertError } from 'vform';

window.Form = Form;
Vue.component(HasError.name, HasError);
Vue.component(AlertError.name, AlertError);

import $ from 'jquery';
window.$ = window.jQuery = $;


import 'jquery-ui/ui/widgets/datepicker.js';

//Projects
Vue.component('project-lister', require('./components/project/ProjectLister.vue').default);
//Vue.component('project-item', require('./components/project/ProjectLister.vue').default);

Vue.component('tab-item', require('./components/tabs/TabItem.vue').default);

Vue.component('breadcrumb-item', require('./components/breadcrumb/BreadcrumbItem.vue').default);

Vue.component('button-complement', require('./components/form/ButtonComplement.vue').default);
Vue.component('button-item', require('./components/form/ButtonItem.vue').default);
Vue.component('input-item', require('./components/form/InputItem.vue').default);

Vue.component('modal-env-add', require('./components/environment/EnvironmentModalAdd.vue').default);
Vue.component('modal-component', require('./components/form/ModalComponent.vue').default);

Vue.component('navbar-action-item', require('./components/navbar/NavbarActionItem.vue').default);
Vue.component('navbar-layered-item', require('./components/navbar/NavbarLayeredItem.vue').default);
Vue.component('navbar-item', require('./components/navbar/NavbarItem.vue').default);
Vue.component('navbar-dropdown', require('./components/navbar/NavbarDropdownItem.vue').default);

Vue.component('navigation-menu', require('./components/sidebar/NavigationMenu.vue').default);
Vue.component('navigation-item', require('./components/sidebar/NavigationItem.vue').default);
Vue.component('navigation-dropdown', require('./components/sidebar/NavigationDropdownItem.vue').default);

Vue.component('section-component', require('./components/section/SectionComponent.vue').default);

Vue.component('environment-lister', require('./components/environment/EnvironmentLister.vue').default);
Vue.component('environment-item', require('./components/environment/EnvironmentItem.vue').default);

Vue.component('widget-count', require('./components/CountWidget.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


const app = new Vue({
    el: '#app',
    store,
    router,
    components: {
    }
});

$( ".week-picker" ).datepicker({
    dateFormat: "dd-mm-yy",
    showOtherMonths: true,
    selectOtherMonths: true,
    changeMonth: true,
    changeYear: true
});

