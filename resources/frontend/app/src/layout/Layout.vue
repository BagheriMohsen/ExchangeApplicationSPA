<template>
    <div id="layout">
        <Navbar/>
        <v-content style="padding-left: 4px;padding-right: 4px;">
            <router-view></router-view>
        </v-content>
        <Footer/>
    </div>
</template>

<script>
import Navbar from '@/components/Navbar.vue'
import Footer from '@/components/Footer.vue'
export default {
  name: 'App',
  components: {Navbar,Footer},
  data: () => ({
    //
  }),
};
</script>

