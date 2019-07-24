<template>
    <div class="modal-body">
        <p>{{ description }}</p>
        <slot></slot>
    </div>
</template>

<script>
    export default {
        mounted() {},

        props: [
            'description'
        ],
        data: {

        },
        methods: {

        },
        computed: {

        },
    }

</script>
