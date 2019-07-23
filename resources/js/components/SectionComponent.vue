<template>
    <section :class="classes">
        <div class="container-fluid">
            <div class="row d-flex">
                <slot></slot>
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },

        props: [
            'classes',
        ],

        data: function () {
            return {

            }
        },
        methods: {

        },
        computed: {

        },
    }

</script>
