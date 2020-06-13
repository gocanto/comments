require('./bootstrap');

window.Vue = require('vue');

Vue.component('comments-list', require('./components/commentsList.vue').default);

const app = new Vue({
    el: '#app',
});
