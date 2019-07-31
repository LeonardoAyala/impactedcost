<template>
    <li><a data-toggle="modal" :data-target="'#' + modal_target" rel="nofollow" :href="url" class="dropdown-item all-notifications text-center">
            <strong> <i :class="icon"></i> {{ header }} <i :class="icon_r"></i></strong></a>

            <slot></slot>
            </li>
</template>

<script>
    export default {
        mounted() {},

        props: [
            'icon',
            'icon_r',
            'header',
            'url',
            'modal_target',
        ],

        data: function () {
            return {}
        },
    }

</script>
