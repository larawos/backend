import Vue from 'vue'
import Vuex from 'vuex'
import array_merge from 'locutus/php/array/array_merge'

Vue.use(Vuex)

const state = {
    articles: {},
    article: {}
}

const mutations = {
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