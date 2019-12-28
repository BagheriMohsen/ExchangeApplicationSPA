(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["register"],{"1b64":function(e,t,r){"use strict";var n=r("784e"),o=r.n(n);o.a},3232:function(e,t,r){"use strict";r.r(t);var n=function(){var e=this,t=e.$createElement,r=e._self._c||t;return r("section",[r("v-container",[r("v-row",{attrs:{dark:"",justify:"center"}},[r("v-col",{class:"text-center",attrs:{cols:"12"}},[r("v-btn",{staticStyle:{"min-width":"57px"},attrs:{outlined:"",color:"white"},on:{click:function(t){e.currentComponent="persian-register"}}},[e._v(" فارسی ")]),r("v-btn",{staticStyle:{"min-width":"57px"},attrs:{outlined:"",color:"white"},on:{click:function(t){e.currentComponent="english-register"}}},[e._v(" English ")]),r("v-btn",{staticStyle:{"min-width":"57px"},attrs:{outlined:"",color:"white"},on:{click:function(t){e.currentComponent="arabic-register"}}},[e._v(" عربی ")])],1)],1),r(e.currentComponent,{tag:"component"})],1)],1)},o=[],s=function(){var e=this,t=e.$createElement,r=e._self._c||t;return r("v-row",{attrs:{dark:"",justify:"center"}},[r("v-col",{class:"text-center",attrs:{cols:"12"}},[r("v-form",{ref:"form",attrs:{"lazy-validation":""},model:{value:e.valid,callback:function(t){e.valid=t},expression:"valid"}},[r("v-text-field",{attrs:{dark:"",rules:e.nameRules,label:"نام و نام خانوادگی",required:""},model:{value:e.user.name,callback:function(t){e.$set(e.user,"name",t)},expression:"user.name"}}),r("v-text-field",{attrs:{dark:"",rules:e.phoneRules,counter:11,label:"شماره همراه",required:""},model:{value:e.user.phone,callback:function(t){e.$set(e.user,"phone",t)},expression:"user.phone"}}),r("v-btn",{staticClass:"mt-3",attrs:{dark:"",disabled:!e.valid,color:"info"},on:{click:e.receiveCode}},[r("span",{directives:[{name:"show",rawName:"v-show",value:!e.loading,expression:"!loading"}]},[e._v("عضویت")]),e.loading?r("clip-loader",{attrs:{color:"white",size:"26px"}}):e._e()],1),e.error.info?r("div",{staticClass:"error mt-3 py-1 white--text",staticStyle:{"font-size":".8rem"}},[e._v(e._s(e.error.info))]):e._e()],1)],1),r("v-col",{class:"text-center",attrs:{cols:"12"}},[e.code.sended?r("v-form",[r("v-text-field",{attrs:{dark:"",label:"کد ارسالی را وارد نمایید",required:""},model:{value:e.code.userInput,callback:function(t){e.$set(e.code,"userInput",t)},expression:"code.userInput"}}),r("v-btn",{staticClass:"mt-3",attrs:{dark:"",counter:4,color:"info"},on:{click:function(t){return t.preventDefault(),e.verifyCode(t)}}},[e._v(" ارسال کد ")]),e.error.code?r("div",{staticClass:"error mt-3 py-1 white--text",staticStyle:{"font-size":".8rem"}},[e._v(e._s(e.error.code))]):e._e()],1):e._e()],1),r("v-col",{class:"text-center",attrs:{cols:"12"}},[r("router-link",{attrs:{color:"white",to:"/login"}},[r("span",{staticClass:"white--text"},[e._v(" قبلا ثبت نام کرده اید؟ اینجا کلیک کنید")])])],1)],1)},a=[],i=(r("b0c0"),r("da7a")),l={components:{ClipLoader:i["a"]},data:function(){return{loading:!1,valid:!0,user:{id:"",name:"",phone:""},code:{userInput:"",sms:"",sended:!1},error:{info:"",code:""},lang:"fa",nameRules:[function(e){return!!e||"نام و نام خانوادگی الزامی است"},function(e){return e&&e.length<=20||"نام و نام خانوادگی بایستی کمتر از 20 کاراکتر"}],phoneRules:[function(e){return!!e||"شماره همراه الزامی است"},function(e){return/^[0-9]*$/.test(e)||"شماره همراه معتبر نیست"},function(e){return e&&11==e.length||"شماره همراه بایستی 11 رقمی باشد"}]}},methods:{receiveCode:function(){var e=this;this.$refs.form.validate()&&(this.loading=!0,this.$http.post("https://exchange.tipsy.ir/register",{FullName:this.user.name,phoneNumber:this.user.phone,role_id:"2"}).then((function(t){t.data.DigitValidate?(e.code.sended=!0,e.user.id=t.data.user_id,e.code.sms=t.data.DigitValidate):e.error.info=t.data,e.loading=!1})).catch((function(t){console.error(t),e.loading=!1})))},verifyCode:function(){var e=this;this.code.userInput==this.code.sms?this.$http.get("https://exchange.tipsy.ir/sendVerfySms",{params:{user_id:this.user.id}}).then((function(t){console.log(t),localStorage.setItem("token",t.data.token),e.$router.push("/")})).catch((function(e){return console.log(e)})):this.error.code="رمز وارد شده اشتباه می باشد"}}},c=l,u=(r("5d13"),r("2877")),d=r("6544"),h=r.n(d),f=r("8336"),v=r("62ad"),p=r("4bd4"),m=r("0fd9"),g=r("8654"),x=Object(u["a"])(c,s,a,!1,null,"12447a64",null),k=x.exports;h()(x,{VBtn:f["a"],VCol:v["a"],VForm:p["a"],VRow:m["a"],VTextField:g["a"]});var b=function(){var e=this,t=e.$createElement,r=e._self._c||t;return r("v-row",{attrs:{dark:"",justify:"center"}},[r("v-col",{class:"text-center",attrs:{cols:"12"}},[r("v-form",{ref:"form",attrs:{"lazy-validation":""},model:{value:e.valid,callback:function(t){e.valid=t},expression:"valid"}},[r("v-text-field",{attrs:{dark:"",rules:e.nameRules,label:"Firstname and lastname",required:""},model:{value:e.user.name,callback:function(t){e.$set(e.user,"name",t)},expression:"user.name"}}),r("v-text-field",{attrs:{dark:"",rules:e.phoneRules,counter:11,label:"Phone number",required:""},model:{value:e.user.phone,callback:function(t){e.$set(e.user,"phone",t)},expression:"user.phone"}}),r("v-btn",{staticClass:"mt-3",attrs:{dark:"",disabled:!e.valid,color:"info"},on:{click:e.receiveCode}},[r("span",{directives:[{name:"show",rawName:"v-show",value:!e.loading,expression:"!loading"}]},[e._v("Register")]),e.loading?r("clip-loader",{attrs:{color:"white",size:"26px"}}):e._e()],1),e.error.info?r("div",{staticClass:"error mt-3 py-1 white--text",staticStyle:{"font-size":".8rem"}},[e._v(e._s(e.error.info))]):e._e()],1)],1),r("v-col",{class:"text-center",attrs:{cols:"12"}},[e.code.sended?r("v-form",[r("v-text-field",{attrs:{dark:"",label:"Please insert the code",required:""},model:{value:e.code.userInput,callback:function(t){e.$set(e.code,"userInput",t)},expression:"code.userInput"}}),r("v-btn",{staticClass:"mt-3",attrs:{dark:"",counter:4,color:"info"},on:{click:function(t){return t.preventDefault(),e.verifyCode(t)}}},[e._v(" Send code ")]),e.error.code?r("div",{staticClass:"error mt-3 py-1 white--text",staticStyle:{"font-size":".8rem"}},[e._v(e._s(e.error.code))]):e._e()],1):e._e()],1),r("v-col",{class:"text-center",attrs:{cols:"12"}},[r("router-link",{attrs:{color:"white",to:"/login"}},[r("span",{staticClass:"white--text"},[e._v(" If you registerd before please click here")])])],1)],1)},_=[],w={components:{ClipLoader:i["a"]},data:function(){return{loading:!1,valid:!0,user:{id:"",name:"",phone:""},code:{userInput:"",sms:"",sended:!1},error:{info:"",code:""},lang:"fa",nameRules:[function(e){return!!e||"First name and last name are required"},function(e){return e&&e.length<=100||"First name and last name should be less than 100 character"}],phoneRules:[function(e){return!!e||"Phone number is required"},function(e){return/^[0-9]*$/.test(e)||"Phone number is not valid"},function(e){return e&&11==e.length||"Phone number should have 11 digits"}]}},methods:{receiveCode:function(){var e=this;this.$refs.form.validate()&&(this.loading=!0,this.$http.post("https://exchange.tipsy.ir/register",{FullName:this.user.name,phoneNumber:this.user.phone,role_id:"2"}).then((function(t){t.data.DigitValidate?(e.code.sended=!0,e.user.id=t.data.user_id,e.code.sms=t.data.DigitValidate):e.error.info=t.data,e.loading=!1})).catch((function(t){console.error(t),e.loading=!1})))},verifyCode:function(){var e=this;this.code.userInput==this.code.sms?this.$http.get("https://exchange.tipsy.ir/sendVerfySms",{params:{user_id:this.user.id}}).then((function(t){console.log(t),localStorage.setItem("token",t.data.token),e.$router.push("/")})).catch((function(e){return console.log(e)})):this.error.code="Inserted code is not valid"}}},C=w,y=(r("da17"),Object(u["a"])(C,b,_,!1,null,"14b322b0",null)),$=y.exports;h()(y,{VBtn:f["a"],VCol:v["a"],VForm:p["a"],VRow:m["a"],VTextField:g["a"]});var V=function(){var e=this,t=e.$createElement,r=e._self._c||t;return r("v-row",{attrs:{dark:"",justify:"center"}},[r("v-col",{class:"text-center",attrs:{cols:"12"}},[r("v-form",{ref:"form",attrs:{"lazy-validation":""},model:{value:e.valid,callback:function(t){e.valid=t},expression:"valid"}},[r("v-text-field",{attrs:{dark:"",rules:e.nameRules,label:"نام و نام خانوادگی",required:""},model:{value:e.user.name,callback:function(t){e.$set(e.user,"name",t)},expression:"user.name"}}),r("v-text-field",{attrs:{dark:"",rules:e.phoneRules,counter:11,label:"شماره همراه",required:""},model:{value:e.user.phone,callback:function(t){e.$set(e.user,"phone",t)},expression:"user.phone"}}),r("v-btn",{staticClass:"mt-3",attrs:{dark:"",disabled:!e.valid,color:"info"},on:{click:e.receiveCode}},[r("span",{directives:[{name:"show",rawName:"v-show",value:!e.loading,expression:"!loading"}]},[e._v("عضویت")]),e.loading?r("clip-loader",{attrs:{color:"white",size:"26px"}}):e._e()],1),e.error.info?r("div",{staticClass:"error mt-3 py-1 white--text",staticStyle:{"font-size":".8rem"}},[e._v(e._s(e.error.info))]):e._e()],1)],1),r("v-col",{class:"text-center",attrs:{cols:"12"}},[e.code.sended?r("v-form",[r("v-text-field",{attrs:{dark:"",label:"کد ارسالی را وارد نمایید",required:""},model:{value:e.code.userInput,callback:function(t){e.$set(e.code,"userInput",t)},expression:"code.userInput"}}),r("v-btn",{staticClass:"mt-3",attrs:{dark:"",counter:4,color:"info"},on:{click:function(t){return t.preventDefault(),e.verifyCode(t)}}},[e._v(" ارسال کد ")]),e.error.code?r("div",{staticClass:"error mt-3 py-1 white--text",staticStyle:{"font-size":".8rem"}},[e._v(e._s(e.error.code))]):e._e()],1):e._e()],1),r("v-col",{class:"text-center",attrs:{cols:"12"}},[r("router-link",{attrs:{color:"white",to:"/login"}},[r("span",{staticClass:"white--text"},[e._v(" قبلا ثبت نام کرده اید؟ اینجا کلیک کنید")])])],1)],1)},I=[],R={components:{ClipLoader:i["a"]},data:function(){return{loading:!1,valid:!0,user:{id:"",name:"",phone:""},code:{userInput:"",sms:"",sended:!1},error:{info:"",code:""},lang:"fa",nameRules:[function(e){return!!e||"نام و نام خانوادگی الزامی است"},function(e){return e&&e.length<=20||"نام و نام خانوادگی بایستی کمتر از 20 کاراکتر"}],phoneRules:[function(e){return!!e||"شماره همراه الزامی است"},function(e){return/^[0-9]*$/.test(e)||"شماره همراه معتبر نیست"},function(e){return e&&11==e.length||"شماره همراه بایستی 11 رقمی باشد"}]}},methods:{receiveCode:function(){var e=this;this.$refs.form.validate()&&(this.loading=!0,this.$http.post("https://exchange.tipsy.ir/register",{FullName:this.user.name,phoneNumber:this.user.phone,role_id:"2"}).then((function(t){t.data.DigitValidate?(e.code.sended=!0,e.user.id=t.data.user_id,e.code.sms=t.data.DigitValidate):e.error.info=t.data,e.loading=!1})).catch((function(t){console.error(t),e.loading=!1})))},verifyCode:function(){var e=this;this.code.userInput==this.code.sms?this.$http.get("https://exchange.tipsy.ir/sendVerfySms",{params:{user_id:this.user.id}}).then((function(t){console.log(t),localStorage.setItem("token",t.data.token),e.$router.push("/")})).catch((function(e){return console.log(e)})):this.error.code="رمز وارد شده اشتباه می باشد"}}},S=R,z=(r("df80"),Object(u["a"])(S,V,I,!1,null,"7af47b20",null)),F=z.exports;h()(z,{VBtn:f["a"],VCol:v["a"],VForm:p["a"],VRow:m["a"],VTextField:g["a"]});var q={components:{"persian-register":k,"arabic-register":F,"english-register":$},data:function(){return{currentComponent:"persian-register"}},methods:{checkToken:function(){localStorage.getItem("token")&&this.$router.push("/")}},created:function(){this.checkToken()},mounted:function(){this.checkToken()}},D=q,N=(r("1b64"),r("a523")),j=Object(u["a"])(D,n,o,!1,null,"4e202dda",null);t["default"]=j.exports;h()(j,{VBtn:f["a"],VCol:v["a"],VContainer:N["a"],VRow:m["a"]})},"5d13":function(e,t,r){"use strict";var n=r("9618"),o=r.n(n);o.a},"6e91":function(e,t,r){},"784e":function(e,t,r){},9618:function(e,t,r){},a1f8:function(e,t,r){},da17:function(e,t,r){"use strict";var n=r("6e91"),o=r.n(n);o.a},df80:function(e,t,r){"use strict";var n=r("a1f8"),o=r.n(n);o.a}}]);
//# sourceMappingURL=register.198e78c2.js.map