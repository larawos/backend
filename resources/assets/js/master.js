import Vue from 'vue'
import Router from 'vue-router'
import Resource from 'vue-resource'
import tagsinput from '../plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js'

Vue.use(Router)
Vue.use(Resource)

Vue.http.interceptors.push((request, next) => {
    request.headers['X-CSRF-TOKEN'] = Laravel.csrfToken;
    request.headers['Accept'] = 'application/json';
    request.headers['Authorization'] = 'Bearer ' + Laravel.author.api_token;

    next();
});

Vue.config.devtools = true
Vue.config.debug = true

// Routing logic
var router = new Router({
  history: true,
  saveScrollPosition: true,
  linkActiveClass: 'active-link'
})

// Routes
router.map({
    '/': {
        component: require('./components/container.vue'),
        subRoutes: {
            '/dashboard': {
                name:'dashboard',
                component: require('./components/dashboard.vue')
            },
            '/content': {
                component: {template: '<router-view></router-view>'},
                subRoutes: {
                    '/article': {
                        name:'content.article.index',
                        component: require('./components/articles/index.vue')
                    },
                    '/article/:id': {
                        name:'content.article.show',
                        component: require('./components/articles/show.vue')
                    },
                    '/article/create': {
                        name:'content.article.create',
                        component: require('./components/articles/create.vue')
                    },
                    '/article/:id/edit': {
                        name:'content.article.edit',
                        component: require('./components/articles/edit.vue')
                    },
                    '/course': {
                        name:'content.course.index',
                        component: require('./components/articles/index.vue')
                    },
                    '/course/:id': {
                        name:'content.course.show',
                        component: require('./components/articles/show.vue')
                    },
                    '/course/create': {
                        name:'content.course.create',
                        component: require('./components/articles/create.vue')
                    },
                    '/course/:id/edit': {
                        name:'content.course.edit',
                        component: require('./components/articles/edit.vue')
                    }
                }
            }
        }
    },
    '*': {
        component: require('./components/pages/404.vue')
    }
})

router.start(require('./components/app.vue'), 'body')