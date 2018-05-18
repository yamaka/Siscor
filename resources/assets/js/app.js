
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./inspinia');

window.Vue = require('vue');
/* require('./bootstrap-vue')
Vue.use(BootstrapVue); */


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('direction-index', require('./components/direction/Index.vue'));
Vue.component('roadmap-table', require('./components/RoadMap/Index.vue'));
Vue.component('create-roadmap', require('./components/RoadMap/FormCreate.vue'));
Vue.component('derivate-roadmap', require('./components/RoadMap/FormDerive.vue'));


const app = new Vue({
    el: '#app'
});
