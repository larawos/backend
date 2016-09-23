import Vue from 'vue'

export const setLists = ({ dispatch, state }, module) => {

    Vue.http.get('/api/'+module).then((response) => {
        dispatch('SET_'+module.toUpperCase()+'S', response.json())
    })
    
}

export const setItem = ({ dispatch, state }, module, id) => {

    Vue.http.get('/api/'+module+'/'+id).then((response) => {
        dispatch('SET_'+module.toUpperCase(), response.json())
    })
    
}

export const delItem = ({ dispatch, state }, module, id) => {

    Vue.http.delete('/api/'+module+'/'+id).then((response) => {
        if (response.status == 200 && response.json().code == 200) {
            //
        }
    })
    
}

export const addItem = ({ dispatch, state }, module, data) => {

    Vue.http.post('/api/'+module, data).then((response) => {
        if (response.status == 200 && response.json().code == 200) {
            //
        }
    })
    
}

export const editItem = ({ dispatch, state }, module, id, data) => {

    Vue.http.put('/api/'+module+'/'+id, data).then((response) => {
        if (response.status == 200 && response.json().code == 200) {
            //
        }
    })
    
}

export const setForm = ({ dispatch, state }, data) => {
    dispatch('SET_FORM', data)
}

export const initForm = ({ dispatch, state }) => {
    dispatch('INIT_FORM')
}