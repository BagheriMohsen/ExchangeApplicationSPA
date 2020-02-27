<template>
    <div id="layout">
        <Navbar :user="user"/>

        <v-content style="padding-left: 4px;padding-right: 4px;">
            <button style="display:none" @click="playSound">play</button>
            <router-view :user="user" @checkToken="checkToken"></router-view>
        </v-content>

        <v-dialog v-model="tutorialDialog" max-width="290">
          <v-card class="mx-auto pt-2">
            <v-card-text class="pb-0">
              لطفاابتدا به لینک زیر رفته و آموزش استفاده از اپلیکیشن را مطالعه فرمایید
            </v-card-text>
            <v-checkbox class="py-0 pr-4"
                v-model="checkbox"
                label="دیگر این پیام نشان داده نشود"
              >
            </v-checkbox>
            <v-card-actions center style="justify-content: center;">
              
              <v-btn color="success" v-on:click="handleRead">
                <a class="white--text" style="text-decoration: none" href="http://www.sarafi.com">خواندن مقاله</a>
              </v-btn>
              <v-btn color="info" v-on:click="handleLater">بعدا </v-btn>
            </v-card-actions>
          </v-card>
        </v-dialog>
        <v-dialog v-model="notifDialog" max-width="290">
          <v-card class="mx-auto pt-2">
            <v-card-text class="pb-0">
            لطفا جهت پخش صدای نوتیف ها کلیک کنید
            </v-card-text>
            <v-card-actions center style="justify-content: center;">
              <v-btn @click="handleNotifClick" color="info">فعالسازی </v-btn>
            </v-card-actions>
          </v-card>
        </v-dialog>


        <Footer :user="user"/>
    </div>
</template>

<script>
import Navbar from '@/components/Navbar.vue'
import Footer from '@/components/Footer.vue'
import Pusher from 'pusher-js'
// import {OneSignal} from '../main'
export default {
  name: 'App',
  components: {Navbar,Footer},
  data(){
    return{
      token:localStorage.getItem('token'),
      user:'',
      audio: new Audio('https://freesound.org/data/previews/66/66136_606715-lq.mp3'),
      notifDialog:false,
      tutorialDialog: false,
      checkbox:false
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
              this.initOneSignal();
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
        this.notifDialog = true;
      }else{
        let planList =[]
        this.user.plans.forEach(function(item){
            planList.push(item.plan.type);
        });
        if(planList.includes('forex') && planList.includes('binary')){
          this.farxSubscribe();
          this.binarySubscribe();
          this.notifDialog = true;
        }else if(planList.includes('both')){
          this.farxSubscribe();
          this.binarySubscribe();
          this.notifDialog = true;
        }else if(planList.includes('forex')){
          this.farxSubscribe();
          this.notifDialog = true;
        }else if(planList.includes('binary')){
          this.binarySubscribe();
          this.notifDialog = true;
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
    handleLater(){
      this.tutorialDialog = false;
      if(this.checkbox == true){
        this.$http.get('user-guide-check/' + this.user.id)
          .then(res => console.log(res))
          .catch(err => console.log(err));
        this.$emit('checkToken');
      }
      
    },
    handleRead(){
      this.tutorialDialog = false;
      if(this.checkbox == true){
        this.$http.get('user-guide-check/' + this.user.id)
          .then(res => console.log(res))
          .then(() => window.location.href = 'http://www.sarafi.com')
          .catch(err => console.log(err));
        this.$emit('checkToken');
        window.location.href = 'http://www.sarafi.com';
      }
      
    },
    checkUserGuide(){
      if(this.user.guide_check == '1'){
        this.tutorialDialog = false
      }else if(this.user.guide_check == '0'){
        this.tutorialDialog = true
      }
    },
    handleNotifClick(){
      this.notifDialog = false;
      this.audio.play();
    },
    playSound(){
      this.audio.play();
    },
    initOneSignal(){
      var OneSignal = window.OneSignal || [];
      OneSignal.push(() => {
        OneSignal.on('subscriptionChange', (isSubscribed) => {
        console.log("The user's subscription state is now:",isSubscribed);
          OneSignal.push(()=> {
            OneSignal.getUserId((userId) => {
              console.log("OneSignal User ID:", userId);
              this.$http.get('take-token/' + userId,{
                params:{
                  api_key : this.user.api_key
                }
              })
              .then(res=>console.log(res))
              .catch(err=>console.log(err))
            });
          });
        });
      });

        OneSignal.push(["init", {
          appId: "ff1ec971-1cab-4a8e-9225-d3fb2d3ef701",
          autoRegister: false,
          promptOptions: {
              /* My prompt options */
          },
          welcomeNotification: {
              //my options
          },
          notifyButton: {
            enable: true,
            showCredit: false,
            prenotify: true,
            position: 'bottom-left',
            text: {
              /*My text options */
          },
          colors: { // My custom colors
          }
        }
      }]);
      // OneSignal.push(function() {
      //   OneSignal.init({
      //     appId: "ff1ec971-1cab-4a8e-9225-d3fb2d3ef701",
      //   });
      // });
      // OneSignal.push(()=>{
      //   OneSignal.getUserId().then(userId => {
      //     console.log(userId);
      //     // this.oneSignalId = userId;
      //     alert(userId);
      //     // alert(this.oneSignalId);
      //   });
      // });
      // OneSignal.push(function() {
      //   OneSignal.on('subscriptionChange', function (isSubscribed) {
      //   console.log("The user's subscription state is now:",isSubscribed);
      //     OneSignal.push(function() {
      //       OneSignal.getUserId(function(userId) {
      //         console.log("OneSignal User ID:", userId);
      //         alert(userId);
      //       });
      //     });
      //   });
      // });
    }
  },
  mounted(){
    this.checkToken();
    // this.initOneSignal();
    this.checkUserGuide();
  },
  updated(){
  },
  watch:{
        user:{
          handler(){
            this.checkUserGuide();
          }
        }
  },
};
</script>

