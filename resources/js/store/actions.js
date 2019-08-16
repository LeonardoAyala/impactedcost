let actions = {

    //Environment
    createEnvironment({commit}, environment) {
        axios.post('/environment', environment)
            .then(res => {
                commit('CREATE_ENVIRONMENT', res.data)
            }).catch(err => {
            console.log(err)
        })
    },
    joinEnvironment({commit}, environment) {
        axios.post('/environment/join', environment)
            .then(res => {
                commit('JOIN_ENVIRONMENT', res.data.environment)
            }).catch(err => {
            console.log(err)
        })
    },
    fetchEnvironments({commit}) {
        axios.get('/environment')
            .then(res => {
                commit('FETCH_ENVIRONMENTS', res.data)
            }).catch(err => {
            console.log(err)
        })
    },
    updateEnvironment({commit}, environment) {
        axios.put(`/environment/${environment.id}`, environment)
            .then(res => {
                commit('UPDATE_ENVIRONMENT', res.data.environment)
            }).catch(err => {
            console.log(err)
        })
    },
    deleteEnvironment({commit}, environment) {
        axios.delete(`/environment/${environment.id}`)
            .then(res => {
                if (res.data === 'ok')
                    commit('DELETE_ENVIRONMENT', environment)
            }).catch(err => {
            console.log(err)
        })
    },

    //Sets
    createSet({commit}, environment_id, set) {
        axios.post(`/environment/${environment_id}/set`, set)
            .then(res => {
                commit('CREATE_SET', res.data)
            }).catch(err => {
            console.log(err)
        })
    },
    fetchSets({commit}, environment_id) {
        axios.get(`/environment/${environment_id}/set`)
            .then(res => {
                commit('FETCH_SETS', res.data)
            }).catch(err => {
            console.log(err)
        })
    },
    updateSet({commit}, environment_id, set) {
        axios.put(`/environment/${environment_id}/set/${set.id}`, set)
            .then(res => {
                commit('UPDATE_SET', res.data.set)
            }).catch(err => {
            console.log(err)
        })
    },
    deleteSet({commit}, environment_id, set) {
        axios.delete(`/environment/${environment_id}/set/${set.id}`)
            .then(res => {
                if (res.data === 'ok')
                    commit('DELETE_SET', set)
            }).catch(err => {
            console.log(err)
        })
    },

    //Projects
    createProject({commit}, environment_id, project) {
        axios.post(`/environment/${environment_id}/project`, project)
            .then(res => {
                commit('CREATE_PROJECT', res.data)
            }).catch(err => {
            console.log(err)
        })
    },
    fetchProjects({commit}, environment_id) {
        axios.get(`/environment/${environment_id}/project`)
            .then(res => {
                commit('FETCH_PROJECTS', res.data)
            }).catch(err => {
            console.log(err)
        })
    },
    updateProject({commit}, environment_id, project) {
        axios.put(`/environment/${environment_id}/project/${project.id}`, project)
            .then(res => {
                commit('UPDATE_PROJECT', res.data.project)
            }).catch(err => {
            console.log(err)
        })
    },
    deleteProject({commit}, environment_id, project) {
        axios.delete(`/environment/${environment_id}/project/${project.id}`)
            .then(res => {
                if (res.data === 'ok')
                    commit('DELETE_PROJECT', project)
            }).catch(err => {
            console.log(err)
        })
    },
}

export default actions
