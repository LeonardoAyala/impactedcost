<template>
    <li :class="[{'show': !isShowed}, 'nav-item dropdown']"> <a href="#" @click="toggleClick" v-on-clickaway="away" class="nav-link"><i
                :class="icon"></i><span :class="'badge badge-' + notification_color">{{ notification }}</span></a>
        <ul :class="[{'dropdown show': !isShowed} , 'dropdown-menu']">
            <slot></slot>
        </ul>
    </li>
</template>

<script>
    import { mixin as clickaway } from 'vue-clickaway';

    export default {
        mounted() {},
        mixins: [ clickaway ],
        props: [
            'icon',
            'notification',
            'notification_color'
        ],

        data: function () {
            return {
                isShowed: true,
            }
        },
        methods: {
            toggleClick() {
                this.isShowed = !this.isShowed;
            },
              away() {
                this.isShowed = true;
                }
        },
        computed: {

        }
    }

</script>
