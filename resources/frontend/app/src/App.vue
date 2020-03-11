<template>
  <div id="app" class="back">
    <v-app id="inspire">
      <router-view/>
      <v-dialog
      v-model="addToHomeScreen"
      max-width="300"
      >
      <v-card class="mx-auto pt-2">
            <v-card-text class="pb-0">
             لطفا با زدن دکمه ی زیر این وب اپلیکیشن را به گوشی خود اضافه نمایید 
            </v-card-text>
            <v-card-actions center style="justify-content: center;">
              
              <v-btn @click="handleAdd" color="primary"> افزودن اپلیکیشن </v-btn>
            </v-card-actions>
          </v-card>
      </v-dialog>
       <!-- <button id="test">test</button> -->
      <!-- <div class="overlay"></div>
      <div class="promptBox">
       لطفا جهت استفاده از امکانات وب اپلیکیشن یونیک ترید، با فشردن دکمه زیر آن را به صفحه home گوشی خود اضافه نمایید.
        <v-btn block height="55" color="primary" class="btnPrompt mt-3"> 
          اضافه کردن
        </v-btn>
       
      </div> -->
    </v-app>
  </div>
</template>
<script>
// import Navbar from '@/components/Navbar.vue'
// import Footer from '@/components/Footer.vue'
export default {
  name: 'App',
  // components: {Navbar,Footer},
  data: () => ({
    addToHomeScreen:false,
    deferredPrompt:null
  }),
  methods:{
    handleAdd: function(){
      this.addToHomeScreen = false;
      this.deferredPrompt.prompt();
      this.deferredPrompt.userChoice.then((choiceResult)=>{
          if(choiceResult.outcome === 'accepted'){
              console.log('hoora')
          }
          this.deferredPrompt = null;
      })
      
    }
  },
  mounted(){
    window.addEventListener('beforeinstallprompt',(e)=>{
        e.preventDefault();
        this.deferredPrompt = e;
        this.addToHomeScreen = true;
    })
    // var promptBox = document.querySelector('.promptBox');
    // var btnPrompt = document.querySelector('.btnPrompt');
    // var overlay = document.querySelector('.overlay');
    // var deferredPrompt = null;
    // window.addEventListener('beforeinstallprompt',(e)=>{
    //   e.preventDefault();
    //   deferredPrompt = e;
    //   promptBox.style.opacity= '1';
    //   promptBox.style.zIndex= '99';
    //   promptBox.style.height= '190px';
    //   // promptBox.style.display= 'block';
    //   overlay.style.zIndex= '80';
    // });
    // btnPrompt.addEventListener('click',()=>{
    //   promptBox.style.opacity= '0';
    //   promptBox.style.zIndex= '-80';
    //   promptBox.style.height= '0px';
    //   // promptBox.style.display= 'none';
    //   overlay.style.zIndex= '-9999';
    //   deferredPrompt.prompt();
    //   deferredPrompt.userChoice.then((choiceResult)=>{
    //       if(choiceResult.outcome === 'accepted'){
    //           console.log('hoora')
    //       }
    //       deferredPrompt = null;
    //   })
    // });
    // document.querySelector('#test').addEventListener('click',function(){
    //   promptBox.style.opacity= '1';
    //   promptBox.style.zIndex= '99';
    //   promptBox.style.height= '190px';
    //   overlay.style.zIndex= '80';
    // })
  }
}
</script>
<style scoped>

  .promptBox{
    position: fixed;
    background: whitesmoke;
    padding: 5px 12px;
    bottom: 0;
    left: 0;
    right: 0;
    font-size: 22px;
    font-weight: bold;
    z-index: -80;
    opacity: 0;
    height: 0;
    transition:all .4s ease;
    /* display: none; */
  }
  .btnPrompt{
    font-size: 18px!important;
    font-weight: bold;
  }
  .overlay{
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: #00000090;
    z-index: -9999;
  }

</style>