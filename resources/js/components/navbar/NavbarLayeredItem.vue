<template>
    <li><a rel="nofollow" :href="url" class="dropdown-item d-flex">
            <div class="msg-profile"> <img :src="image" alt="..." class="img-fluid rounded-circle"></div>
            <div class="msg-body">
                <h3 class="h5">{{ header }}</h3><span>{{ notification }}</span><small>
                    {{ details }}</small>
            </div>
        </a>
    </li>
</template>

<script>
    export default {
        mounted() {},

        props: [
            'image',
            'header',
            'notification',
            'details',
            'url'
        ],

        data: function () {
            return {}
        },
    }

</script>
