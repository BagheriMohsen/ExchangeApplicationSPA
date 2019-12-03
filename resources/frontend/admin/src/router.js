import Vue from 'vue'
import Router from 'vue-router'
import DashboardLayout from '@/layout/DashboardLayout'
import AuthLayout from '@/layout/AuthLayout'
Vue.use(Router)

export default new Router({
  linkExactActiveClass: 'active',
  routes: [
    {
      path: '/',
      redirect: 'dashboard',
      component: DashboardLayout,
      children: [
        {
          path: '/dashboard',
          name: 'پیشخوان',
          // route level code-splitting
          // this generates a separate chunk (about.[hash].js) for this route
          // which is lazy-loaded when the route is visited.
          component: () => import(/* webpackChunkName: "demo" */ './views/Dashboard.vue')
        },
        {
          path: '/farx',
          name: 'فارکس',
          component: () => import(/* webpackChunkName: "demo" */ './views/Farx.vue')
        },
        {
          path: '/add-article',
          name: 'افزودن مقاله',
          component: () => import(/* webpackChunkName: "demo" */ './views/AddArticle.vue')
        },
        {
          path: '/articles',
          name: ' مقالات',
          component: () => import(/* webpackChunkName: "demo" */ './views/AddArticle.vue')
        },
        {
          path: '/profile',
          name: ' حساب کاربری ',
          component: () => import(/* webpackChunkName: "demo" */ './views/Profile.vue')
        },
        {
          path: '/bank',
          name: ' حساب های بانکی ',
          component: () => import(/* webpackChunkName: "demo" */ './views/BankAccount.vue')
        },
        {
          path: '/addticket',
          name: 'ارسال تیکت',
          component: () =>import('./views/AddTicket')
        },{
          path: '/editprofile',
          name: 'ویرایش حساب کاربری',
          component:() =>import('./views/EditProfile')
        },{
          path: '/addbankaccount',
          name: 'افزودن حساب بانکی',
          component:() =>import('./views/AddBankAccount')
        }
      ]
    },
    {
      path: '/',
      redirect: 'login',
      component: AuthLayout,
      children: [
        {
          path: '/login',
          name: 'login',
          component: () => import(/* webpackChunkName: "demo" */ './views/Login.vue')
        },
        {
          path: '/register',
          name: 'register',
          component: () => import(/* webpackChunkName: "demo" */ './views/Register.vue')
        }
      ]
    }
  ]
})
