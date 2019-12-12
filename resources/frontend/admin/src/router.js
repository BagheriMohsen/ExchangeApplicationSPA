import Vue from 'vue'
import Router from 'vue-router'
import DashboardLayout from '@/layout/DashboardLayout'
Vue.use(Router)

export default new Router({
  base: '/admin/',
  linkExactActiveClass: 'active',
  routes: [
    {
      path: '/',
      redirect: 'dashboard',
      component: DashboardLayout,
      children: [
        // {
        //   path: '/dashboard',
        //   name: 'پیشخوان',
        //   // route level code-splitting
        //   // this generates a separate chunk (about.[hash].js) for this route
        //   // which is lazy-loaded when the route is visited.
        //   component: () => import(/* webpackChunkName: "demo" */ './views/Dashboard.vue')
        // },
        {
          path: '/farx',
          name: 'فارکس',
          component: () => import(/* webpackChunkName: "demo" */ './views/Farx.vue')
        },
        {
          path: '/binary',
          name: 'باینری آپشن ',
          component: () => import(/* webpackChunkName: "demo" */ './views/Binary.vue')
        },
        {
          path: '/articles',
          name: ' مقالات',
          component: () => import(/* webpackChunkName: "demo" */ './views/AddArticle.vue')
        },
        {
          path: '/add-currency',
          name: ' افزودن ارز ',
          component: () => import(/* webpackChunkName: "demo" */ './views/AddCurrency.vue')
        }
      ]
    }
  ]
})
