<template>
    <section>
        <v-container>
          {[submitDone]}
            <v-row dark :justify="'center'">
                <!-- <v-col  cols="12" :class="'text-center'">
                  <v-btn class="mx-1" @click="lang = 'fa';currentComponent = 'persian-register'">
                    فارسی
                  </v-btn>
                  <v-btn class="mx-1" @click="lang = 'en';currentComponent = 'english-register'">
                    English
                  </v-btn>
                  <v-btn class="mx-1" @click="lang = 'ar';currentComponent = 'arabic-register'">
                    عربی
                  </v-btn>
                </v-col> -->
                <v-col cols="12" :class="'text-center'">
                  <!-- <component v-bind:is="'persian-register'"></component> -->
                    <!-- <persian-register></persian-register> -->
                    <v-form 
                      ref="form"
                      v-model="valid"
                      lazy-validation
                    >
                    <v-text-field
                      dark
                      v-model="name"
                      :rules="nameRules"
                      label="نام و نام خانوادگی"
                      required
                    ></v-text-field>

                    <v-text-field
                      dark
                      v-model="phone"
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
                      @click="sendCode"
                      >
                      عضویت
                      </v-btn>
                      <div v-if="error" class="error mt-3 py-1 white--text" style="font-size:.8rem">{{error}}</div>
                  </v-form>
                </v-col>
                 <v-col
                    cols="12"
                    :class="'text-center'">
                    
                    <v-form v-if="submitDone" >

                    <v-text-field
                    dark
                    v-model="code"
                    label="کد ارسالی را وارد نمایید"
                    required
                    ></v-text-field>
                    <v-btn
                    dark
                    color="success"
                    class="mt-3"
                    @click.prevent="verifyCode"
                    >
                    ورود
                    </v-btn>
                </v-form>
                </v-col>
            </v-row>
             <v-row :justify="'center'">
                <v-col cols="12" :class="'text-center'">
                    <v-btn router :to="'/'"
                    color=""
                    class="">
                     ورود به عنوان کاربر مهمان
                    </v-btn>
                </v-col>
            </v-row>
             <v-row :justify="'center'">
                <v-col cols="12" :class="'text-center'">
                    <router-link color="white" to="/login">
                      <span class="white--text"> قبلا ثبت نام کرده اید؟ اینجا کلیک کنید</span>
                    </router-link>
                </v-col>
            </v-row>
        </v-container>
    </section>
</template>
<script>
// import PersianRegister from '@/components/Register/PersianRegister.vue'
// import EnglishRegister from '@/components/Register/EnglishRegister.vue'
// import ArabicRegister from '@/components/Register/ArabicRegister.vue'
  export default {
    components:{
      // 'persian-register':PersianRegister,
      // 'arabic-register':ArabicRegister,
      // 'english-register':EnglishRegister
    },
    data: () => ({
      valid: true,
      user_id:'',
      fourDigitRandom:'',
      name: '',
      error:'',
      code:'',
      submitDone: false,
      nameRules: [
        v => !!v || 'نام و نام خانوادگی الزامی است',
        v => (v && v.length <= 20) || 'نام و نام خانوادگی بایستی کمتر از 20 کاراکتر',
      ],
      phone: '',
      phoneRules: [
        v => !!v || 'شماره همراه الزامی است',
        v => /^[0-9]*$/.test(v) || 'شماره همراه معتبر نیست',
        v => (v && v.length == 11) || 'شماره همراه بایستی 11 رقمی باشد',
      ],
      lang:'fa',
      'currentComponent' : 'persian-register'
    }),

    methods: {
      submit(){
        if(this.$refs.form.validate()){
          this.submitDone = true;
        }
      },
      sendCode(){
        this.$http.post('http://localhost:8000/register',{FullName : this.name,phoneNumber:this.phone,role_id:'2'})
          .then(response => {
            // if(response.data.token){
            //   localStorage.setItem('token',response.data.token);
            //   this.$router.push('/');
            // }else{
            //   this.error = response.data;
            // }
            console.log(response.data);
            this.submitDone = true;
            this.user_id = response.data.user_id;
            this.fourDigitRandom = response.data.DigitValidate;
          }).catch((err)=>console.error(err));
      },
      verifyCode(){
        if(this.code == this.fourDigitRandom){
           this.$http.get('http://localhost:8000/sendVerfySms',{
          params:{
            user_id: this.user_id
          }
        }).then(res => console.log(res))
          .catch(err => console.log(err));
        }else{
          alert('کد وارد شده اشتباه است');
        }
       
      }
    },
  }
</script>