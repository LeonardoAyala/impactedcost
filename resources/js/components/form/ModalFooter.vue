<template>
    <div class="modal-footer">
        <slot></slot>
    </div>
</template>

<script>
    export default {
        mounted() {},

        props: [
            'header',
            'description',
            'paragraph',
        ],
        data: {

        },
        methods: {

        },
        computed: {

        },
    }

</script>
