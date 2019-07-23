<template>
    <li class="nav-item dropdown"> <a id="notifications" rel="nofollow" data-target="#" href="#"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
            class="nav-link"><i class="fa fa-bell"></i><span
                class="badge badge-warning">12</span></a>
        <ul aria-labelledby="notifications" class="dropdown-menu">
            <slot></slot>
        </ul>
    </li>
</template>

<script>
    export default {
        mounted() {
        },

        props: [
            'object_id',
            'header',
            'icon',
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
