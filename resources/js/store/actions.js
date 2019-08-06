let actions = {
    createEnvironment({commit}, environment) {
        axios.post('/addEnvironment', environment)
            .then(res => {
                commit('CREATE_ENVIRONMENT', res.data)
            }).catch(err => {
            console.log(err)
        })

    },
    fetchEnvironments({commit}) {
        axios.get('/api/environment')
            .then(res => {
                commit('FETCH_ENVIRONMENTS', res.data)
            }).catch(err => {
            console.log(err)
        })
    },
    deletePost({commit}, environment) {
        axios.delete(`/api/environment/${environment.id}`)
            .then(res => {
                if (res.data === 'ok')
                    commit('DELETE_ENVIRONMENT', environment)
            }).catch(err => {
            console.log(err)
        })
    }
}

export default actions
