<template>
    <section>
        <v-container>
            <v-row :justify="'center'">
                <v-col
                    sm="6"
                    :class="'text-center'">
                    
                    <v-form
                    ref="form"
                    v-model="valid"
                    lazy-validation
                >
                    <v-text-field
                    v-model="phone"
                    :counter="11"
                    :rules="nameRules"
                    label="شماره همراه"
                    required
                    ></v-text-field>

                    <v-btn
                    :disabled="!valid"
                    color="success"
                    class="mr-4"
                    @click="validate"
                    >
                    ارسال کد 
                    </v-btn>

                    <v-text-field
                    v-model="code"
                    :counter="5"
                    :rules="nameRules"
                    label="کد ارسالی"
                    required
                    ></v-text-field>
                    
                </v-form>
                </v-col>
                
                
            </v-row>
             <v-row :justify="'center'">
                <v-col sm="6" :class="'text-center'">
                    <v-btn
                    color="secondary"
                    class="mr-4">
                     ورود به عنوان کاربر مهمان
                    </v-btn>
                </v-col>
               
                
            </v-row>
            <v-row :justify="'center'">
                <v-col sm="6" :class="'text-center'">
                   <router-link to="/register">هنوز ثبت نام نکرده اید؟ اینجا کلیک کنید</router-link>
                </v-col>
            </v-row>
        </v-container>
    </section>
</template>
<script>
  export default {
    data: () => ({
      valid: true,
      name: '',
      nameRules: [
        v => !!v || 'نام و نام خانوادگی الزامی است',
        v => (v && v.length <= 20) || 'نام و نام خانوادگی بایستی کمتر از 20 کاراکتر',
      ],
      email: '',
      emailRules: [
        v => !!v || 'E-mail is required',
        v => /.+@.+\..+/.test(v) || 'E-mail must be valid',
      ],
      select: null,
      items: [
        'Item 1',
        'Item 2',
        'Item 3',
        'Item 4',
      ],
      checkbox: false,
    }),

    methods: {
      validate () {
        if (this.$refs.form.validate()) {
          this.snackbar = true
        }
      },
      reset () {
        this.$refs.form.reset()
      },
      resetValidation () {
        this.$refs.form.resetValidation()
      },
    },
  }
</script>