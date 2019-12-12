<template>
  <div class="wrapper" :class="{ 'nav-open': $sidebar.showSidebar }">
    <side-bar
      :background-color="sidebarBackground"
      short-title="Argon"
      title="Argon"
    >
      <template slot="links">
        <!-- <sidebar-item
          :link="{
            name: 'پیشخوان',
            icon: 'fas fa-home text-light',
            path: '/dashboard'
          }"
        /> -->

        <sidebar-item :link="{name: 'فارکس', icon: 'fas fa-coins text-light ', path: '/farx'}"/>
        <sidebar-item :link="{name: 'باینری آپشن', icon: 'fas fa-money-check-alt text-light', path: '/binary'}"/>
        <sidebar-item :link="{name: 'مقالات', icon: 'fas fa-newspaper text-light', path: '/articles'}"/>
        <sidebar-item :link="{name: 'لیست ارزها', icon: 'fas fa-list text-light', path: '/add-currency'}"/>
        <!-- <sidebar-item :link="{name: 'تیکت ها', icon: 'ni ni-support-16 text-yellow', path: '/tickets'}"/>
        <sidebar-item :link="{name: 'حساب کاربری', icon: 'ni ni-circle-08 text-red', path: '/profile'}"/>
        <sidebar-item :link="{name: 'حساب های بانکی', icon: 'ni ni-credit-card text-green', path: '/bank'}"/> -->
        <!-- <sidebar-item :link="{name: 'Login', icon: 'ni ni-key-25 text-info', path: '/login'}"/>
        <sidebar-item :link="{name: 'Register', icon: 'ni ni-circle-08 text-pink', path: '/register'}"/> -->

      </template>
    </side-bar>
    <div class="main-content" :data="sidebarBackground">
      <dashboard-navbar></dashboard-navbar>

      <div @click="toggleSidebar">
        <fade-transition :duration="200" origin="center top" mode="out-in">
          <!-- your content here -->
          <router-view></router-view>
        </fade-transition>
        <content-footer v-if="!$route.meta.hideFooter"></content-footer>
      </div>
    </div>
  </div>
</template>
<script>
  import DashboardNavbar from './DashboardNavbar.vue';
  import ContentFooter from './ContentFooter.vue';
  import { FadeTransition } from 'vue2-transitions';

  export default {
    components: {
      DashboardNavbar,
      ContentFooter,
      FadeTransition
    },
    data() {
      return {
        sidebarBackground: 'orange' //vue|blue|orange|green|red|primary
      };
    },
    methods: {
      toggleSidebar() {
        if (this.$sidebar.showSidebar) {
          this.$sidebar.displaySidebar(false);
        }
      }
    }
  };
</script>
<style lang="scss">
</style>
