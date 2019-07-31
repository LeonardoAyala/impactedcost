<template>
    <!-- Count item widget-->
    <div class="col-xl-2 col-md-4 col-6">
        <div class="wrapper count-title d-flex clickable">
            <div class="icon"><i :class="icon"></i></div>
            <div class="name" ><strong class="text-uppercase" v-text="header"></strong><span v-text="time"></span>
                <div class="count-number" v-text="number"></div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },

        props:[
            'header',
            'time',
            'number',
            'icon'
        ]
    }
</script>

<style>

</style>
