<template>
    <div>
            <modal-component :header="header" :description="description" :object_id="object_id">
                <template v-slot:modal-body>
        <form ref="form" v-on:submit.prevent="createEnvironment(environment)">

                    <input-item v-model="environment.title" header="Nombre" type="text" placeholder="Nombre"
                        classes="form-control"></input-item>
                    <input-item v-model="environment.description" header="Descripción" type="text-area"
                        placeholder="Descripción corta" classes="form-control"></input-item>
                    <input-item type="submit" btn_header="Agregar ambiente" classes="btn btn-primary" />
        </form>
                        <hr>
                        <p>O únete a un ambiente ya hecho para formar parte como colaborador. Sólo usa el código del ambiente al cual quieres unirte.</p>

        <form ref="form" v-on:submit.prevent="joinEnvironment(environment)">

                    <input-item v-model="environment.code" header="Código" type="text"
                        placeholder="Código del ambiente" classes="form-control"></input-item>
                    <input-item type="submit" btn_header="Unirse a ambiente" classes="btn btn-primary" />
        </form>
                </template>
                <template v-slot:modal-footer>
                    <!--input-item type="button" dismiss="modal" btn_header="Cerrar" classes="btn btn-secondary" /-->
                </template>
                                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span
                            aria-hidden="true" v-el:my-btn>×</span></button>
            </modal-component>
    </div>
</template>

<script>
    export default {
        name: 'modal-env-add',
        mounted() {

        },
        props: [
            'object_id',
            'header',
            'description',
        ],
        data: function () {
            return {
                environment: {
                    title: '',
                    description: '',
                    code: ''
                },
            }
        },
        methods: {
            createEnvironment(environment) {
                //$('#' + this.object_id).modal('dismiss');
  this.$els.myBtn.click()
                //this.$store.dispatch('createEnvironment', environment);
            },
            joinEnvironment(environment) {
                this.$store.dispatch('joinEnvironment', environment);
            }
        },
        computed: {
            isValid() {
                return this.environment.title !== '' && this.environment.content !== ''
            }
        },
    }

</script>
