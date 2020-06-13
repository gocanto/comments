require('./bootstrap');

window.Vue = require('vue');

Vue.component('comments', require('./components/comments.vue').default);

const app = new Vue({
    el: '#app',
});
