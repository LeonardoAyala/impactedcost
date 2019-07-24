<template>
    <button type="button" :data-dismiss="dismiss" :class="'btn btn-' + btn_color">{{ header }}</button>
</template>

<script>
    export default {
        mounted() {},

        props: [
            'header',
            'btn_color',
            'dismiss'
        ],
        data: {

        },
        methods: {

        },
        computed: {

        },
    }

</script>
