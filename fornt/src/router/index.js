import Vue from 'vue'
import Router from 'vue-router'

import Test from '@/view/Test'
import Menu from '@/view/Menu'
import Register from '@/view/Register'
import Home from '@/view/Home'
import Api from '@/view/Api'
import Db from '@/view/Db'
import Company from '@/view/Company'
import ComponentEdit from '@/view/component/ComponentEdit'
import PageEdit from '@/view/page/PageEdit'
import Layout from '@/view/Layout'

import Article from '@/view/Article'
import Category from '@/view/Category'
import Tag from '@/view/Tag'
import Login from '@/view/Login'
import ArticleForm from '@/view/ArticleForm'

import NotFound from '@/view/NotFound'
Vue.use(Router)

export default new Router({
    routes: [
        { path: '/home', name: 'home', component: Home },

        { path: '/', redirect:'/login' },

        { path: '/login', name: 'login', component: Login },

        { path: '/test', name: 'test', component: Test },

        { path: '/menu', name: 'menu', component: Menu },

        { path: '/reg', name: 'reg', component: Register },

        { path: '/api', name: 'api', component: Api },

        { path: '/db', name: 'db', component: Db },

        { path: '/company', name: 'company', component: Company },

        { path: '/component_edit', name: 'component_edit', component: ComponentEdit },

        { path: '/page_edit', name: 'page_edit', component: PageEdit },

        { path: '/layout', name: 'layout', component: Layout },

        { path: '/article', name: 'article', component: Article },

        { path: '/category', name: 'category', component: Category },

        { path: '/tag', name: 'tag', component: Tag },

        { path: '/article/:id/edit', name:"article_edit", component: ArticleForm, props: true},

        { path: '/article/create', name:"article_create", component: ArticleForm },

        // { path: '/404', name:"not_found", component: NotFound},

        { path: '*', redirect:'/company'}
    ]
})