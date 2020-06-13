<template>
    <div class="card mb-3" :style="offset">
        <div class="card-body m-3">
            {{ comment.body }}

            <div class="m-3">
                <a href="#" @click.prevent="addReplay(comment)">Replay</a>
            </div>

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

    import axios from 'axios'
    import Swal from 'sweetalert2'

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
                replay: {
                  parent_id: null,
                  body: null,
                },
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

            async addReplay(comment) {
                const { value: text } = await Swal.fire({
                    input: 'textarea',
                    inputPlaceholder: 'Type your message here...',
                    inputAttributes: {
                        'aria-label': 'Type your message here'
                    },
                    showCancelButton: true,
                    inputValidator: (value) => {
                        const body = value.trim();

                        return new Promise((resolve) => {
                            if (body.length > 0) {
                                resolve()
                            } else {
                                resolve('The replay is required.')
                            }
                        })
                    }
                })

                if (!text) {
                    return
                }

                axios.post('api/comments', {
                    body: text,
                    parent_id: comment.id,
                }).then(() => location.reload())
            }
        },
    }
</script>
