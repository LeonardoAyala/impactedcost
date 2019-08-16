<template>
    <div class="col-lg-4 col-md-6">
        <!-- Daily Feed Widget-->
        <div id="daily-couser" class="card updates daily-feeds">
            <div id="couser-header" class="card-header d-flex justify-content-between align-items-center">
                <h2 class="h5 display"><a data-toggle="collapse" data-parent="#daily-couser" href="#couser-box"
                        aria-expanded="true" aria-controls="couser-box">Your daily Feeds </a></h2>
                <div class="right-column">
                    <div class="badge badge-primary">10 messages</div><a data-toggle="collapse"
                        data-parent="#daily-couser" href="#couser-box" aria-expanded="true"
                        aria-controls="couser-box"><i class="fa fa-angle-down"></i></a>
                </div>
            </div>
            <div id="couser-box" role="tabpanel" class="collapse show">
                <div class="feed-box">
                    <ul class="feed-elements list-unstyled">
                        <!-- List-->
                        <li class="clearfix">
                            <div class="feed d-flex justify-content-between">
                                <div class="feed-body d-flex justify-content-between"><a href="#"
                                        class="feed-profile"><img :src="photo" alt="person"
                                            class="img-fluid rounded-circle"></a>
                                    <div class="content"><strong>Frank Williams</strong><small>Posted a new blog
                                        </small>
                                        <div class="full-date"><small>Today 5:60 pm - 12.06.2014</small></div>
                                        <div class="CTAs">
                                            <a href="/environment/"
                                                class="btn btn-xs btn-dark"><i class="fa fa-glasses"> </i> Visitar</a>
                                            <button-complement icon="fa fa-cog" header=" Opciones"></button-complement>
                                        </div>
                                    </div>
                                </div>
                                <div class="date"><small>5min ago</small></div>
                            </div>
                        </li>


    <li><a data-toggle="modal" data-target="#" rel="nofollow" href="" class="dropdown-item all-notifications text-center">
            <strong> <i class="icon"></i>Agregar colaborador <i class="fa fa-plus"></i></strong></a>

            <slot></slot>
            </li>


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
            'photo',
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
