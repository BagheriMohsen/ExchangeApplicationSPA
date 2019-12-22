<template>
    <section>
        persianREgister
        <!-- <v-form 
                    
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
                    @click="register"
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
                    :counter="5"
                    required
                    ></v-text-field>
                    <v-btn
                    dark
                    color="success"
                    class="mt-3"
                    @click.prevent="validateCode"
                    >
                    ارسال کد ثبت نام
                    </v-btn>
                </v-form> -->
    </section>
</template>
<script>
  export default {
   
  }
</script>