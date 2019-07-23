<template>

    <li><a :href="url" > <i :class="icon"></i>{{ header }}
    <div v-if="notification" :class="'badge badge-' + notification_color" v-text="notification"></div>
    </a></li>

</template>

<script>
    export default {
        mounted() {
        },

        props: [
            'url',
            'header',
            'icon',
            'notification',
            'notification_color'
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
