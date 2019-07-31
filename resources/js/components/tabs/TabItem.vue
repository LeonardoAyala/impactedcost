<template>
    <li class="nav-item">
      <a :class="['nav-link', {'active': active}]" :href="link">{{ header }}</a>
    </li>
</template>

<script>
    export default {
        mounted() {
        },

        props: {
            link: { default: '#'},
            header: String,
            active: String,
    },
        data: {

        },
        methods: {

        },
        computed: {

        },
    }

</script>
