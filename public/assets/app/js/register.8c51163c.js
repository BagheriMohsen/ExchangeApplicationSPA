(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["register"],{3232:function(t,e,n){"use strict";n.r(e);var r=function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("section",[n("v-container",[n("v-row",{attrs:{dark:"",justify:"center"}},[n("v-col",{class:"text-center",attrs:{cols:"12"}},[n("v-btn",{staticClass:"mx-1",on:{click:function(e){t.lang="fa",t.currentComponent="persian-register"}}},[t._v(" فارسی ")]),n("v-btn",{staticClass:"mx-1",on:{click:function(e){t.lang="en",t.currentComponent="english-register"}}},[t._v(" English ")]),n("v-btn",{staticClass:"mx-1",on:{click:function(e){t.lang="ar",t.currentComponent="arabic-register"}}},[t._v(" عربی ")])],1),n("v-col",{class:"text-center",attrs:{cols:"12"}},[n("persian-register",{tag:"component"})],1)],1),n("v-row",{attrs:{justify:"center"}},[n("v-col",{class:"text-center",attrs:{cols:"12"}},[n("v-btn",{attrs:{router:"",to:"/",color:""}},[t._v(" ورود به عنوان کاربر مهمان ")])],1)],1),n("v-row",{attrs:{justify:"center"}},[n("v-col",{class:"text-center",attrs:{cols:"12"}},[n("router-link",{attrs:{color:"white",to:"/login"}},[n("span",{staticClass:"white--text"},[t._v(" قبلا ثبت نام کرده اید؟ اینجا کلیک کنید")])])],1)],1)],1)],1)},s=[],o=(n("b0c0"),function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("section",[t._v(" persianREgister ")])}),a=[],c={},i=c,l=n("2877"),u=Object(l["a"])(i,o,a,!1,null,null,null),f=u.exports,p={components:{"persian-register":f},data:function(){return{valid:!0,name:"",error:"",submitDone:!1,nameRules:[function(t){return!!t||"نام و نام خانوادگی الزامی است"},function(t){return t&&t.length<=20||"نام و نام خانوادگی بایستی کمتر از 20 کاراکتر"}],phone:"",phoneRules:[function(t){return!!t||"شماره همراه الزامی است"},function(t){return/^[0-9]*$/.test(t)||"شماره همراه معتبر نیست"},function(t){return t&&11==t.length||"شماره همراه بایستی 11 رقمی باشد"}],lang:"fa",currentComponent:"persian-register"}},methods:{submit:function(){this.$refs.form.validate()&&(this.submitDone=!0)},register:function(){var t=this;this.$http.post("http://localhost:8000/register",{FullName:this.name,phoneNumber:this.phone,role_id:"2"}).then((function(e){e.data.token?(localStorage.setItem("token",e.data.token),t.$router.push("/")):t.error=e.data})).catch((function(t){return console.error(t)}))}}},h=p,v=n("6544"),m=n.n(v),g=n("8336"),b=n("62ad"),d=n("a523"),w=n("0fd9"),_=Object(l["a"])(h,r,s,!1,null,null,null);e["default"]=_.exports;m()(_,{VBtn:g["a"],VCol:b["a"],VContainer:d["a"],VRow:w["a"]})}}]);
//# sourceMappingURL=register.8c51163c.js.map