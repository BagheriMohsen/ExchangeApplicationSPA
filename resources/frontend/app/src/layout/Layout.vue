<template>
    <div id="layout">
        <Navbar :user="user"/>
        <v-content style="padding-left: 4px;padding-right: 4px;">
            <router-view :user="user"></router-view>
        </v-content>
        <Footer :user="user"/>
    </div>
</template>

<script>
import Navbar from '@/components/Navbar.vue'
import Footer from '@/components/Footer.vue'
export default {
  name: 'App',
  components: {Navbar,Footer},
  data(){
    return{
      token:localStorage.getItem('token'),
      user:'',
    }
  },
  methods:{
    checkToken(){
        if(this.token == ''){
          this.$router.push('/login');
        }else{
          this.$http.get('http://localhost:8000/token',{params:{token:this.token}})
            .then(response => {
              this.user = response.data;
              console.log(response);
              }).catch(err => {
                console.log(err);
                if(err.response.status == 400 || err.response.status == 401){
                  this.$router.push('/login');
                }
              });
        }
    },
  },
  created(){
    this.checkToken();
  },
  updated(){
  }
};
</script>

