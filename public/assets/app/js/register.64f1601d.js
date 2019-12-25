(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["register"],{3232:function(t,e,n){"use strict";n.r(e);var r=function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("section",[n("v-container",[t._v(" {[submitDone]} "),n("v-row",{attrs:{dark:"",justify:"center"}},[n("v-col",{class:"text-center",attrs:{cols:"12"}},[n("v-form",{ref:"form",attrs:{"lazy-validation":""},model:{value:t.valid,callback:function(e){t.valid=e},expression:"valid"}},[n("v-text-field",{attrs:{dark:"",rules:t.nameRules,label:"نام و نام خانوادگی",required:""},model:{value:t.name,callback:function(e){t.name=e},expression:"name"}}),n("v-text-field",{attrs:{dark:"",rules:t.phoneRules,counter:11,label:"شماره همراه",required:""},model:{value:t.phone,callback:function(e){t.phone=e},expression:"phone"}}),n("v-btn",{staticClass:"mt-3",attrs:{dark:"",disabled:!t.valid,color:"info"},on:{click:t.sendCode}},[t._v(" عضویت ")]),t.error?n("div",{staticClass:"error mt-3 py-1 white--text",staticStyle:{"font-size":".8rem"}},[t._v(t._s(t.error))]):t._e()],1)],1),n("v-col",{class:"text-center",attrs:{cols:"12"}},[t.submitDone?n("v-form",[n("v-text-field",{attrs:{dark:"",label:"کد ارسالی را وارد نمایید",required:""},model:{value:t.code,callback:function(e){t.code=e},expression:"code"}}),n("v-btn",{staticClass:"mt-3",attrs:{dark:"",color:"success"},on:{click:function(e){return e.preventDefault(),t.verifyCode(e)}}},[t._v(" ورود ")])],1):t._e()],1)],1),n("v-row",{attrs:{justify:"center"}},[n("v-col",{class:"text-center",attrs:{cols:"12"}},[n("v-btn",{attrs:{router:"",to:"/",color:""}},[t._v(" ورود به عنوان کاربر مهمان ")])],1)],1),n("v-row",{attrs:{justify:"center"}},[n("v-col",{class:"text-center",attrs:{cols:"12"}},[n("router-link",{attrs:{color:"white",to:"/login"}},[n("span",{staticClass:"white--text"},[t._v(" قبلا ثبت نام کرده اید؟ اینجا کلیک کنید")])])],1)],1)],1)],1)},o=[],s=(n("b0c0"),{components:{},data:function(){return{valid:!0,user_id:"",fourDigitRandom:"",name:"",error:"",code:"",submitDone:!1,nameRules:[function(t){return!!t||"نام و نام خانوادگی الزامی است"},function(t){return t&&t.length<=20||"نام و نام خانوادگی بایستی کمتر از 20 کاراکتر"}],phone:"",phoneRules:[function(t){return!!t||"شماره همراه الزامی است"},function(t){return/^[0-9]*$/.test(t)||"شماره همراه معتبر نیست"},function(t){return t&&11==t.length||"شماره همراه بایستی 11 رقمی باشد"}],lang:"fa",currentComponent:"persian-register"}},methods:{submit:function(){this.$refs.form.validate()&&(this.submitDone=!0)},sendCode:function(){var t=this;this.$http.post("http://localhost:8000/register",{FullName:this.name,phoneNumber:this.phone,role_id:"2"}).then((function(e){console.log(e.data),t.submitDone=!0,t.user_id=e.data.user_id,t.fourDigitRandom=e.data.DigitValidate})).catch((function(t){return console.error(t)}))},verifyCode:function(){this.code==this.fourDigitRandom?this.$http.get("http://localhost:8000/sendVerfySms",{params:{user_id:this.user_id}}).then((function(t){return console.log(t)})).catch((function(t){return console.log(t)})):alert("کد وارد شده اشتباه است")}}}),a=s,i=n("2877"),l=n("6544"),c=n.n(l),u=n("8336"),d=n("62ad"),f=n("a523"),v=n("4bd4"),m=n("0fd9"),h=n("8654"),p=Object(i["a"])(a,r,o,!1,null,null,null);e["default"]=p.exports;c()(p,{VBtn:u["a"],VCol:d["a"],VContainer:f["a"],VForm:v["a"],VRow:m["a"],VTextField:h["a"]})}}]);
//# sourceMappingURL=register.64f1601d.js.map