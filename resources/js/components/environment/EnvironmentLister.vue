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
                    <div v-if="this.$store.getters.environments.length">
                        <environment-item v-for="environment in environments" v-bind:data="environment"
                            v-bind:key="environment.id" criteria="Activo hace" measure="6 horas"
                            :header="environment.title" paragraph="Lorem ipsum" notification="10 reportes nuevos">

                            <template v-slot:actions>
                                <a :href="'/environment/' + environment.id" class="btn btn-xs btn-dark"><i class="fa fa-glasses"> </i> Visitar</a>
                                <button-complement icon="fa fa-cog" modal_target="optEnv" header=" Opciones"
                                    v-on:clicked="onOptions(environment)"></button-complement>

                            </template>
                        </environment-item>
                    </div>
                    <environment-item v-else>
                        <div class="col-12 date-holder text-right">
                            <h3 class="text-centered secondary-font">No existen ambientes disponibles...</h3>
                        </div>
                    </environment-item>

                    <slot></slot>
                </ul>
            </div>
        </div>

        <section-component classes="forms">
            <form v-on:submit.prevent="editEnvironment(environment)">
                <modal-component header="Opciones"
                    description="En esta sección se puede editar cualquier información disponible sobre el ambiente."
                    object_id="optEnv">
                    <template v-slot:modal-body>
                        <div class="form-group">
                            <label>Nombre</label>
                            <input v-model="environment.title" type="text" placeholder="placeholder"
                                class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Descripción</label>
                            <input v-model="environment.description" type="text" placeholder="placeholder"
                                class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Código</label>
                            <input v-model="environment.code" type="text" placeholder="placeholder"
                                class="form-control">
                        </div>
                    </template>
                    <template v-slot:modal-footer>
                        <input-item type="submit" btn_header="Crear ambiente" classes="btn btn-primary" />
                        <input-item type="button" dismiss="modal" btn_header="Cerrar" classes="btn btn-secondary" />
                    </template>
                </modal-component>
            </form>
        </section-component>
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
