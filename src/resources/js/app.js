
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

Vue.component('home', require('./components/Home.vue'));
Vue.component('navbar', require('./components/Navbar.vue'));
Vue.component('bottombar', require('./components/Bottombar.vue'));
Vue.component('profile', require('./components/Profile.vue'));

const app = new Vue({
    el: '#app'
});
