(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["login"],{d60c:function(e,t,a){"use strict";a.r(t);var r=function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("section",[a("v-container",[a("v-row",{attrs:{justify:"center"}},[a("v-col",{class:"text-center",attrs:{sm:"6"}},[a("v-form",{ref:"form",attrs:{"lazy-validation":""},model:{value:e.valid,callback:function(t){e.valid=t},expression:"valid"}},[a("v-text-field",{attrs:{counter:11,rules:e.nameRules,label:"شماره همراه",required:""},model:{value:e.phone,callback:function(t){e.phone=t},expression:"phone"}}),a("v-btn",{staticClass:"mr-4",attrs:{disabled:!e.valid,color:"success"},on:{click:e.validate}},[e._v(" ارسال کد ")]),a("v-text-field",{attrs:{counter:5,rules:e.nameRules,label:"کد ارسالی",required:""},model:{value:e.code,callback:function(t){e.code=t},expression:"code"}})],1)],1)],1),a("v-row",{attrs:{justify:"center"}},[a("v-col",{class:"text-center",attrs:{sm:"6"}},[a("v-btn",{staticClass:"mr-4",attrs:{color:"secondary"}},[e._v(" ورود به عنوان کاربر مهمان ")])],1)],1),a("v-row",{attrs:{justify:"center"}},[a("v-col",{class:"text-center",attrs:{sm:"6"}},[a("router-link",{attrs:{to:"/register"}},[e._v("هنوز ثبت نام نکرده اید؟ اینجا کلیک کنید")])],1)],1)],1)],1)},n=[],s={data:function(){return{valid:!0,name:"",nameRules:[function(e){return!!e||"نام و نام خانوادگی الزامی است"},function(e){return e&&e.length<=20||"نام و نام خانوادگی بایستی کمتر از 20 کاراکتر"}],email:"",emailRules:[function(e){return!!e||"E-mail is required"},function(e){return/.+@.+\..+/.test(e)||"E-mail must be valid"}],select:null,items:["Item 1","Item 2","Item 3","Item 4"],checkbox:!1}},methods:{validate:function(){this.$refs.form.validate()&&(this.snackbar=!0)},reset:function(){this.$refs.form.reset()},resetValidation:function(){this.$refs.form.resetValidation()}}},l=s,i=a("2877"),o=a("6544"),c=a.n(o),u=a("8336"),d=a("62ad"),f=a("a523"),m=a("4bd4"),v=a("0fd9"),b=a("8654"),h=Object(i["a"])(l,r,n,!1,null,null,null);t["default"]=h.exports;c()(h,{VBtn:u["a"],VCol:d["a"],VContainer:f["a"],VForm:m["a"],VRow:v["a"],VTextField:b["a"]})}}]);
//# sourceMappingURL=login.3139194e.js.map