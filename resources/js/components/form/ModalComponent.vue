<template>
    <div :id="object_id" tabindex="-1" role="dialog" aria-hidden="true"
        class="modal fade text-left">
        <div role="document" class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ header }}</h5>
                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <slot></slot>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
        },

        props: [
            'object_id',
            'header',
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
