import Vue from 'vue'
import VueRouter from 'vue-router'
import Layout from '@/layout/Layout.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'home',
    component: Layout,
    children: [
      {
        path: '/',
        name: 'آموزش',
        // route level code-splitting
        // this generates a separate chunk (about.[hash].js) for this route
        // which is lazy-loaded when the route is visited.
        component: () => import(/* webpackChunkName: "demo" */ '../views/Tutorial/Tutorial.vue')
      },
      {
        path: '/tutorial/farx',
        name: 'آموزش فارکس',
        // route level code-splitting
        // this generates a separate chunk (about.[hash].js) for this route
        // which is lazy-loaded when the route is visited.
        component: () => import(/* webpackChunkName: "demo" */ '../views/Tutorial/TutorialFarx.vue')
      },
      {
        path: '/tutorial/binary',
        name: 'آموزش باینری',
        // route level code-splitting
        // this generates a separate chunk (about.[hash].js) for this route
        // which is lazy-loaded when the route is visited.
        component: () => import(/* webpackChunkName: "demo" */ '../views/Tutorial/TutorialBinary.vue')
      },
      {
        path: '/tutorial/single/:id',
        name: 'مقاله آموزشی',
        // route level code-splitting
        // this generates a separate chunk (about.[hash].js) for this route
        // which is lazy-loaded when the route is visited.
        component: () => import(/* webpackChunkName: "demo" */ '../views/Tutorial/SingleTutorial.vue')
      },
      {
        path: '/farx',
        name: 'فارکس',
        // route level code-splitting
        // this generates a separate chunk (about.[hash].js) for this route
        // which is lazy-loaded when the route is visited.
        component: () => import(/* webpackChunkName: "demo" */ '../views/Farx.vue')
      },
      {
        path: '/binary',
        name: 'باینری آپشن',
        // route level code-splitting
        // this generates a separate chunk (about.[hash].js) for this route
        // which is lazy-loaded when the route is visited.
        component: () => import(/* webpackChunkName: "demo" */ '../views/Binary.vue')
      },
      {
        path: '/archive',
        name: 'آرشیو',
        // route level code-splitting
        // this generates a separate chunk (about.[hash].js) for this route
        // which is lazy-loaded when the route is visited.
        component: () => import(/* webpackChunkName: "demo" */ '../views/Archive.vue')
      },
      {
        path: '/contact',
        name: 'تماس با ما',
        // route level code-splitting
        // this generates a separate chunk (about.[hash].js) for this route
        // which is lazy-loaded when the route is visited.
        component: () => import(/* webpackChunkName: "demo" */ '../views/ContactUs.vue')
      },
      {
        path: '/about',
        name: 'درباره ی ما',
        // route level code-splitting
        // this generates a separate chunk (about.[hash].js) for this route
        // which is lazy-loaded when the route is visited.
        component: () => import(/* webpackChunkName: "demo" */ '../views/AboutUs.vue')
      },
      {
        path: '/subscription',
        name: 'اشتراک',
        // route level code-splitting
        // this generates a separate chunk (about.[hash].js) for this route
        // which is lazy-loaded when the route is visited.
        component: () => import(/* webpackChunkName: "demo" */ '../views/Subscription.vue')
      }
    ]
  },
  {
    path: '/register',
    name: 'عضویت',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "register" */ '../views/Auth/Register.vue')
  },
  {
    path: '/login',
    name: 'ورود',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "login" */ '../views/Auth/Login.vue')
  },
  {
    path: '/test',
    name: 'ورود',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "login" */ '../views/test.vue')
  }
]

const router = new VueRouter({
  // mode: 'history',
  base: '/',
  linkExactActiveClass: 'active',
  routes
})

export default router
