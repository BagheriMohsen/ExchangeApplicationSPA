<template>
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12" v-for="notif in notifs" v-bind:key="notif.id">
                    <farx-notif :notifInfo="notif"></farx-notif>
                </div>
            </div>
        </div>
    </section>
</template>

<script>

  import FarxNotif from '@/components/FarxNotif.vue'
  import Pusher from 'pusher-js'
  var moment = require('jalali-moment');
  moment.locale('fa', { useGregorianParser: true });  
  
  export default {
    components:{
      FarxNotif
    },
    data () {
      return {
        notifs:[],
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
          console.log(this.notifs); 
        })
      },
      convertToJalali(){
        let jalali_update = [];
        let jalali_create = [];
        this.notifs.forEach(function(item){
           jalali_update.push(moment(item.updated_at).format('YYYY/M/D HH:mm:ss')); 
           jalali_create.push(moment(item.created_at).format('YYYY/M/D HH:mm:ss')); 
        });
        this.notifs.forEach(function(item,index){
          item.jalali_update = jalali_update[index];
        });
        this.notifs.forEach(function(item,index){
          item.jalali_create = jalali_create[index];
        });
      },
    },
    created () {
      this.fetchNotif();
      this.subscribe();
      this.convertToJalali();
    },
    updated(){
      this.convertToJalali();
    }
  }
</script>

<style scoped>
   .col-12{
    padding-top: 3px;
    padding-bottom: 3px;
  }
 </style>