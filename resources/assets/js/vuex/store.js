import Vue from 'vue'
import Vuex from 'vuex'
import array_merge from 'locutus/php/array/array_merge'

Vue.use(Vuex)

const state = {
    author: Laravel.author,
    form: {traits:[]},
    categorys: [
        {
            id:1,
            name:'Framework',
            types: [
                {id:1,category_id:1,icon:'<i class="fa fa-check"><i/>',name:'laravel'},
                {id:2,category_id:1,icon:'<i class="fa fa-check"><i/>',name:'yii'},
                {id:3,category_id:1,icon:'<i class="fa fa-check"><i/>',name:'tp'},
            ]
        },
        {
            id:2,
            name:'Language',
            types: [
                {id:4,category_id:2,icon:'<i class="fa fa-check"><i/>',name:'php'},
                {id:5,category_id:2,icon:'<i class="fa fa-check"><i/>',name:'java'},
                {id:6,category_id:2,icon:'<i class="fa fa-check"><i/>',name:'python'},
            ]
        },
        {
            id:3,
            name:'System',
            types: [
                {id:7,category_id:3,icon:'<i class="fa fa-check"><i/>',name:'window'},
                {id:8,category_id:3,icon:'<i class="fa fa-check"><i/>',name:'linux'},
                {id:9,category_id:3,icon:'<i class="fa fa-check"><i/>',name:'mac'}
            ]
        }
    ],
    articles: {},
    article: {}
}

const mutations = {
    SET_AUTHOR (state, author) {
        state.author = author
    },
    SET_FORM (state, data) {
        state.form = array_merge(state.form, data)
    },
    SET_CATEGORYS (state, categorys) {
        state.categorys = categorys
    },
    SET_ARTICLES (state, articles) {
        state.articles = articles
    },
    SET_ARTICLE (state, article) {
        state.article = article
    }
}

export default new Vuex.Store({
  state,
  mutations
})