<template>
             <div class="col-lg-4 col-md-6">
                <!-- Daily Feed Widget-->
                <div id="daily-feeds" class="card updates daily-feeds">
                    <div id="feeds-header" class="card-header d-flex justify-content-between align-items-center">
                        <h2 class="h5 display"><a data-toggle="collapse" data-parent="#daily-feeds"
                                aria-expanded="true" aria-controls="feeds-box">Roles de colaborador </a></h2>
                        <div class="right-column">
                            <div class="badge badge-primary">10 messages</div><a data-toggle="collapse"
                                data-parent="#daily-feeds" href="#feeds-box" aria-expanded="true"
                                aria-controls="feeds-box"><i class="fa fa-angle-down"></i></a>
                        </div>
                    </div>
                    <div id="feeds-box" role="tabpanel" class="collapse show">
                        <div class="feed-box">
                            <ul class="feed-elements list-unstyled">
                                <!-- List-->
                                <li class="clearfix">
                                    <div class="feed d-flex justify-content-between">
                                        <div class="feed-body d-flex justify-content-between"><a href="#"
                                                class="feed-profile"><i class="fas fa-tags img-fluid rounded-circle"></i></a>
                                            <div class="content"><strong>Jason Doe</strong>
                                                <div class="full-date"><p>Something something.</p></div>

                                                <small>Lorem Ipsum is simply dummy text of the printing
                                                and typesetting industry.
                                                </small>

                                            </div>

                                        </div>
                                        <div class="date"><small>5min ago</small></div>
                                    </div>

                                    <div class="CTAs">
                                            <button-complement icon="fa fa-cog" header=" Opciones"></button-complement>
                                        </div>
                                </li>
                                    <li><a data-toggle="modal" data-target="#" rel="nofollow" href="" class="dropdown-item all-notifications text-center">
            <strong> <i class="icon"></i>Agregar Rol <i class="fa fa-plus"></i></strong></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Daily Feed Widget End-->
            </div>
</template>

<script>
    import {
        mapGetters
    } from 'vuex';

    export default {
        name: "Roles",
        mounted() {
            this.$store.dispatch('fetchSets', this.environment_id);
        },
        props: [
            'col_size',
            'header',
            'centered',
            'environment_id',
            'photo'
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
