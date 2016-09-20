import Vue from 'vue'

export const setLists = ({ dispatch, state }, module) => {

    Vue.http.get('/api/'+module).then((response) => {
        dispatch('SET_'+module.toUpperCase()+'S', response.json())
    })
    
}

export const setItem = ({ dispatch, state }, module, id) => {

    if (typeof(state.articles.data) != 'undefined') {
        for (var i = 0; i < state.articles.data.length; i++) {
            if (state.articles.data[i].id == id) {
                return dispatch('SET_'+module.toUpperCase(), state.articles.data[i])
            }
        }
    }

    Vue.http.get('/api/'+module+'/'+id).then((response) => {
        dispatch('SET_'+module.toUpperCase(), response.json())
    })
    
}

export const delItem = ({ dispatch, state }, module, id) => {

    Vue.http.delete('/api/'+module+'/'+id).then((response) => {
        if (response.status == 200 && response.json().code == 200) {
            Vue.http.get('/api/'+module).then((response) => {
                dispatch('SET_'+module.toUpperCase()+'S', response.json())
            })
        }
    })
    
}