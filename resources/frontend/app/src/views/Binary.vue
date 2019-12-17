<template>
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12" v-for="notif in notifs" v-bind:key="notif.id">
                    <binary-notif :binaryInfo="notif"></binary-notif>
                </div>
            </div>
        </div>
    </section>
</template>
<script>

  import BinaryNotif from '@/components/BinaryNotif.vue'
  import Pusher from 'pusher-js'
  var moment = require('jalali-moment');
  moment.locale('fa', { useGregorianParser: true }); 

  export default {
    components:{
      BinaryNotif
    },
    data () {
      return {
       notifs:[]
      }
    },
    methods:{
      fetchNotif(){
        this.$http.get('http://localhost:8000/binaries/')
          .then(res => {
            this.notifs = res.data;
          })
          .catch(err => console.log(err));
      },
      subscribe(){
        let pusher = new Pusher('0b6db206a7be0ce7e956', { cluster: 'ap2' })
        pusher.subscribe('BinaryNotif')
        pusher.bind('App\\Events\\BinaryNotifEvent', data => {
          this.notifs = data.Binary;
          console.log(data.Binary); 
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
      }
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