
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import VueRouter  from 'vue-router'
import Vue from 'vue'

Vue.use(VueRouter);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const dataImport = Vue.component('dataImport', require('./components/DataImport.vue'));
const transactions = Vue.component('transactions', require('./components/Transactions.vue'));
const transaction = Vue.component('transaction', require('./components/Transaction.vue'));

const router = new VueRouter({
    routes: [
        { path: '/', component: transactions },
        { path: '/import', component: dataImport},
        { path: '/transaction/:transactionId', component: transaction},
        { path: '/transactions', component: transactions },
    ]
});

const app = new Vue({
    el: '#app',
    router
});

