import Vue from 'vue'
import Vuex from 'vuex'
import array_merge from 'locutus/php/array/array_merge'

Vue.use(Vuex)

const state = {
    author: Laravel.author,
    form: {},
    categorys: [],
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
    },
    INIT_FORM (state, data) {
        state.form = {thumb: 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAJYAAACWBAMAAADOL2zRAAAAG1BMVEUyQE7////Lz9Kyt7zl5+hLV2SYn6Zlb3p+h5C1Qm8QAAABi0lEQVRoge2TvW/CMBDFLwTijD1jSMakSj9GIrXqmgCqGKFEnYNE9wBDV+hfXtuQdCqp1HZp30+K7l7sPPucMxEAAAAAAAAAAAAAAOAv0Rn9nJeT/Y7XI62/5Wy9nhOeVESy4KgRhbUd62cX8/Vcx2WuHlq9PFaXPCSa8v2HyEsznJa0ZJlwn8jnccJlm9dqNieREMUhNUIoO1wMKJ5pnzyibkC0zVq8hJof83RPjXBDG7yhL82LIiQnOFvg0cu1k/yMVvqYatEZ2GEhO8ExksvypdWrazeuPz5or1o4F8dxdUp0yW/MV21eTmSSxYA2usZa1L2iTok5PrHm6kv7Sge0KKkRp+30ZNcWK/pWplGLlz0ijwNyRtQIc0yHPXl9T5ppRShMrCv/1EuoSv90ObT11cJXlc8hbYJefmN6YiRY98YmO+dlajro7pSvkrpm1VqkKlc81c35dOrVLauE9+e8XL2X3p25NQl5ZtVa+LGs3vhWv9nlPJnb2HKHAAAAAAAAAAAAAAAA/5d3QBw11isRkt4AAAAASUVORK5CYII='}
    }
}

export default new Vuex.Store({
  state,
  mutations
})