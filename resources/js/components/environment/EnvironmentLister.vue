<template>
    <div :class="[col_size, {'col-centered': centered}]">
        <!-- Recent Activities Widget      -->
        <div id="recent-activities-wrapper" class="card updates activities">
            <div id="activites-header" class="card-header d-flex justify-content-between align-items-center">
                <h2 class="h5 display">
                    <a v-text="header" data-toggle="collapse" data-parent="#recent-activities-wrapper"
                        href="#activities-box" aria-expanded="true" aria-controls="activities-box"></a>
                </h2>
                <a data-toggle="collapse" data-parent="#recent-activities-wrapper" href="#activities-box"
                    aria-expanded="true" aria-controls="activities-box">
                    <i class="fa fa-angle-down"></i>
                </a>
            </div>
            <div id="activities-box" role="tabpanel" class="collapse show">
                <ul class="activities list-unstyled">
                    <!-- Item-->
                    <environment-item v-for="environment in environments" v-bind:data="environment"
                        v-bind:key="environment.id" criteria="Activo hace" measure="6 horas" :header="environment.title"
                        paragraph="Lorem ipsum" notification="10 reportes nuevos"></environment-item>
                    <environment-item v-if="!this.$store.getters.environments.length">
                        <div class="col-12 date-holder text-right">
                            <h3 class="text-centered secondary-font">No existen ambientes disponibles...</h3>
                        </div>
                    </environment-item>

                    <slot></slot>
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
        name: "Environments",
        mounted() {
            this.$store.dispatch('fetchEnvironments');
        },

        props: [
            'col_size',
            'header',
            'centered',
        ],
        data: {},
        methods: {
            deleteEnvironment(environment) {
                this.$store.dispatch('deleteEnvironment', environment)
            }
        },
        computed: {
            ...mapGetters([
                'environments'
            ])
        }
    }

</script>
