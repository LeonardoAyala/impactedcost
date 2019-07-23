<template>
    <li><a rel="nofollow" :href="url" class="dropdown-item all-notifications text-center">
            <strong> <i class="icon"></i>{{ header }} </strong></a></li>
</template>

<script>
    export default {
        mounted() {},

        props: [
            'icon',
            'header',
            'url'
        ],

        data: function () {
            return {}
        },
    }

</script>
