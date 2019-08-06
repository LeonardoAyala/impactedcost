let mutations = {
    CREATE_ENVIRONMENT(state, environment) {
        state.environments.unshift(environment)
    },
    FETCH_ENVIRONMENTS(state, environments) {
        return state.environments = environments
    },
    DELETE_ENVIRONMENT(state, environment) {
        let index = state.environments.findIndex(item => item.id === environment.id)
        state.environments.splice(index, 1)
    }

}
export default mutations
