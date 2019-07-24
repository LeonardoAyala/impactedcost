<template>
    <li>
        <div class="row">
            <div class="col-2 date-holder text-right">
                <div class="icon"><i class="fas fa-layer-group"></i></div>
                <div class="date" v-text="criteria"></div>
                <div class="date text-info" v-text="measure"></div>
            </div>
            <div class="col-10">
                <div class="row content">
                    <strong v-text="header"></strong>
                    <div class="right-column">
                        <div class="badge badge-primary right" v-text="notification"></div>
                    </div>
                </div>
                <p v-text="paragraph"></p>

                <div class="CTAs">
                    <a href="#" class="btn btn-xs btn-dark"><i class="fa fa-glasses"> </i> Visitar</a>
                    <a href="#" class="btn btn-xs btn-dark"><i class="fa fa-cog"> </i> Opciones</a>
                </div>

            </div>

        </div>
    </li>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },

        props: {
            criteria: { default: 'crit'},
            measure: String,
            header: { type: String, required: true},
            notification: String,
            paragraph: String,
    },
        data: {

        },
        methods: {

        },
        computed: {

        },
    }

</script>
