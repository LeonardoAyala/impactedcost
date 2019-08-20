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
                    <li v-for="project in projects" v-bind:data="project" v-bind:key="project.id"
                        class="d-flex justify-content-between">
                        <div class="left-col d-flex">
                            <div class="icon"><i class="fas fa-project-diagram"></i></div>
                            <div class="title"><strong>{{ project.title}}</strong>

                                <div class="badge badge-primary">Text</div>

                                <p>{{project.description}}</p>
                                <div class="CTAs">
                                    <a :href="'/environment/' + environment_id + '/project/' + project.id"
                                        class="btn btn-xs btn-dark"><i class="fa fa-glasses"> </i> Visitar</a>
                                    <a href="#" data-toggle="modal" :data-target="'#' + specific_modal_id"
                                        class="btn btn-xs btn-dark" @click="onOptions(project)"><i class="fa fa-cog"> </i> Opciones</a>
                                </div>
                            </div>
                        </div>
                        <div class="right-col text-right ">
                            <div class="update-date"><i class="fas fa-check-circle text-primary"></i></div>
                        </div>
                    </li>
                    <li><a data-toggle="modal" :data-target="'#' + general_modal_id" rel="nofollow" href=""
                            class="dropdown-item all-notifications text-center">
                            <strong> <i class="icon"></i>Agregar proceso <i class="fa fa-plus"></i></strong></a></li>
                </ul>
            </div>
        </div>
        <!-- Recent Updates Widget End-->

        <!-- General Modal-->
        <div :id="general_modal_id" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade text-left">
            <div role="document" class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <!--Modal header-->
                        <h5 class="modal-title">Crear nuevo proceso</h5>
                        <button :id="general_modal_id + '-close'" type="button" data-dismiss="modal" aria-label="Close"
                            class="close"><span aria-hidden="true">×</span></button>
                    </div>

                    <div class="modal-body">
                        <!--Modal description-->
                        <p>Los procesos son una serie de tareas estructuradas en que los colaboradores pueden registrar
                            su progreso.</p>
                        <!--Modal Content-->
                        <form v-on:submit.prevent="createProject(project)">
                            <div class="form-group">
                                <label>Código</label>
                                <input v-model="project.code" name="Código" type="text" placeholder="Código"
                                    class="form-control" :class="{ 'is-invalid': project.errors.has('code') }">
                                <has-error :form="project" field="code"></has-error>
                            </div>
                            <div class="form-group">
                                <label>Nombre</label>
                                <input v-model="project.title" name="Nombre" type="text" placeholder="Nombre"
                                    class="form-control" :class="{ 'is-invalid': project.errors.has('title') }">
                                <has-error :form="project" field="title"></has-error>
                            </div>
                            <div class="form-group">
                                <label>Descripción</label>
                                <input v-model="project.description" type="text" placeholder="Descripción"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Categoría</label>
                                <select v-model="project.project_category_id" name="Categoría" class="form-control"
                                    :class="{ 'is-invalid': project.errors.has('project_category_id') }">
                                    <option value="0">Elija una opción</option>
                                </select>
                                <has-error :form="project" field="project_category_id"></has-error>
                            </div>

                            <div class="form-group">
                                <label>Fecha de inicio</label>
                                <input v-model="project.initial_date" type="date" name="Fecha de inicio"
                                    class="form-control" :class="{ 'is-invalid': project.errors.has('initial_date') }">
                                <has-error :form="project" field="initial_date"></has-error>
                            </div>

                            <div class="form-group">
                                <label>Presupuesto esperado</label>
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text">$</span></div>
                                    <input v-model="project.expected_budget" type="number" step="500" min="0"
                                        max="99999999" name="Presupuesto esperado" class="form-control"
                                        :class="{ 'is-invalid': project.errors.has('expected_budget') }">
                                    <div class="input-group-append"><span class="input-group-text">.00</span></div>
                                </div>
                                <has-error :form="project" field="expected_budget"></has-error>
                            </div>

                            <input :id="general_modal_id + '-submit'" type="submit" hidden class="btn btn-primary">
                        </form>

                    </div>

                    <div class="modal-footer">
                        <slot name="modal-footer">
                            <!--Modal Footer-->
                            <input type="submit" value="Crear proyecto" class="btn btn-primary"
                                @click="clickOn(general_modal_id + '-submit')" />
                            <input @click="clickOn(general_modal_id + '-close')" type="button" value="Cerrar"
                                class="btn btn-secondary" />
                        </slot>
                    </div>

                </div>
            </div>
        </div>

        <!--Specific Modal-->
        <div :id="specific_modal_id" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade text-left">
            <div role="document" class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <!--Modal header-->
                        <h5 class="modal-title">{{project.title}}</h5>
                        <button :id="specific_modal_id + '-close'" type="button" data-dismiss="modal" aria-label="Close"
                            class="close"><span aria-hidden="true">×</span></button>
                    </div>

                    <div class="modal-body">
                        <!--Modal description-->
                        <p>{{project.description}}</p>
                        <!--Modal Content-->
                        <form v-on:submit.prevent="createProject(project)">
                            <div class="form-group">
                                <label>Código</label>
                                <input v-model="project.code" name="Código" type="text" placeholder="Código"
                                    class="form-control" :class="{ 'is-invalid': project.errors.has('code') }">
                                <has-error :form="project" field="code"></has-error>
                            </div>
                            <div class="form-group">
                                <label>Nombre</label>
                                <input v-model="project.title" name="Nombre" type="text" placeholder="Nombre"
                                    class="form-control" :class="{ 'is-invalid': project.errors.has('title') }">
                                <has-error :form="project" field="title"></has-error>
                            </div>
                            <div class="form-group">
                                <label>Descripción</label>
                                <input v-model="project.description" type="text" placeholder="Descripción"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Categoría</label>
                                <select v-model="project.project_category_id" name="Categoría" class="form-control"
                                    :class="{ 'is-invalid': project.errors.has('project_category_id') }">
                                    <option value="0">Elija una opción</option>
                                </select>
                                <has-error :form="project" field="project_category_id"></has-error>
                            </div>

                            <div class="form-group">
                                <label>Fecha de inicio</label>
                                <input v-model="project.initial_date" type="date" name="Fecha de inicio"
                                    class="form-control" :class="{ 'is-invalid': project.errors.has('initial_date') }">
                                <has-error :form="project" field="initial_date"></has-error>
                            </div>

                            <div class="form-group">
                                <label>Presupuesto esperado</label>
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text">$</span></div>
                                    <input v-model="project.expected_budget" type="number" min="0"
                                        max="99999999" name="Presupuesto esperado" class="form-control"
                                        :class="{ 'is-invalid': project.errors.has('expected_budget') }">
                                    <div class="input-group-append"><span class="input-group-text">.00</span></div>
                                </div>
                                <has-error :form="project" field="expected_budget"></has-error>
                            </div>

                            <input :id="specific_modal_id + '-submit'" type="submit" hidden class="btn btn-primary">
                        </form>

                    </div>

                    <div class="modal-footer">
                        <slot name="modal-footer">
                            <!--Modal Footer-->
                            <input type="submit" value="Crear proyecto" class="btn btn-primary"
                                @click="clickOn(specific_modal_id + '-submit')" />
                            <input @click="clickOn(specific_modal_id + '-close')" type="button" value="Cerrar"
                                class="btn btn-secondary" />
                        </slot>
                    </div>

                </div>
            </div>
        </div>

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
            this.$store.dispatch('fetchProjectCategories', this.environment_id);
        },
        props: [
            'col_size',
            'header',
            'centered',
            'environment_id'
        ],
        data: function () {
            return {
                project: new Form({
                    id: '',
                    code: '',
                    title: '',
                    project_category_id: '0',
                    description: '',
                    initial_date: '',
                    environment_id: '',
                    complete: '',
                    archived: '',
                    expected_budget: '0',
                    active: '',
                    validation: '',
                }),
                general_modal_id: 'add-project',
                specific_modal_id: 'show-project',

            }
        },
        methods: {
            clickOn(id) {
                document.getElementById(id).click();
            },
            onOptions(project) {
                this.project.fill(project);
            },
            createProject(project) {

                project.validation = '1';
                this.project.post(`/environment/${this.environment_id}/project`, project).then(res => {
                    if (res.data.message === 'good') {
                        project.validation = '0',
                            this.$store.dispatch('createProject', {
                                environment_id: this.environment_id,
                                project: project
                            })
                    }
                }).catch(err => {
                    console.log(err)
                });
            },

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
        },
        computed: {
            ...mapGetters([
                'projects'
            ])
        }
    }

</script>
