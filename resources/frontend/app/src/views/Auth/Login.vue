<template>
    <section>
        <v-container>
            <v-row dark :justify="'center'">
                <v-col
                    cols="12"
                    :class="'text-center'">
                    
                    <v-form @submit.prevent="submit"
                    ref="form"
                    v-model="valid"
                    lazy-validation
                    >
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
                      @click="submit"
                      >
                      ورود
                      </v-btn>
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
                    :counter="5"
                    required
                    ></v-text-field>
                    <v-btn
                    dark
                    color="success"
                    class="mt-3"
                    @click.prevent="logIn"
                    >
                    ورود
                    </v-btn>
                </v-form>
                </v-col>
                
                
            </v-row>
             <!-- <v-row :justify="'center'">
                <v-col cols="12" :class="'text-center'">
                    <v-btn router :to="'/'"
                    color=""
                    class="">
                     ورود به عنوان کاربر مهمان
                    </v-btn>
                </v-col>
            </v-row> -->
             <v-row :justify="'center'">
                <v-col cols="12" :class="'text-center'">
                    <router-link color="white" to="/register">
                      <span class="white--text"> هنوز ثبت نام نکرده اید؟ لطفا اینجا کلیک کنید</span>
                    </router-link>
                </v-col>
            </v-row>
        </v-container>
    </section>
</template>
<script>
  export default {
    data: () => ({
      valid: true,
      submitDone: false,
      phone: '',
      code:'',
      phoneRules: [
        v => !!v || 'شماره همراه الزامی است',
        v => /^[0-9]*$/.test(v) || 'شماره همراه معتبر نیست',
        v => (v && v.length == 11) || 'شماره همراه بایستی 11 رقمی باشد',
      ]
    }),

    methods: {
      submit(){
        if(this.$refs.form.validate()){
          this.$http.get('/checkphone',{phone:this.phone})
            .then(response => {
              if(response.status == 'ok'){
                 this.submitDone = true;
              }else{
                alert('There is no such phone log in')
              }
            })
        }
      },
      logIn(){
        this.$http.post('http://localhost:8000/login',{phoneNumber:this.phone,role_id:'2'})
            .then(response => {
              if(response.data.token){
                localStorage.setItem('token',response.data.token);
                this.$router.push('/');
              }else{
                this.error = response.data;
              }
              
            }).catch((err)=>console.error(err));
      }
    },
  }
</script>