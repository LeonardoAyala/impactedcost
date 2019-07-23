<template>
        <div :class="[col_size, {'col-centered': centered}]">
            <!-- Recent Activities Widget      -->
            <div id="recent-activities-wrapper" class="card updates activities">
                <div id="activites-header" class="card-header d-flex justify-content-between align-items-center">
                    <h2 class="h5 display">
                        <a v-text="header" data-toggle="collapse" data-parent="#recent-activities-wrapper"
                            href="#activities-box" aria-expanded="true" aria-controls="activities-box"></a>
                    </h2>
                    <a data-toggle="collapse" data-parent="#recent-activities-wrapper" href="#activities-box"
                        aria-expanded="true" aria-controls="activities-box">
                        <i class="fa fa-angle-down"></i>
                    </a>
                </div>
                <div id="activities-box" role="tabpanel" class="collapse show">
                    <ul class="activities list-unstyled">
                        <slot></slot>
                    </ul>
                </div>
            </div>
        </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },

        props: [
            'col_size',
            'header',
            'centered',
        ],
        data: {
        },
        methods: {

        },
        computed: {

        },
    }

</script>
