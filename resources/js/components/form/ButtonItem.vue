<template>
    <button type="button" @click="clicked"
     :data-dismiss="dismiss" :class="'btn btn-' + btn_color">{{ header }}</button>
</template>

<script>
    export default {
        mounted() {},

        props: [
            'header',
            'btn_color',
            'dismiss',
            'value'
        ],
        data: {

        },
        methods: {
            clicked(){
                this.$emit('clicked');
            },
            submit : function(){
                this.$refs.form.submit()
            }
        },
        computed: {

        },
    }

</script>
