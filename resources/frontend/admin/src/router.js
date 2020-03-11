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
      redirect: 'farx',
      component: DashboardLayout,
      children: [
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
        },
        {
          path: '/account-plan',
          name: ' اشتراک ',
          component: () => import(/* webpackChunkName: "demo" */ './views/AccountPlan.vue')
        },
        {
          path: '/users-list',
          name: ' کاربران ',
          component: () => import(/* webpackChunkName: "demo" */ './views/Users.vue')
        }
      ]
    }
  ]
})
