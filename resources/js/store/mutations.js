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
    },

    //Sets
    CREATE_SET(state, set) {
        state.sets.unshift(set)
    },
    FETCH_SETS(state, sets) {
        return state.sets = sets
    },
    UPDATE_SET(state, set) {
        let index = state.sets.findIndex(item => item.id === set.id)
        Vue.set(state.sets, index, set)
    },
    DELETE_SET(state, set) {
        let index = state.sets.findIndex(item => item.id === set.id)
        state.sets.splice(index, 1)
    },

    //Roles
    CREATE_ROLE(state, role) {
        state.roles.unshift(role)
    },
    FETCH_ROLES(state, roles) {
        return state.roles = roles
    },
    UPDATE_ROLE(state, role) {
        let index = state.roles.findIndex(item => item.id === role.id)
        Vue.role(state.roles, index, role)
    },
    DELETE_ROLE(state, role) {
        let index = state.roles.findIndex(item => item.id === role.id)
        state.roles.splice(index, 1)
    },

    //CoUsers
    CREATE_COUSER(state, couser) {
        state.cousers.unshift(couser)
    },
    FETCH_COUSERS(state, cousers) {
        return state.cousers = cousers
    },
    UPDATE_COUSER(state, couser) {
        let index = state.cousers.findIndex(item => item.id === couser.id)
        Vue.couser(state.cousers, index, couser)
    },
    DELETE_COUSER(state, couser) {
        let index = state.cousers.findIndex(item => item.id === couser.id)
        state.cousers.splice(index, 1)
    },
}
export default mutations
