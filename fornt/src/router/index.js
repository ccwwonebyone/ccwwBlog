import Vue from 'vue'
import Router from 'vue-router'

import Test from '@/view/Test'
import Menu from '@/view/Menu'
import Login from '@/view/Login'
import Register from '@/view/Register'
import Home from '@/view/Home'
import Api from '@/view/Api'
import Db from '@/view/Db'
import Company from '@/view/Company'
import ComponentEdit from '@/view/component/ComponentEdit'

Vue.use(Router)

export default new Router({
    routes: [
        { path: '/home', name: 'home', component: Home },

        { path: '/', name: 'register', component: Register },

        { path: '/login', name: 'login', component: Login },

        { path: '/test', name: 'test', component: Test },

        { path: '/menu', name: 'menu', component: Menu },

        { path: '/reg', name: 'reg', component: Register },

        { path: '/api', name: 'api', component: Api },

        { path: '/db', name: 'db', component: Db },

        { path: '/company', name: 'company', component: Company },

        { path: '/component_edit', name: 'component_edit', component: ComponentEdit }
    ]
})