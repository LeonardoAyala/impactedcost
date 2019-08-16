let mutations = {
    //Environment
    CREATE_ENVIRONMENT(state, environment) {
        state.environments.unshift(environment)
    },
    JOIN_ENVIRONMENT(state, environment) {
        state.environments.unshift(environment)
    },
    FETCH_ENVIRONMENTS(state, environments) {
        return state.environments = environments
    },
    UPDATE_ENVIRONMENT(state, environment) {
        let index = state.environments.findIndex(item => item.id === environment.id)
        Vue.set(state.environments, index, environment)
    },
    DELETE_ENVIRONMENT(state, environment) {
        let index = state.environments.findIndex(item => item.id === environment.id)
        state.environments.splice(index, 1)
    },

    //Project
    CREATE_PROJECT(state, project) {
        state.projects.unshift(project)
    },
    FETCH_PROJECTS(state, projects) {
        return state.projects = projects
    },
    UPDATE_PROJECT(state, project) {
        let index = state.projects.findIndex(item => item.id === project.id)
        Vue.set(state.projects, index, project)
    },
    DELETE_PROJECT(state, project) {
        let index = state.projects.findIndex(item => item.id === project.id)
        state.projects.splice(index, 1)
    }
}
export default mutations
