<template>
    <div>
        <div>
            <replay label="Add new comment"></replay>
        </div>
        <div>
            <comments v-for="item in items" :key="item.id" :comment="item"></comments>
        </div>
    </div>
</template>

<script>
    import Comments from './comments'
    import Replay from './replay'
    import axios from 'axios'

    export default {
        data() {
            return {
                'items': null,
            }
        },

        components: {
            Comments,
            Replay,
        },

        mounted() {
            axios.get('api/comments')
                .then(({ data }) => this.items = data)
        },
    }
</script>
