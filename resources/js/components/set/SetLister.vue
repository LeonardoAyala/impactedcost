<template>
             <div class="col-lg-4 col-md-12">
                <!-- Recent Updates Widget          -->
                 <div id="daily-feeds" class="card updates daily-feeds">
                    <div id="feeds-header" class="card-header d-flex justify-content-between align-items-center">
                        <h2 class="h5 display"><a data-toggle="collapse" data-parent="#daily-feeds" href="#feeds-box"
                                aria-expanded="true" aria-controls="feeds-box">Sets de tareas </a></h2>
                        <div class="right-column">
                            <div class="badge badge-primary">10 messages</div><a data-toggle="collapse"
                                data-parent="#daily-feeds" href="#feeds-box" aria-expanded="true"
                                aria-controls="feeds-box"><i class="fa fa-angle-down"></i></a>
                        </div>
                    </div>
                    <div id="feeds-box" role="tabpanel" class="collapse show">
                        <ul class="news list-unstyled">
                            <!-- Item-->
                            <li v-for="set in sets" v-bind:data="set"
                            v-bind:key="set.id" class="d-flex justify-content-between">
                                <div class="left-col d-flex">
                                    <div class="icon"><i class="fas fa-bookmark"></i></div>
                                    <div class="title"><strong>Lorem ipsum dolor sit amet.</strong>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                            tempor.</p>
                                    </div>
                                </div>
                                <div class="right-col text-right">
                                    <div class="update-date">24<span class="month">Jan</span></div>
                                </div>
                            </li>
        <navbar-action-item url="#" modal_target="addEnv" icon_r="fa fa-plus" header="Crear nuevo set"/>
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
        name: "Sets",
        mounted() {
            this.$store.dispatch('fetchSets', this.environment_id);
        },
        props: [
            'col_size',
            'header',
            'centered',
            'environment_id',
            'object_id'
        ],
        data: function () {
            return {
                set: {
                    id: '',
                    name: '',
                    description: '',
                    active: '',
                    environment_id: ''
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
