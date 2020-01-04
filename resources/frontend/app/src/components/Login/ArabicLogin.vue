<template>
      <v-row dark :justify="'center'">
                <v-col
                    cols="12"
                    :class="'text-center'">
                    
                    <v-form 
                    ref="form"
                    v-model="valid"
                    lazy-validation
                    >
                      <v-text-field
                      dark
                      v-model="user.phone"
                      :rules="phoneRules"
                      :counter="11"
                      label="شماره همراه"
                      required
                      ></v-text-field>

                      <v-btn
                      dark
                      :disabled="!valid"
                      color="info"
                      class="mt-3"
                      @click.prevent="receiveCode"
                      >
                      <span v-if="!loading">ورود</span>
                      <clip-loader v-if="loading" :color="'white'" :size="'26px'"></clip-loader>
                      </v-btn>
                      <div v-if="error.info" class="error mt-3 py-1 white--text" style="font-size:.8rem">{{error.info}}</div>
                  </v-form>
                </v-col>
                <v-col
                    cols="12"
                    :class="'text-center'">
                    
                    <v-form v-if="code.sended" >

                    <v-text-field
                    dark
                    v-model="code.userInput"
                    label="کد ارسالی را وارد نمایید"
                    :counter="4"
                    required
                    ></v-text-field>
                    <v-btn
                    dark
                    color="info"
                    class="mt-3"
                    @click.prevent="verifyCode"
                    >
                    ارسال کد
                    </v-btn>
                    <div v-if="error.code" class="error mt-3 py-1 white--text" style="font-size:.8rem">{{error.code}}</div>
                </v-form>
                </v-col>
                <v-col cols="12" :class="'text-center'">
                    <router-link color="white" to="/register">
                      <span class="white--text"> هنوز ثبت نام نکرده اید؟ لطفا اینجا کلیک کنید</span>
                    </router-link>
                </v-col>
            </v-row>
</template>
<script>
import ClipLoader from 'vue-spinner/src/ClipLoader.vue'
  export default {
    components:{
        ClipLoader
    },
    data: () => ({
      loading:false,
      valid: true,
      user:{
        id:'',
        phone:''
      },
      code:{
        userInput:'',
        sms:'',
        sended: false,
      },
      error:{
        info:'',
        code:'',
      },
      lang:'fa',
      phoneRules: [
        v => !!v || 'شماره همراه الزامی است',
        v => /^[0-9]*$/.test(v) || 'شماره همراه معتبر نیست',
        v => (v && v.length == 11) || 'شماره همراه بایستی 11 رقمی باشد',
      ]
    }),

    methods: {
      receiveCode(){
        if(this.$refs.form.validate()){
          this.loading = true;
          this.$http.post('https://exchange.tipsy.ir/login',{
            phoneNumber:this.user.phone,
            role_id:'2'
          }).then(response => {
            if(response.data.DigitValidate){
              this.code.sended = true;
              this.user.id = response.data.user_id;
              this.code.sms = response.data.DigitValidate;
            }else{
              this.error.info = response.data;
            }
            this.loading = false;
          }).catch((err)=>{console.error(err);this.loading = false;});
        }
      },
      verifyCode(){
        if(this.code.userInput == this.code.sms){
           this.$http.get('https://exchange.tipsy.ir/sendVerfySms',{
              params:{
                user_id: this.user.id
              }
            }).then(res => {
              console.log(res);
              localStorage.setItem('token',res.data.token);
              this.$router.push('/');
            }).catch(err => console.log(err));
        }else{
          this.error.code = 'رمز وارد شده اشتباه می باشد';
        }
      }
    },
    
  }
</script>
<style scoped>
 .v-spinner{
   display:flex!important;
 }
</style>