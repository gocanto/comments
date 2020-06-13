<template>
    <div>
        <comments v-for="item in items" :key="item.id" :comment="item"></comments>
    </div>
</template>

<script>
    import Comments from './comments'
    import axios from 'axios'

    export default {
        data() {
            return {
                'items': null,
            }
        },

        components: {
            Comments
        },

        mounted() {
            axios.get('api/comments')
                .then(({ data }) => this.items = data)
        },
    }
</script>
