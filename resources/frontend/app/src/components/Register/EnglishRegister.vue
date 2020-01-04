<template>
     <v-row dark :justify="'center'">
              <v-col cols="12" :class="'text-center'">
                
                  <v-form 
                    ref="form"
                    v-model="valid"
                    lazy-validation
                  >
                  <v-text-field
                    dark
                    v-model="user.name"
                    :rules="nameRules"
                    label="Firstname and lastname"
                    required
                  ></v-text-field>

                  <v-text-field
                    dark
                    v-model="user.phone"
                    :rules="phoneRules"
                    :counter="11"
                    label="Phone number"
                    required
                  ></v-text-field>

                  <v-btn
                    dark
                    :disabled="!valid"
                    color="info"
                    class="mt-3"
                    @click="receiveCode"
                    >
                    <span v-show="!loading">Register</span>
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
                  label="Please insert the code"
                  required
                  ></v-text-field>
                  <v-btn
                  dark
                  :counter="4"
                  color="info"
                  class="mt-3"
                  @click.prevent="verifyCode"
                  >
                  Send code
                  </v-btn>
                  <div v-if="error.code" class="error mt-3 py-1 white--text" style="font-size:.8rem">{{error.code}}</div>
              </v-form>
              </v-col>
                <v-col cols="12" :class="'text-center'">
                  <router-link color="white" to="/login">
                    <span class="white--text"> If you registerd before please click here</span>
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
        name: '',
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
      lang:'en',
      nameRules: [
        v => !!v || 'First name and last name are required',
        v => (v && v.length <= 100) || 'First name and last name should be less than 100 character',
      ],
      phoneRules: [
        v => !!v || 'Phone number is required',
        v => /^[0-9]*$/.test(v) || 'Phone number is not valid',
        v => (v && v.length == 11) || 'Phone number should have 11 digits',
      ]
      
    }),
    methods: {
      receiveCode(){
        if(this.$refs.form.validate()){
          this.loading = true;
          this.$http.post('https://exchange.tipsy.ir/register',{
            FullName : this.user.name,
            phoneNumber:this.user.phone,
            role_id:'2',
            lang:this.lang
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
          this.error.code = 'Inserted code is not valid';
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