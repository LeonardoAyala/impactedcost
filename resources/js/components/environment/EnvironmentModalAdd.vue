<template>
<div>
    <modal-component header="Modal" description="Lorem ipsum." object_id="addEnv">
        <template v-slot:modal-body>
            <form v-on:submit.prevent="createEnvironment(environment)">
                <input-item  v-model="environment.title" header="Nombre" type="text" placeholder="Nombre" classes="form-control"></input-item>
                <input-item v-model="environment.description" header="Descripción" type="text-area" placeholder="Descripción corta"
                    classes="form-control"></input-item>

                <input-item type="submit" btn_header="Crear ambiente" classes="btn btn-primary">
                </input-item>
            </form>
        </template>
        <template v-slot:modal-footer >
            <button-item header="Cerrar" dismiss="modal" btn_color="secondary"></button-item>
            <button-item header="Guardar cambios"  btn_color="primary" ></button-item>
        </template>
    </modal-component>
    <button type="button" class="btn btn-primary">Prueba</button>

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
            'paragraph',
        ],
        data: function () {
            return {
                    environment: {
                        title: '',
                        description: ''
                    },
            }
        },
        methods: {
            onSubmit() {
                alert(this.environment.title + this.environment.description);
            },
            createEnvironment(environment) {
                this.$store.dispatch('createEnvironment', environment)
            }
        },
        computed: {
                isValid() {
                    return this.environment.title !== '' && this.environment.content !== ''
                }
        },
    }

</script>
