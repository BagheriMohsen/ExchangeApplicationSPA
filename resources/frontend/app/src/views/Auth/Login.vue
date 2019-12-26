<template>
    <section>
        <v-container>
            <v-row dark :justify="'center'">
              <v-col  cols="12" :class="'text-center'">
                <v-btn outlined color="white" style="min-width: 57px;" class="" @click="currentComponent = 'persian-login'">
                  فارسی
                </v-btn>
                <v-btn outlined color="white" style="min-width: 57px;" class="" @click="currentComponent = 'english-login'">
                  English
                </v-btn>
                <v-btn outlined color="white" style="min-width: 57px;" class="" @click="currentComponent = 'arabic-login'">
                  عربی
                </v-btn>
              </v-col>
            </v-row>
            <component v-bind:is="currentComponent"></component>
        </v-container>
    </section>
</template>
<script>
  import ClipLoader from 'vue-spinner/src/ClipLoader.vue'
  import PersianLogin from '@/components/Login/PersianLogin.vue'
  import EnglishLogin from '@/components/Login/EnglishLogin.vue'
  import ArabicLogin from '@/components/Login/ArabicLogin.vue'
  export default {
    components:{
      ClipLoader,
      'persian-login':PersianLogin,
      'arabic-login':ArabicLogin,
      'english-login':EnglishLogin
    },
    data: () => ({
      'currentComponent' : 'persian-login',
    }),

    methods: {
      checkToken(){
        if(localStorage.getItem('token')){
          this.$router.push('/');
        }
      }
    },
    created(){
      this.checkToken();
    },
    mounted(){
      this.checkToken();
    }
  }
</script>
<style scoped>
 .v-spinner{
   display:flex!important;
 }
 .v-btn__content{
   font-size: 11px
 }
 .v-btn{
   margin: 0px 1px;
   padding:0px 5px!important;
 }
</style>