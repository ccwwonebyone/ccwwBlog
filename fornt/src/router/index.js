import Vue from 'vue'
import Router from 'vue-router'
import Test from '@/components/Test'
import Menu from '@/components/Menu'
import Login from '@/components/Login'

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
    }
  ]
})
