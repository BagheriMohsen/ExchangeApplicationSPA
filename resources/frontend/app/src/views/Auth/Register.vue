<template>
    <section>
        <v-container>
            <v-row dark :justify="'center'">
              <v-col  cols="12" :class="'text-center'">
                <v-btn outlined color="white" style="min-width: 57px;" @click="currentComponent = 'persian-register'">
                  فارسی
                </v-btn>
                <v-btn outlined color="white" style="min-width: 57px;" @click="currentComponent = 'english-register'">
                  English
                </v-btn>
                <v-btn outlined color="white" style="min-width: 57px;" @click="currentComponent = 'arabic-register'">
                  عربی
                </v-btn>
              </v-col>
            </v-row>
            <component v-bind:is="currentComponent"></component>
        </v-container>
    </section>
</template>
<script>
import PersianRegister from '@/components/Register/PersianRegister.vue'
import EnglishRegister from '@/components/Register/EnglishRegister.vue'
import ArabicRegister from '@/components/Register/ArabicRegister.vue'
  export default {
    components:{
      'persian-register':PersianRegister,
      'arabic-register':ArabicRegister,
      'english-register':EnglishRegister
    },
    data: () => ({
      'currentComponent' : 'persian-register',
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