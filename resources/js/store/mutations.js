let mutations = {
    CREATE_ENVIRONMENT(state, environment) {
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
    }

}
export default mutations
