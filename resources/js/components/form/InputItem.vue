<template>
    <div class="form-group">
        <label>{{ header }}</label>
        <input  @click="clicked" v-bind:value="btn_header"
      v-on:input="[$emit('input', $event.target.value)]"
         :type="type"  :placeholder="placeholder" :class="classes">
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
            clicked(){
                this.$emit('clicked');
            },
        },
        computed: {

        },
    }

</script>
