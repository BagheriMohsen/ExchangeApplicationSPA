<template>
    <section>
        <transition name="fade">
            <pulse-loader :loading="loading" :color="'white'" :size="'10px'"></pulse-loader>
        </transition>
        <div v-if="subscribedUser" class="container-fluid">
            <div class="row">
                <div class="col-12" v-for="notif in notifs" v-bind:key="notif.id">
                    <farx-notif :notifInfo="notif"></farx-notif>
                </div>
            </div>
        </div>
        <div v-if="!subscribedUser" class="white--text">
          این بخش تنها برای کاربران ویژه قابل دسترس است
        </div>
    </section>
</template>

<script>

  import FarxNotif from '@/components/FarxNotif.vue'
  import Pusher from 'pusher-js'
  import PulseLoader from 'vue-spinner/src/PulseLoader.vue'
  export default {
    components:{
      FarxNotif,
      PulseLoader
    },
    data () {
      return {
        notifs:[],
        showNotifs:[],
        subscribedUser:true,
        token:true,
        loading:false
      }
    },
    methods:{
      fetchNotif(){
        this.$http.get('http://localhost:8000/forex/AllForex')
          .then(res => {
            this.notifs = res.data;
          })
          .catch(err => console.log(err));
      },
      subscribe(){
        let pusher = new Pusher('0b6db206a7be0ce7e956', { cluster: 'ap2' })
        pusher.subscribe('ForexNotif')
        pusher.bind('App\\Events\\ForexNotifEvent', data => {
          this.notifs = data.Forex;
        })
      },
    
      checkAuth(){
        if(this.token){
          //initie true
        }else{
          this.$router.push('/login');
        }
      }
    },
    created () {
      this.fetchNotif();
      this.subscribe();
    },
    updated(){
    },
    mounted(){
      this.checkAuth();
    }
  }
</script>

<style scoped>
   .col-12{
    padding-top: 3px;
    padding-bottom: 3px;
  }
  .loading {
    text-align: center;
    position: absolute;
    color: #fff;
    z-index: 9;
    background: rgba(42, 116, 165, 0.73);
    padding: 8px 18px;
    border-radius: 5px;
    left: calc(50% - 45px);
    top: calc(50% - 18px);
}
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.5s;
}
.fade-enter,
.fade-leave-to {
  opacity: 0;
}
 </style>