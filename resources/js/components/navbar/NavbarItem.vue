<template>
    <li>
        <a rel="nofollow" href="#" class="dropdown-item d-flex">
            <div class="notification d-flex justify-content-between">
                <div class="notification-content"><i :class="icon"></i>{{ notification }}</div>
                <div class="notification-time"><small>{{ time }}</small></div>
            </div>
        </a>
    </li>
</template>

<script>
    export default {
        mounted() {},

        props: [
            'icon',
            'notification',
            'time'
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
