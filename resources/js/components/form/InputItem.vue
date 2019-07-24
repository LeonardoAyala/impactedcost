<template>
    <div class="form-group">
        <label>{{ header }}</label>
        <input :type="type" :value="btn_header" :placeholder="placeholder" :class="classes">
    </div>
</template>

<script>
    export default {
        mounted() {},

        props: [
            'header',
            'btn_header',
            'type',
            'placeholder',
            'classes'
        ],
        data: {

        },
        methods: {

        },
        computed: {

        },
    }

</script>
