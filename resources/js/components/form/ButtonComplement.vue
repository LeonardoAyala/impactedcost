<template>

    <a :href="link" :class="classes"><i :class="icon"> </i> {{ header }}</a>
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
    },
        data: {

        },
        methods: {

        },
        computed: {

        },
    }

</script>
