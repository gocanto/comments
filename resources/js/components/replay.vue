<template>
    <a href="#" @click.prevent="add()">{{ label }}</a>
</template>

<script>
    import Swal from "sweetalert2";
    import axios from "axios";

    export default {
        name: 'replay',

        props: {
            parentId: {
                type: Number,
                required: false,
                default: null,
            },
            label: {
                type: String,
                required: false,
                default: 'Replay',
            },
        },

        methods: {
            async add() {
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
                    parent_id: this.parentId,
                })
                    .then(() => location.reload())
                    .catch(() => {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops... Something went wrong!',
                            text: 'We could not add your comment. Please try again!',
                        })
                    })
            }
        },
    }

</script>
