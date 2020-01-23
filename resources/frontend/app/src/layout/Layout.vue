<template>
    <div id="layout">
        <Navbar :user="user"/>
        <v-content style="padding-left: 4px;padding-right: 4px;">
            <router-view :user="user" @checkToken="checkToken"></router-view>
        </v-content>
        <Footer :user="user"/>
    </div>
</template>

<script>
import Navbar from '@/components/Navbar.vue'
import Footer from '@/components/Footer.vue'
import Pusher from 'pusher-js'
export default {
  name: 'App',
  components: {Navbar,Footer},
  data(){
    return{
      token:localStorage.getItem('token'),
      user:'',
      audio: new Audio('https://freesound.org/data/previews/66/66136_606715-lq.mp3'),
    }
  },
  methods:{
    checkToken(){
        if(this.token == ''){
          this.$router.push('/login');
        }else{
          this.$http.get('token',{params:{token:this.token}})
            .then(response => {
              this.user = response.data;
              this.checkSubscribe();
              }).catch(err => {
                console.log(err);
                this.$router.push('/login');
              });
        }
    },
    checkSubscribe(){
      if(this.user.freeTime){
        this.farxSubscribe();
        this.binarySubscribe();
      }else{
        let planList =[]
        this.user.plans.forEach(function(item){
            planList.push(item.plan.type);
        });
        if(planList.includes('forex') && planList.includes('binary')){
          this.farxSubscribe();
          this.binarySubscribe();
        }else if(planList.includes('both')){
          this.farxSubscribe();
          this.binarySubscribe();
        }else if(planList.includes('forex')){
          this.farxSubscribe();
        }else if(planList.includes('binary')){
          this.binarySubscribe();
        }
      }
    },
    farxSubscribe(){
      let pusher = new Pusher('0b6db206a7be0ce7e956', { cluster: 'ap2' })
      pusher.subscribe('ForexNotif')
      pusher.bind('App\\Events\\ForexNotifEvent', () => this.audio.play())
    },
    binarySubscribe(){
        let pusher = new Pusher('0b6db206a7be0ce7e956', { cluster: 'ap2' })
        pusher.subscribe('BinaryNotif')
        pusher.bind('App\\Events\\BinaryNotif', () => this.audio.play())
    },
  },
  created(){
    this.checkToken();
  },
  updated(){
  },
  mounted(){
  }
};
</script>

