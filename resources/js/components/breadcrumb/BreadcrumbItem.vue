<template>
    <li class="breadcrumb-item"><a :href="link">{{ header }}</a></li>
</template>

<script>
    export default {
        mounted() {
        },

        props: {
            link: String,
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
