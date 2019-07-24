<template>
    <li><a rel="nofollow" :href="url" class="dropdown-item all-notifications text-center">
            <strong> <i :class="icon"></i> {{ header }} <i :class="icon_r"></i></strong></a></li>
</template>

<script>
    export default {
        mounted() {},

        props: [
            'icon',
            'icon_r',
            'header',
            'url'
        ],

        data: function () {
            return {}
        },
    }

</script>
