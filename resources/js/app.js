
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import VueRouter from 'vue-router';

import index from './components/index.vue';
import history from './components/history.vue';

// require('./bootstrap');
require('../../public/css/mmfuel-pwa.css');
require('../../public/css/vue-transition.css');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.use(VueRouter);

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const routes = [
    { path: '/', name: 'root-view', component: index },
    { path: '/history', name: 'history-view', component: history },
    { path: '/testvue/', name: 'test-view', component: index }
];

const router = new VueRouter({
    routes // `routes: routes` の短縮表記
});

const app = new Vue({
    el: '#app',
    data: {
        pageTransition: 'forward'
    },
    router: router,
    watch: {
        '$route': function (to, from) {
            if (to.path == '/history' && from.path == '/') {
                this.pageTransition = 'forward';
            }else if(to.path == '/' && from.path == '/history') {
                this.pageTransition = 'back';
            }
            // console.log(to.path+' '+from.path);
        }
    }
});
