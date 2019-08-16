<template>
              <div id="daily-feeds" class="card updates daily-feeds">
                <div id="feeds-header" class="card-header d-flex justify-content-between align-items-center">
                  <h2 class="h5 display"><a data-toggle="collapse" data-parent="#daily-feeds" href="#feeds-box" aria-expanded="true" aria-controls="feeds-box">Your daily Feeds </a></h2>
                  <div class="right-column">
                    <div class="badge badge-primary">10 messages</div><a data-toggle="collapse" data-parent="#daily-feeds" href="#feeds-box" aria-expanded="true" aria-controls="feeds-box"><i class="fa fa-angle-down"></i></a>
                  </div>
                </div>
                <div id="feeds-box" role="tabpanel" class="collapse show">
                  <div class="feed-box">
                    <ul class="feed-elements list-unstyled">
                      <!-- List-->
                      <li class="clearfix">
                        <div class="feed d-flex justify-content-between">
                          <div class="feed-body d-flex justify-content-between"><a href="#" class="feed-profile"><img src="img/avatar-5.jpg" alt="person" class="img-fluid rounded-circle"></a>
                            <div class="content"><strong>Aria Smith</strong><small>Posted a new blog </small>
                              <div class="full-date"><small>Today 5:60 pm - 12.06.2014</small></div>
                            </div>
                          </div>
                          <div class="date"><small>5min ago</small></div>
                        </div>
                      </li>
                      <!-- List-->
                      <li class="clearfix">
                        <div class="feed d-flex justify-content-between">
                          <div class="feed-body d-flex justify-content-between"><a href="#" class="feed-profile"><img src="img/avatar-2.jpg" alt="person" class="img-fluid rounded-circle"></a>
                            <div class="content"><strong>Frank Williams</strong><small>Posted a new blog </small>
                              <div class="full-date"><small>Today 5:60 pm - 12.06.2014</small></div>
                              <div class="CTAs"><a href="#" class="btn btn-xs btn-dark"><i class="fa fa-thumbs-up"> </i>Like</a><a href="#" class="btn btn-xs btn-dark"><i class="fa fa-heart"> </i>Love</a></div>
                            </div>
                          </div>
                          <div class="date"><small>5min ago</small></div>
                        </div>
                      </li>
                      <!-- List-->
                      <li class="clearfix">
                        <div class="feed d-flex justify-content-between">
                          <div class="feed-body d-flex justify-content-between"><a href="#" class="feed-profile"><img src="img/avatar-3.jpg" alt="person" class="img-fluid rounded-circle"></a>
                            <div class="content"><strong>Ashley Wood</strong><small>Posted a new blog </small>
                              <div class="full-date"><small>Today 5:60 pm - 12.06.2014</small></div>
                            </div>
                          </div>
                          <div class="date"><small>5min ago</small></div>
                        </div>
                      </li>
                      <!-- List-->
                      <li class="clearfix">
                        <div class="feed d-flex justify-content-between">
                          <div class="feed-body d-flex justify-content-between"><a href="#" class="feed-profile"><img src="img/avatar-1.jpg" alt="person" class="img-fluid rounded-circle"></a>
                            <div class="content"><strong>Jason Doe</strong><small>Posted a new blog </small>
                              <div class="full-date"><small>Today 5:60 pm - 12.06.2014</small></div>
                            </div>
                          </div>
                          <div class="date"><small>5min ago</small></div>
                        </div>
                        <div class="message-card"> <small>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s. Over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</small></div>
                        <div class="CTAs pull-right"><a href="#" class="btn btn-xs btn-dark"><i class="fa fa-thumbs-up"> </i>Like</a></div>
                      </li>
                      <!-- List-->
                      <li class="clearfix">
                        <div class="feed d-flex justify-content-between">
                          <div class="feed-body d-flex justify-content-between"><a href="#" class="feed-profile"><img src="img/avatar-6.jpg" alt="person" class="img-fluid rounded-circle"></a>
                            <div class="content"><strong>Sam Martinez</strong><small>Posted a new blog </small>
                              <div class="full-date"><small>Today 5:60 pm - 12.06.2014</small></div>
                            </div>
                          </div>
                          <div class="date"><small>5min ago</small></div>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
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
            'environment_id'
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
