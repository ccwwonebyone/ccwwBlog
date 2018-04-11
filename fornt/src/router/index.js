import Vue from 'vue'
import Router from 'vue-router'
import Test from '@/components/Test'
import Menu from '@/components/Menu'

Vue.use(Router)

export default new Router({
  routes: [
    {
      	path: '/',
      	name: 'test',
      	component: Test
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
