<template>
    <section>
        <div v-if="showNotif == 'show'" class="container-fluid">
            <div class="row">
                <div class="col-12" v-for="notif in notifs" v-bind:key="notif.id">
                    <binary-notif :binaryInfo="notif"></binary-notif>
                </div>
            </div>
        </div>
        <div v-if="showNotif == 'dontShow'" class="white--text">
          <v-card class="mx-1 bg-unique" dark router :to="'/subscription'"
        >
            <div class="d-flex flex-no-wrap justify-content-center">
                <div>
                    <v-card-subtitle center class="mt-0"> اشتراک رایگان شما به پایان رسیده است،لطفا برای خرید اشتراک باینری اقدام نمایید</v-card-subtitle>
                </div>
            </div>
            <div>
                <v-card-actions>
                    <v-btn style="background-color:rgba(137, 152, 165, 0.54)" block text>خرید اکانت</v-btn>
                </v-card-actions>
            </div>
        </v-card>
        </div>

        <!-- <div class="container-fluid">
            <div class="row">
                <div class="col-12" v-for="notif in notifs" v-bind:key="notif.id">
                    <binary-notif :binaryInfo="notif"></binary-notif>
                </div>
            </div>
        </div> -->
    </section>
   
</template>
<script>

  import BinaryNotif from '@/components/BinaryNotif.vue'
  import Pusher from 'pusher-js'
  // var moment = require('jalali-moment');
  // moment.locale('fa', { useGregorianParser: true }); 

  export default {
    props:{
      user:Object
    },
    components:{
      BinaryNotif
    },
    data () {
      return {
        notifs:[],
        showNotif: null,
        audio: new Audio('https://freesound.org/data/previews/66/66136_606715-lq.mp3')
      }
    },
    methods:{
      fetchNotif(){
        this.$http.get('binaries/AllBinaries')
          .then(res => {
            this.notifs = res.data;
          })
          .catch(err => console.log(err));
      },
      subscribe(){
        let pusher = new Pusher('0b6db206a7be0ce7e956', { cluster: 'ap2' })
        pusher.subscribe('BinaryNotif')
        pusher.bind('App\\Events\\BinaryNotif', data => {
          this.notifs = data.Binary;
        })
      },
      checkUserSubscribe(){
        if(this.user.freeTime){
          this.showNotif = 'show';
        }else{
          let planList =[]
          this.user.plans.forEach(function(item){
              planList.push(item.plan.type);
          });
          if(planList.includes('binary') || planList.includes('both')){
            this.showNotif = 'show';
          }else{
             this.showNotif = 'dontShow';
          }
        }
      }
    },
    watch:{
      user:{
        immediate:true,
        handler(){
          this.checkUserSubscribe();
        }
      }
    },
    created () {
      this.checkUserSubscribe();
      this.fetchNotif();
      this.subscribe();
    },
    updated(){
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