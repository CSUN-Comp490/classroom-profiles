
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// Vue.component('example-component', require('./components/ExampleComponent.vue'));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('topnavbar', require('./components/topnavbar.vue').default);
Vue.component('welcome', require('./components/welcome.vue').default);
Vue.component('equipment', require('./components/equipment.vue').default);
Vue.component('equipmentdata', require('./components/equipmentdata.vue').default);
Vue.component('modal', require('./components/modal.vue').default);
Vue.component('login', require('./components/login.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app'
});
