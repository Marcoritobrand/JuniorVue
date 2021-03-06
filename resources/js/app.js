require('./bootstrap');

window.Vue = require('vue').default;


import VueRouter from 'vue-router';
// import VueRouter from 'vue-router'
Vue.use(VueRouter)

import App from './components/App.vue'
import CommentsIndex from './components/Comments/Index.vue'
import CommentsCreate from './components/Comments/Create.vue'
import CommentsEdit from './components/Comments/Edit.vue'


const router = new VueRouter({
    mode: 'history',
    routes: [{
            path: '/',
            component: CommentsIndex,
            name: 'comments.index'
        },
        {
            path: '/create',
            component: CommentsCreate,
            name: 'comments.create'
        },
        {
            path: '/edit/:id',
            component: CommentsEdit,
            name: 'comments.edit'
        }
    ]
})

const app = new Vue({
    el: '#app',
    components: { App },
    router
});