<template>
    <div class="card mb-3" :style="offset">
        <div class="card-body m-3">
            {{ comment.body }}

            <a href="#">reply</a>

            <template v-if="comment.tree">
                <comments
                    v-for="node in comment.tree"
                    :key="node.id"
                    :comment="node"
                    :depth="depth + 1"
                    @born="handleBorn()" />
            </template>
        </div>
    </div>
</template>

<script>

    export default {
        name: 'comments',

        props: {
            comment: {
                type: Object,
                required: true,
            },

            depth: {
                type: Number,
                default: 0,
            },
        },

        data() {
            return {
                childrenCount: 0,
            };
        },

        computed: {
            direct() {
                if (Array.isArray(this.comment.tree)) {
                    return this.comment.tree.length;
                }

                return 0;
            },

            offset() {
                const colors = [
                    'white',
                    'lightgray',
                    'lightblue',
                    'lightcyan',
                    'lightskyblue',
                    'lightpink',
                ];

                return {
                    'margin-left': (this.depth * 20) + 'px',
                    'background-color': colors[this.depth % colors.length],
                };
            },
        },

        mounted() {
            this.$emit('born');
        },

        methods: {
            handleBorn() {
                this.childrenCount++;
                this.$emit('born');
            },
        },
    }
</script>
