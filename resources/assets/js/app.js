require('./bootstrap');

window.Vue = require('vue');

window.VueRouter=require('vue-router').default;


window.Axios=require('axios').default;

let AppLayout= require('./components/App.vue');
    // show the list post template
const Listposts=Vue.component('Listposts', require('./components/Listposts.vue'));
const login=Vue.component('login', require('./components/login.vue'));

// add post template
const Addpost =Vue.component('Addpost', require('./components/Addpost.vue'));
const Addact =Vue.component('Addact', require('./components/Addactualite.vue'));
//add Actualite
const Listacts=Vue.component('Listacts', require('./components/ListActualite.vue'));
const Viewact=Vue.component('Viewact', require('./components/Viewactualite.vue'));

// edite post template
const Editpost =Vue.component('Editpost', require('./components/Editpost.vue'));
const Editact =Vue.component('Editact', require('./components/Editactualite.vue'));

// delete post template
const Deletepost =Vue.component('Deletepost', require('./components/Deletepost.vue'));
const Deleteact =Vue.component('Deleteact', require('./components/Deleteactualite.vue'));

// delete post template

// view single post template
const Viewpost =Vue.component('Viewpost', require('./components/Viewpost.vue'));

// registering Modules
Vue.use(VueRouter, Axios, axios);


const routes = [
    {
        path: '/login',

        name: 'login',

        component: login,
        meta: {

            auth: false

        }
    },
    {
        name: 'Listacts',
        path: '/',
        component: Listacts
    },
    {
        name: 'Listposts',
        path: '/vueApp',
        component: Listposts
    },

    {
        name: 'Addpost',
        path: '/add-post',
        component: Addpost
    },
    {
        name: 'Addact',
        path: '/add-act',
        component: Addact
    },


    {
        name: 'Editpost',
        path: '/edit/:id',
        component: Editpost
    },
   {
        name: 'Editact',
        path: '/edit/:id',
        component: Editact
    },
    {
        name: 'Deletepost',
        path: '/Listposts',
        component: Deletepost
    },
    {
        name: 'Deleteact',
        path: '/Deleteact',
        component: Deleteact
    },

    {
        name: 'Viewpost',
        path: '/view/:id',
        component: Viewpost
    },
    {
        name: 'Viewact',
        path: '/showAct',
        component: Viewact
    }
];
const router = new VueRouter({ mode: 'history', routes: routes});

new Vue(
    Vue.util.extend(
        { router, },

        AppLayout




    )


).$mount('#app');
/*new Vue({
    el: '#app',

    data: {
        showModal: false
    }
});*/