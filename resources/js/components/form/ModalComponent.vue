<template>
    <div :id="object_id" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ header }}</h5>
                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span
                            aria-hidden="true">×</span></button>
                </div>

                <div class="modal-body">
                    <p>{{ description }}</p>
                    <slot name="modal-body"></slot>
                </div>

                <div class="modal-footer" >
                    <slot name="modal-footer"></slot>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {},

        props: [
            'object_id',
            'header',
            'description',
            'paragraph',
        ],
        data: {
            form: new Form({
                username: '',
                password: '',
                remember: false
            })
        },
        methods: {

        },
        computed: {

        },
    }

</script>
