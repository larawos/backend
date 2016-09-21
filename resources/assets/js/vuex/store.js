import Vue from 'vue'
import Vuex from 'vuex'
import array_merge from 'locutus/php/array/array_merge'

Vue.use(Vuex)

const state = {
    author: Laravel.author,
    form: {},
    articles: {},
    article: {}
}

const mutations = {
    SET_ARTICLES (state, articles) {
        state.articles = articles
    },
    SET_ARTICLE (state, article) {
        state.article = article
    },
    SET_AUTHOR (state, author) {
        state.author = author
    },
    SET_FORM (state, data) {
        state.form = array_merge(state.form, data)
    }
}

export default new Vuex.Store({
  state,
  mutations
})