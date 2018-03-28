require('./bootstrap');

window.Vue = require('vue');

window.VueRouter=require('vue-router').default;

window.VueAxios=require('vue-axios').default;

window.Axios=require('axios').default;

let AppLayout= require('./components/App.vue');
// show the list post template
const Listacts=Vue.component('Listacts', require('./components/ListActualite.vue'));

// add post template
//const Addacts =Vue.component('Addacts', require('./components/Addactualite.vue'));
//add Actualite

// edite post template
//const Editact =Vue.component('Editact', require('./components/Editactualite.vue'));

// delete post template
//const Deleteact =Vue.component('Deleteact', require('./components/Deleteactualite.vue'));

// delete post template

// view single post template
//const Viewact =Vue.component('Viewact', require('./components/Viewactualite.vue'));

// registering Modules
//Vue.use(VueRouter,VueAxios, axios);


const routes = [
    {
        name: 'Listacts',
        path: '/',
        component: Listacts
    },

  /*  {
        name: 'Addacts',
        path: '/add-act',
        component: Addacts
    },


    {
        name: 'Editact',
        path: '/edit/:id',
        component: Editact
    },
    {
        name: 'Deleteact',
        path: '/act-delete',
        component: Deleteact
    },

    {
        name: 'Viewact',
        path: '/view/:id',
        component: Viewact
    }*/
];

const router = new VueRouter({ mode: 'history', routes: routes});

new Vue(
    Vue.util.extend(
        { router },
        AppLayout

    )


).$mount('#el');