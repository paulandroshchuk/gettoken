
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Dashboard
Vue.component('dashboard-component', require('./components/DashboardComponent.vue'));

// Projects
Vue.component('create-project', require('./components/projects/CreateProject.vue'));

const app = new Vue({
    el: '#app'
});
