<template>
    <div id="layout">
        <Navbar :user="user"/>

        <v-content style="padding-left: 4px;padding-right: 4px;">
            <!-- <button style="display:none" @click="playSound">play</button> -->
            <router-view :user="user" @checkToken="checkToken"></router-view>
        </v-content>

        <v-dialog v-model="tutorialDialog" max-width="290">
          <v-card class="mx-auto pt-2">
            <v-card-text class="pb-0">
              {{items.dialog}}
            </v-card-text>
            <v-checkbox class="py-0 pr-4"
                v-model="checkbox"
                :label="items.label"
              >
            </v-checkbox>
            <v-card-actions center style="justify-content: center;">

              <v-btn color="success" v-on:click="handleRead">
                <a class="white--text" style="text-decoration: none" href="http://www.sarafi.com"> {{items.read}}</a>
              </v-btn>
              <v-btn color="info" v-on:click="handleLater">{{items.later}} </v-btn>
            </v-card-actions>
          </v-card>
        </v-dialog>
        <v-dialog v-model="notifDialog" max-width="290">
          <v-card class="mx-auto pt-2">
            <v-card-text class="pb-0">
         لطفا امکان ارسال نوتیفیکیشن را با فشردن دکمه زیر حتما فعال کنید تا از آخرین سیگنال های ما سریعا مطلع شوید
            </v-card-text>
            <v-card-actions center style="justify-content: center;">
              <v-btn @click="handleNotifClick" color="info">فعالسازی </v-btn>
            </v-card-actions>
          </v-card>
        </v-dialog>

        <v-dialog v-model="notifDialogDenied" max-width="290">
          <v-card class="mx-auto pt-2">
            <v-card-text class="pb-0">
              امکان ارسال نوتیفیکشن در دستگاه شما محدود شده است، لطفا طبق آموزش زیر حتما امکان ارسال نوتیفیکیشن را بدهید
            </v-card-text>
            <v-card-actions center style="justify-content: center;">
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

var messaging = window.messaging;

export default {
  name: 'App',
  components: {Navbar,Footer},
  data(){
    return{
      token:localStorage.getItem('token'),
      user:'',
      audio: new Audio('https://freesound.org/data/previews/66/66136_606715-lq.mp3'),
      notifDialog:false,
      notifDialogDenied:false,
      tutorialDialog: false,
      checkbox:false,
      items:{},
      arabicItems:{
        dialog: 'لطفاابتدا به لینک زیر رفته و آموزش استفاده از اپلیکیشن را مطالعه فرمایید',
        label:'دیگر این پیام نشان داده نشود',
        later:'بعدا',
        read:'خواندن مقاله'
      },
      persianItems:{
        dialog: 'لطفاابتدا به لینک زیر رفته و آموزش استفاده از اپلیکیشن را مطالعه فرمایید',
        label:'دیگر این پیام نشان داده نشود',
        later:'بعدا',
        read:'خواندن مقاله'
      },
      englishItems:{
        dialog: 'Please go to the link below and read the tutorial on how to use app',
        label:"Don't show this again",
        later:'Later',
        read:'Read now'
      }
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
              this.checkNotifSetting();
              // this.initFCM();
              this.checkLanguage();
              this.checkSubscribe();
              }).catch(err => {
                console.log(err);
                localStorage.removeItem('token');
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
    checkLanguage(){
          if(this.user.language == 'ar'){
              this.items = this.arabicItems;
          }else if(this.user.language == 'en'){
              this.items = this.englishItems;
          }else{
              this.items = this.persianItems;
          }
    },
    initFCM(){
      messaging.requestPermission()
        .then((res)=>{
            console.log(res,'permission granted')
            return messaging.getToken();
        }).then((token)=>{
            this.$http.get('take-token/' + this.user.id,{
              params:{
                api_key : token
              }
            }).then(res=>console.log(res))
              .catch(err=>console.log(err))
        }).catch((err)=>{
            console.log(err)
        })
    },
    checkNotifSetting(){
      console.log(window.Notification.permission);
      var Notification = window.Notification || window.mozNotification || window.webkitNotification;
      if(Notification.permission === 'granted'){
        this.initFCM();
      }else if(Notification.permission === 'denied'){
        this.notifDialogDenied = true;
      }else{
        this.notifDialog = true;
      }
    },
    handleNotifClick(){
      this.notifDialog = false;
      this.initFCM();
    }
  },
  mounted(){
    this.checkToken();
    this.checkUserGuide();
    // this.initFCM();
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

