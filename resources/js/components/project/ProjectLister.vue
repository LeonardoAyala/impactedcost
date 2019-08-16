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
                    <li v-for="environment in environments" v-bind:data="environment"
                            v-bind:key="environment.id" class="d-flex justify-content-between">
                        <div class="left-col d-flex">
                            <div class="icon"><i class="fas fa-project-diagram"></i></div>
                            <div class="title"><strong>Lorem ipsum dolor sit amet.</strong>

                                            <div class="badge badge-primary">Text</div>

                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
                                    <div class="CTAs">
                                            <button-complement icon="fa fa-glasses" header=" Visitar"></button-complement>
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
        name: "Environments",
        mounted() {
            this.$store.dispatch('fetchEnvironments');
        },
        props: [
            'col_size',
            'header',
            'centered',
        ],
        data: function () {
            return {
                environment: {
                    id: '',
                    title: '',
                    description: '',
                    code: '',
                    password: '',
                    user_id: ''
                },
            }
        },
        methods: {
            editEnvironment(environment) {
                this.$store.dispatch('updateEnvironment', environment);
                /*
                axios.post('/environment/get/' + environment.id).then(res => {
                    this.environment = res.data;
                }).catch(err => {
                    console.log(err)
                })
                */
            },
            deleteEnvironment(environment) {
                this.$store.dispatch('deleteEnvironment', environment)
            },
            onOptions(environment) {
                this.environment = environment;
            }
        },
        computed: {
            ...mapGetters([
                'environments'
            ])
        }
    }

</script>
