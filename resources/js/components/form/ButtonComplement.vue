<template>

    <a @click="clicked" :href="link" :class="classes" data-toggle="modal" :data-target="'#' + modal_target"><i :class="icon"> </i> {{ header }}</a>
</template>

<script>
    export default {
        mounted() {
        },

        props: {
            link: { default: '#'},
            classes: { default: 'btn btn-xs btn-dark'},
            icon: { default: 'fa fa-glasses'},
            header: String,
            modal_target: { default: '#'},
    },
        data: {

        },
        methods: {
            clicked(){
                this.$emit('clicked');
            },
        },
        computed: {

        },
    }

</script>
