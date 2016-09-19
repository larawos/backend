window.$ = window.jQuery = require('jquery')
require('bootstrap-sass')

import _ from 'lodash'
import Vue from 'vue'
import Router from 'vue-router'
import Resource from 'vue-resource'

import dashboard from './components/dashboard.vue'

Vue.use(Router)
Vue.use(Resource)

Vue.http.interceptors.push((request, next) => {
    request.headers['X-CSRF-TOKEN'] = Laravel.csrfToken;
    request.headers['Accept'] = Laravel.accept;
    request.headers['Authorization'] = 'Bearer ' + Laravel.authorization;

    next();
});

Vue.config.devtools = true
Vue.config.debug = true

var App = Vue.extend({})

var article = {
    index: require('./components/articles/index.vue'),
    show: require('./components/articles/show.vue'),
    edit: require('./components/articles/edit.vue')
}

var course = {
    index: require('./components/articles/index.vue'),
    show: require('./components/articles/show.vue'),
    edit: require('./components/articles/edit.vue')
}

// Routing logic
var router = new Router({
  history: true,
  saveScrollPosition: true,
  root: '/admin',
  linkActiveClass: 'active-link'
})

// Routes
router.map({
    '/dashboard': {
        name:'dashboard',
        component: dashboard
    },
    '/article': {
        name:'article.index',
        component: article.index
    },
    '/article/:id': {
        name:'article.show',
        component: article.show
    },
    '/article/:id/edit': {
        name:'article.edit',
        component: article.edit
    },
    '/course': {
        name:'course.index',
        component: course.index
    },
    '/course/:id': {
        name:'course.show',
        component: course.show
    },
    '/course/:id/edit': {
        name:'course.edit',
        component: course.edit
    },
})

router.start(App, 'body')

const app = new Vue({
    el: 'body'
});
