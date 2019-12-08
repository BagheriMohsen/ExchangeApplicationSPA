<template>
  <div class="wrapper" :class="{ 'nav-open': $sidebar.showSidebar }">
    <side-bar
      :background-color="sidebarBackground"
      short-title="Argon"
      title="Argon"
    >
      <template slot="links">
        <sidebar-item
          :link="{
            name: 'پیشخوان',
            icon: 'fas fa-home text-dark',
            path: '/dashboard'
          }"
        />

        <sidebar-item :link="{name: 'فارکس', icon: 'fas fa-coins text-dark', path: '/farx'}"/>
        <sidebar-item :link="{name: 'باینری آپشن', icon: 'fas fa-money-check-alt text-dark', path: '/binary'}"/>
        <sidebar-item :link="{name: 'مقالات', icon: 'fas fa-newspaper text-dark', path: '/articles'}"/>
        <sidebar-item :link="{name: 'لیست ارزها', icon: 'fas fa-list text-dark', path: '/add-currency'}"/>
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
        sidebarBackground: 'vue' //vue|blue|orange|green|red|primary
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
