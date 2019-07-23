<template>
    <li><a :href="'#' + object_id" aria-expanded="false" data-toggle="collapse"> <i
                :class="icon"></i>{{ header }} </a>
        <ul :id="object_id" class="collapse list-unstyled ">
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
