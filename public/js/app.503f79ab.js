(function(t){function e(e){for(var i,o,s=e[0],c=e[1],l=e[2],u=0,h=[];u<s.length;u++)o=s[u],Object.prototype.hasOwnProperty.call(r,o)&&r[o]&&h.push(r[o][0]),r[o]=0;for(i in c)Object.prototype.hasOwnProperty.call(c,i)&&(t[i]=c[i]);d&&d(e);while(h.length)h.shift()();return a.push.apply(a,l||[]),n()}function n(){for(var t,e=0;e<a.length;e++){for(var n=a[e],i=!0,o=1;o<n.length;o++){var s=n[o];0!==r[s]&&(i=!1)}i&&(a.splice(e--,1),t=c(c.s=n[0]))}return t}var i={},o={app:0},r={app:0},a=[];function s(t){return c.p+"js/"+({"demo~login~register":"demo~login~register",demo:"demo","login~register":"login~register",login:"login",register:"register"}[t]||t)+"."+{"demo~login~register":"f529b0f0",demo:"444930b9","login~register":"d80bbf01",login:"edf4a9e1",register:"e4ea8218"}[t]+".js"}function c(e){if(i[e])return i[e].exports;var n=i[e]={i:e,l:!1,exports:{}};return t[e].call(n.exports,n,n.exports,c),n.l=!0,n.exports}c.e=function(t){var e=[],n={"demo~login~register":1,demo:1,"login~register":1,login:1,register:1};o[t]?e.push(o[t]):0!==o[t]&&n[t]&&e.push(o[t]=new Promise((function(e,n){for(var i="css/"+({"demo~login~register":"demo~login~register",demo:"demo","login~register":"login~register",login:"login",register:"register"}[t]||t)+"."+{"demo~login~register":"0670aa22",demo:"5ed8764d","login~register":"c0df4ef6",login:"5c9cff5e",register:"49fb11bb"}[t]+".css",r=c.p+i,a=document.getElementsByTagName("link"),s=0;s<a.length;s++){var l=a[s],u=l.getAttribute("data-href")||l.getAttribute("href");if("stylesheet"===l.rel&&(u===i||u===r))return e()}var h=document.getElementsByTagName("style");for(s=0;s<h.length;s++){l=h[s],u=l.getAttribute("data-href");if(u===i||u===r)return e()}var d=document.createElement("link");d.rel="stylesheet",d.type="text/css",d.onload=e,d.onerror=function(e){var i=e&&e.target&&e.target.src||r,a=new Error("Loading CSS chunk "+t+" failed.\n("+i+")");a.code="CSS_CHUNK_LOAD_FAILED",a.request=i,delete o[t],d.parentNode.removeChild(d),n(a)},d.href=r;var g=document.getElementsByTagName("head")[0];g.appendChild(d)})).then((function(){o[t]=0})));var i=r[t];if(0!==i)if(i)e.push(i[2]);else{var a=new Promise((function(e,n){i=r[t]=[e,n]}));e.push(i[2]=a);var l,u=document.createElement("script");u.charset="utf-8",u.timeout=120,c.nc&&u.setAttribute("nonce",c.nc),u.src=s(t);var h=new Error;l=function(e){u.onerror=u.onload=null,clearTimeout(d);var n=r[t];if(0!==n){if(n){var i=e&&("load"===e.type?"missing":e.type),o=e&&e.target&&e.target.src;h.message="Loading chunk "+t+" failed.\n("+i+": "+o+")",h.name="ChunkLoadError",h.type=i,h.request=o,n[1](h)}r[t]=void 0}};var d=setTimeout((function(){l({type:"timeout",target:u})}),12e4);u.onerror=u.onload=l,document.head.appendChild(u)}return Promise.all(e)},c.m=t,c.c=i,c.d=function(t,e,n){c.o(t,e)||Object.defineProperty(t,e,{enumerable:!0,get:n})},c.r=function(t){"undefined"!==typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(t,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(t,"__esModule",{value:!0})},c.t=function(t,e){if(1&e&&(t=c(t)),8&e)return t;if(4&e&&"object"===typeof t&&t&&t.__esModule)return t;var n=Object.create(null);if(c.r(n),Object.defineProperty(n,"default",{enumerable:!0,value:t}),2&e&&"string"!=typeof t)for(var i in t)c.d(n,i,function(e){return t[e]}.bind(null,i));return n},c.n=function(t){var e=t&&t.__esModule?function(){return t["default"]}:function(){return t};return c.d(e,"a",e),e},c.o=function(t,e){return Object.prototype.hasOwnProperty.call(t,e)},c.p="/",c.oe=function(t){throw console.error(t),t};var l=window["webpackJsonp"]=window["webpackJsonp"]||[],u=l.push.bind(l);l.push=e,l=l.slice();for(var h=0;h<l.length;h++)e(l[h]);var d=u;a.push([0,"chunk-vendors"]),n()})({0:function(t,e,n){t.exports=n("56d7")},"31d1":function(t,e,n){},"56d7":function(t,e,n){"use strict";n.r(e);n("e260"),n("e6cf"),n("cca6"),n("a79d");var i=n("2b0e"),o=function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("div",{staticClass:"back",attrs:{id:"app"}},[n("v-app",{attrs:{id:"inspire"}},[n("router-view")],1)],1)},r=[],a={name:"App",data:function(){return{}}},s=a,c=n("2877"),l=n("6544"),u=n.n(l),h=n("7496"),d=Object(c["a"])(s,o,r,!1,null,null,null),g=d.exports;u()(d,{VApp:h["a"]});n("d3b7");var p=n("8c4f"),f=function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("div",{attrs:{id:"layout"}},[n("Navbar",{attrs:{user:t.user}}),n("v-content",{staticStyle:{"padding-left":"4px","padding-right":"4px"}},[n("button",{staticStyle:{display:"none"},on:{click:t.playSound}},[t._v("play")]),n("router-view",{attrs:{user:t.user},on:{checkToken:t.checkToken}})],1),n("v-dialog",{attrs:{"max-width":"290"},model:{value:t.tutorialDialog,callback:function(e){t.tutorialDialog=e},expression:"tutorialDialog"}},[n("v-card",{staticClass:"mx-auto pt-2"},[n("v-card-text",{staticClass:"pb-0"},[t._v(" لطفاابتدا به لینک زیر رفته و آموزش استفاده از اپلیکیشن را مطالعه فرمایید ")]),n("v-checkbox",{staticClass:"py-0 pr-4",attrs:{label:"دیگر این پیام نشان داده نشود"},model:{value:t.checkbox,callback:function(e){t.checkbox=e},expression:"checkbox"}}),n("v-card-actions",{staticStyle:{"justify-content":"center"},attrs:{center:""}},[n("v-btn",{attrs:{color:"success"},on:{click:t.handleRead}},[n("a",{staticClass:"white--text",staticStyle:{"text-decoration":"none"},attrs:{href:"http://www.sarafi.com"}},[t._v("خواندن مقاله")])]),n("v-btn",{attrs:{color:"info"},on:{click:t.handleLater}},[t._v("بعدا ")])],1)],1)],1),n("v-dialog",{attrs:{"max-width":"290"},model:{value:t.notifDialog,callback:function(e){t.notifDialog=e},expression:"notifDialog"}},[n("v-card",{staticClass:"mx-auto pt-2"},[n("v-card-text",{staticClass:"pb-0"},[t._v(" لطفا جهت پخش صدای نوتیف ها کلیک کنید ")]),n("v-card-actions",{staticStyle:{"justify-content":"center"},attrs:{center:""}},[n("v-btn",{attrs:{color:"info"},on:{click:t.handleNotifClick}},[t._v("فعالسازی ")])],1)],1)],1),n("Footer",{attrs:{user:t.user}})],1)},m=[],b=(n("4160"),n("caad"),n("159b"),function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("nav",[n("v-app-bar",{attrs:{fixed:"",app:"",transparent:"",height:"45px"}},[n("v-app-bar-nav-icon",{staticClass:"white--text",on:{click:function(e){e.stopPropagation(),t.drawer=!t.drawer}}}),n("v-spacer"),n("div",{staticClass:"white--text",staticStyle:{"font-size":"13px"}},[t._v(" "+t._s(t.$route.name)+" ")]),n("v-spacer"),n("a",{on:{click:function(e){return t.$router.go(-1)}}},[n("v-icon",{attrs:{color:"white"}},[t._v("keyboard_backspace ")])],1)],1),n("v-navigation-drawer",{attrs:{app:"",width:"65%",dark:"",right:"",temporary:""},scopedSlots:t._u([{key:"append",fn:function(){return[n("div",{staticClass:"pa-2"},[n("v-btn",{staticClass:"grey--text text--darken-2",attrs:{block:"",light:""},on:{click:t.logout}},[n("v-icon",[t._v("exit_to_app")])],1)],1)]},proxy:!0}]),model:{value:t.drawer,callback:function(e){t.drawer=e},expression:"drawer"}},[n("v-img",{staticClass:"my-4 mx-auto",attrs:{src:"/img/logo-for-splash-screen.png","max-height":"100","max-width":"100",contain:""}}),n("v-divider"),n("v-list",[n("v-list-item",[n("v-list-item-content",[n("v-list-item-title",{staticClass:"caption"},[t._v(" "+t._s(t.user.fullName))])],1)],1),t._l(t.items,(function(e){return n("v-list-item",{key:e.title,attrs:{link:"",router:"",to:e.route}},[n("v-list-item-icon",{staticClass:"ml-1"},[n("v-icon",[t._v(t._s(e.icon))])],1),n("v-list-item-content",[n("v-list-item-title",{staticClass:"caption"},[t._v(t._s(e.title))])],1)],1)}))],2)],1)],1)}),v=[],x={props:{user:Object},data:function(){return{test:!1,persianItems:[{title:"درباره ی ما",icon:"info",route:"/about"},{title:"تماس با ما",icon:"contacts",route:"/contact"},{title:"عضویت ",icon:"assignment_turned_in",route:"/register"},{title:"اشتراک ",icon:"payment",route:"/subscription"}],englishItems:[{title:"About Us",icon:"info",route:"/about"},{title:"Contact Us",icon:"contacts",route:"/contact"},{title:"Register",icon:"assignment_turned_in",route:"/register"},{title:"Subscription ",icon:"payment",route:"/subscription"}],arabicItems:[{title:"معلومات عنا",icon:"info",route:"/about"},{title:"اتصل بنا",icon:"contacts",route:"/contact"},{title:"تسجيل",icon:"assignment_turned_in",route:"/register"},{title:"اشتراك ",icon:"payment",route:"/subscription"}],items:"",persianExit:"خروج",englishExit:"Exit",arabicExit:"اخرج",exit:"",drawer:!1}},methods:{logout:function(){var t=this;this.$http.get("logout/"+this.user.id).then((function(e){console.log(e),localStorage.removeItem("token"),t.$router.push("/login")})).catch((function(t){return console.log(t)}))},checkLanguage:function(){"ar"==this.user.language?(this.items=this.arabicItems,this.exit=this.arabicItems):"en"==this.user.language?(this.items=this.englishItems,this.exit=this.englishExit):(this.items=this.persianItems,this.exit=this.persianExit)}},computed:{},watch:{user:{handler:function(){this.checkLanguage()}}},mounted:function(){this.checkLanguage()}},y=x,k=(n("a4d1"),n("40dc")),_=n("5bc1"),w=n("8336"),S=n("ce7e"),C=n("132d"),I=n("adda"),O=n("8860"),D=n("da13"),E=n("5d23"),P=n("34c3"),V=n("f774"),N=n("2fa4"),j=Object(c["a"])(y,b,v,!1,null,"ef429fb0",null),L=j.exports;u()(j,{VAppBar:k["a"],VAppBarNavIcon:_["a"],VBtn:w["a"],VDivider:S["a"],VIcon:C["a"],VImg:I["a"],VList:O["a"],VListItem:D["a"],VListItemContent:E["a"],VListItemIcon:P["a"],VListItemTitle:E["b"],VNavigationDrawer:V["a"],VSpacer:N["a"]});var T=function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("footer",[n("v-bottom-navigation",{attrs:{height:"50px",dark:"",grow:"",fixed:"",color:"white"},model:{value:t.bottomNav,callback:function(e){t.bottomNav=e},expression:"bottomNav"}},t._l(t.items,(function(e){return n("v-btn",{key:e.value,attrs:{value:e.value,router:"",to:e.route}},[n("span",[t._v(t._s(e.title))]),n("v-icon",[t._v(t._s(e.icon))])],1)})),1)],1)},A=[],$={props:{user:Object},data:function(){return{bottomNav:"tutorial",items:"",persianItems:[{title:"آموزش",icon:"account_balance",route:"/",value:"tutorial"},{title:"فارکس",icon:"bar_chart",route:"/farx",value:"farx"},{title:"باینری",icon:"multiline_chart",route:"/binary",value:"binary"},{title:"بایگانی",icon:"move_to_inbox",route:"/archive",value:"archive"}],englishItems:[{title:"Tutorial",icon:"account_balance",route:"/",value:"tutorial"},{title:"Farx",icon:"bar_chart",route:"/farx",value:"farx"},{title:"Binary",icon:"multiline_chart",route:"/binary",value:"binary"},{title:"Archive",icon:"move_to_inbox",route:"/archive",value:"archive"}],arabicItems:[{title:"تدريب",icon:"account_balance",route:"/",value:"tutorial"},{title:"فوركس",icon:"bar_chart",route:"/farx",value:"farx"},{title:"باینری",icon:"multiline_chart",route:"/binary",value:"binary"},{title:"الأرشيف",icon:"move_to_inbox",route:"/archive",value:"archive"}]}},methods:{checkLanguage:function(){"ar"==this.user.language?this.items=this.arabicItems:"en"==this.user.language?this.items=this.englishItems:this.items=this.persianItems}},watch:{user:{handler:function(){this.checkLanguage()}}},mounted:function(){this.checkLanguage()}},B=$,U=(n("690d"),n("b81c")),F=Object(c["a"])(B,T,A,!1,null,"6d44bbe5",null),R=F.exports;u()(F,{VBottomNavigation:U["a"],VBtn:w["a"],VIcon:C["a"]});var M=n("782e"),q=n.n(M),G={name:"App",components:{Navbar:L,Footer:R},data:function(){return{token:localStorage.getItem("token"),user:"",audio:new Audio("https://freesound.org/data/previews/66/66136_606715-lq.mp3"),notifDialog:!1,tutorialDialog:!1,checkbox:!1}},methods:{checkToken:function(){var t=this;""==this.token?this.$router.push("/login"):this.$http.get("token",{params:{token:this.token}}).then((function(e){t.user=e.data,t.initOneSignal(),t.checkSubscribe()})).catch((function(e){console.log(e),t.$router.push("/login")}))},checkSubscribe:function(){if(this.user.freeTime)this.farxSubscribe(),this.binarySubscribe(),this.notifDialog=!0;else{var t=[];this.user.plans.forEach((function(e){t.push(e.plan.type)})),t.includes("forex")&&t.includes("binary")?(this.farxSubscribe(),this.binarySubscribe(),this.notifDialog=!0):t.includes("both")?(this.farxSubscribe(),this.binarySubscribe(),this.notifDialog=!0):t.includes("forex")?(this.farxSubscribe(),this.notifDialog=!0):t.includes("binary")&&(this.binarySubscribe(),this.notifDialog=!0)}},farxSubscribe:function(){var t=this,e=new q.a("0b6db206a7be0ce7e956",{cluster:"ap2"});e.subscribe("ForexNotif"),e.bind("App\\Events\\ForexNotifEvent",(function(){return t.audio.play()}))},binarySubscribe:function(){var t=this,e=new q.a("0b6db206a7be0ce7e956",{cluster:"ap2"});e.subscribe("BinaryNotif"),e.bind("App\\Events\\BinaryNotif",(function(){return t.audio.play()}))},handleLater:function(){this.tutorialDialog=!1,1==this.checkbox&&(this.$http.get("user-guide-check/"+this.user.id).then((function(t){return console.log(t)})).catch((function(t){return console.log(t)})),this.$emit("checkToken"))},handleRead:function(){this.tutorialDialog=!1,1==this.checkbox&&(this.$http.get("user-guide-check/"+this.user.id).then((function(t){return console.log(t)})).then((function(){return window.location.href="http://www.sarafi.com"})).catch((function(t){return console.log(t)})),this.$emit("checkToken"),window.location.href="http://www.sarafi.com")},checkUserGuide:function(){"1"==this.user.guide_check?this.tutorialDialog=!1:"0"==this.user.guide_check&&(this.tutorialDialog=!0)},handleNotifClick:function(){this.notifDialog=!1,this.audio.play()},playSound:function(){this.audio.play()},initOneSignal:function(){var t=this,e=window.OneSignal||[];e.push((function(){e.on("subscriptionChange",(function(n){console.log("The user's subscription state is now:",n),e.push((function(){e.getUserId((function(e){console.log("OneSignal User ID:",e),t.$http.get("take-token/"+t.user.id,{params:{api_key:e}}).then((function(t){return console.log(t)})).catch((function(t){return console.log(t)}))}))}))}))})),e.push(["init",{appId:"ff1ec971-1cab-4a8e-9225-d3fb2d3ef701",autoRegister:!1,promptOptions:{},welcomeNotification:{},notifyButton:{enable:!0,showCredit:!1,prenotify:!0,position:"bottom-left",text:{},colors:{}}}])}},mounted:function(){this.checkToken(),this.checkUserGuide()},updated:function(){},watch:{user:{handler:function(){this.checkUserGuide()}}}},J=G,z=n("b0af"),H=n("99d9"),K=n("ac7c"),Q=n("a75b"),W=n("169a"),X=Object(c["a"])(J,f,m,!1,null,null,null),Y=X.exports;u()(X,{VBtn:w["a"],VCard:z["a"],VCardActions:H["a"],VCardText:H["c"],VCheckbox:K["a"],VContent:Q["a"],VDialog:W["a"]}),i["a"].use(p["a"]);var Z=[{path:"/",name:"home",component:Y,children:[{path:"/",name:"آموزش",component:function(){return Promise.all([n.e("demo~login~register"),n.e("demo")]).then(n.bind(null,"cfa7"))}},{path:"/tutorial/farx",name:"آموزش فارکس",component:function(){return Promise.all([n.e("demo~login~register"),n.e("demo")]).then(n.bind(null,"b242"))}},{path:"/tutorial/binary",name:"آموزش باینری",component:function(){return Promise.all([n.e("demo~login~register"),n.e("demo")]).then(n.bind(null,"4ecd"))}},{path:"/tutorial/single/:id",name:"مقاله آموزشی",component:function(){return Promise.all([n.e("demo~login~register"),n.e("demo")]).then(n.bind(null,"d991"))}},{path:"/farx",name:"فارکس",component:function(){return Promise.all([n.e("demo~login~register"),n.e("demo")]).then(n.bind(null,"5df2"))}},{path:"/binary",name:"باینری آپشن",component:function(){return Promise.all([n.e("demo~login~register"),n.e("demo")]).then(n.bind(null,"87b5"))}},{path:"/archive",name:"آرشیو",component:function(){return Promise.all([n.e("demo~login~register"),n.e("demo")]).then(n.bind(null,"12b6"))}},{path:"/contact",name:"تماس با ما",component:function(){return Promise.all([n.e("demo~login~register"),n.e("demo")]).then(n.bind(null,"e9bb"))}},{path:"/about",name:"درباره ی ما",component:function(){return Promise.all([n.e("demo~login~register"),n.e("demo")]).then(n.bind(null,"2664"))}},{path:"/subscription",name:"اشتراک",component:function(){return Promise.all([n.e("demo~login~register"),n.e("demo")]).then(n.bind(null,"d7e2"))}}]},{path:"/register",name:"عضویت",component:function(){return Promise.all([n.e("demo~login~register"),n.e("login~register"),n.e("register")]).then(n.bind(null,"3232"))}},{path:"/login",name:"ورود",component:function(){return Promise.all([n.e("demo~login~register"),n.e("login~register"),n.e("login")]).then(n.bind(null,"d60c"))}},{path:"/test",name:"ورود",component:function(){return Promise.all([n.e("demo~login~register"),n.e("login~register"),n.e("login")]).then(n.bind(null,"2762"))}}],tt=new p["a"]({base:"/",linkExactActiveClass:"active",routes:Z}),et=tt,nt=n("bc3a"),it=n.n(nt),ot=n("f309");i["a"].use(ot["a"]);var rt=new ot["a"]({rtl:!0}),at=(n("89e3"),n("683f"));n.d(e,"OneSignal",(function(){return st})),i["a"].use(at["a"]),i["a"].config.productionTip=!1,it.a.defaults.baseURL="https://app.utsignal.com/",i["a"].prototype.$http=it.a;var st=window.OneSignal||[];new i["a"]({router:et,vuetify:rt,render:function(t){return t(g)}}).$mount("#app")},"690d":function(t,e,n){"use strict";var i=n("31d1"),o=n.n(i);o.a},"89e3":function(t,e,n){},a40e:function(t,e,n){},a4d1:function(t,e,n){"use strict";var i=n("a40e"),o=n.n(i);o.a}});
//# sourceMappingURL=app.503f79ab.js.map