import Vue from 'vue'
import Router from 'vue-router'
import Test from '@/view/Test'
import Menu from '@/view/Menu'
import Login from '@/view/Login'
import Register from '@/view/Register'

Vue.use(Router)

export default new Router({
  routes: [
    {
      	path: '/',
      	name: 'login',
      	component: Login
    },
    {
      	path: '/test',
      	name: 'test',
      	component: Test
    },
    {
      	path: '/menu',
      	name: 'menu',
      	component: Menu
    },
    {
        path: '/register',
        name: 'register',
        component: Register
    }
  ]
})
