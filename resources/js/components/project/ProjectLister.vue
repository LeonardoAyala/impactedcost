<template>
    <div class="col-lg-6 col-md-12">
        <!-- Recent Updates Widget          -->
        <div id="new-updates" class="card updates recent-updated">
            <div id="updates-header" class="card-header d-flex justify-content-between align-items-center">
                <h2 class="h5 display"><a data-toggle="collapse" data-parent="#new-updates" href="#updates-box"
                        aria-expanded="true" aria-controls="updates-box">Procesos disponibles</a></h2><a
                    data-toggle="collapse" data-parent="#new-updates" href="#updates-box" aria-expanded="true"
                    aria-controls="updates-box"><i class="fa fa-angle-down"></i></a>
            </div>
            <div id="updates-box" role="tabpanel" class="collapse show">
                <ul class="news list-unstyled">
                    <!-- Item-->
                    <li v-for="project in projects" v-bind:data="project"
                            v-bind:key="project.id" class="d-flex justify-content-between">
                        <div class="left-col d-flex">
                            <div class="icon"><i class="fas fa-project-diagram"></i></div>
                            <div class="title"><strong>{{ project.title}}</strong>

                                            <div class="badge badge-primary">Text</div>

                                <p>{{project.description}}</p>
                                    <div class="CTAs">
                                            <a :href="'/environment/' + environment_id + '/project/' + project.id" class="btn btn-xs btn-dark"><i class="fa fa-glasses"> </i> Visitar</a>
                                            <button-complement icon="fa fa-cog" header=" Opciones"></button-complement>
                                        </div>
                            </div>
                        </div>
                        <div class="right-col text-right ">
                            <div class="update-date"><i class="fas fa-check-circle text-primary"></i></div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Recent Updates Widget End-->
    </div>

</template>

<script>
    import {
        mapGetters
    } from 'vuex';

    export default {
        name: "Projects",
        mounted() {
            this.$store.dispatch('fetchProjects', this.environment_id);
        },
        props: [
            'col_size',
            'header',
            'centered',
            'environment_id'
        ],
        data: function () {
            return {
                project: {
                    id: '',
                    code: '',
                    title: '',
                    project_category_id: '',
                    description: '',
                    initial_date: '',
                    project_id: '',
                    complete: '',
                    archived: '',
                    expected_budget: '',
                    active: '',
                },
            }
        },
        methods: {
            editEnvironment(project) {
                this.$store.dispatch('updateEnvironment', project);
                /*
                axios.post('/project/get/' + project.id).then(res => {
                    this.project = res.data;
                }).catch(err => {
                    console.log(err)
                })
                */
            },
            deleteEnvironment(project) {
                this.$store.dispatch('deleteEnvironment', project)
            },
            onOptions(project) {
                this.project = project;
            }
        },
        computed: {
            ...mapGetters([
                'projects'
            ])
        }
    }

</script>
