window.$ = window.jQuery = require('jquery')
require('bootstrap-sass')

import _ from 'lodash'
import Vue from 'vue'
import Router from 'vue-router'
import Resource from 'vue-resource'

import app from './components/app.vue'
import container from './components/container.vue'
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

var content = {
    article: {
        index: require('./components/articles/index.vue'),
        show: require('./components/articles/show.vue'),
        edit: require('./components/articles/edit.vue')
    },
    course: {
        index: require('./components/articles/index.vue'),
        show: require('./components/articles/show.vue'),
        edit: require('./components/articles/edit.vue')
    },
    container: {template: '<router-view></router-view>'}
}

var page = {
    notFound: require('./components/pages/404.vue')
}

// Routing logic
var router = new Router({
  history: true,
  saveScrollPosition: true,
  linkActiveClass: 'active-link'
})

// Routes
router.map({
    '/': {
        component: container,
        subRoutes: {
            '/dashboard': {
                name:'dashboard',
                component: dashboard
            },
            '/content': {
                component: content.container,
                subRoutes: {
                    '/article': {
                        name:'content.article.index',
                        component: content.article.index
                    },
                    '/article/:id': {
                        name:'content.article.show',
                        component: content.article.show
                    },
                    '/article/:id/edit': {
                        name:'content.article.edit',
                        component: content.article.edit
                    },
                    '/course': {
                        name:'content.course.index',
                        component: content.course.index
                    },
                    '/course/:id': {
                        name:'content.course.show',
                        component: content.course.show
                    },
                    '/course/:id/edit': {
                        name:'content.course.edit',
                        component: content.course.edit
                    }
                }
            }
        }
    },
    '*': {
        component: page.notFound
    }
})

router.start(app, 'body')