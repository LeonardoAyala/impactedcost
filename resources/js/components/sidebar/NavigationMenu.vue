<template>
    <div class="main-menu">
        <h5 class="sidenav-heading" v-text="header"></h5>
        <ul class="side-menu list-unstyled">
            <slot></slot>
        </ul>
    </div>
</template>

<script>
    export default {
        mounted() {
        },

        props: [
            'header',
        ],

        data: function () {

        },
        methods: {

        },
        computed: {

        },
    }

</script>
