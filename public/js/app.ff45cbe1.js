(function(t){function e(e){for(var i,o,s=e[0],c=e[1],l=e[2],u=0,d=[];u<s.length;u++)o=s[u],Object.prototype.hasOwnProperty.call(r,o)&&r[o]&&d.push(r[o][0]),r[o]=0;for(i in c)Object.prototype.hasOwnProperty.call(c,i)&&(t[i]=c[i]);h&&h(e);while(d.length)d.shift()();return a.push.apply(a,l||[]),n()}function n(){for(var t,e=0;e<a.length;e++){for(var n=a[e],i=!0,o=1;o<n.length;o++){var s=n[o];0!==r[s]&&(i=!1)}i&&(a.splice(e--,1),t=c(c.s=n[0]))}return t}var i={},o={app:0},r={app:0},a=[];function s(t){return c.p+"js/"+({"demo~login~register":"demo~login~register",demo:"demo","login~register":"login~register",login:"login",register:"register"}[t]||t)+"."+{"demo~login~register":"7a01d658",demo:"20889b9b","login~register":"bf6d6313",login:"4ccc2749",register:"cd805dba"}[t]+".js"}function c(e){if(i[e])return i[e].exports;var n=i[e]={i:e,l:!1,exports:{}};return t[e].call(n.exports,n,n.exports,c),n.l=!0,n.exports}c.e=function(t){var e=[],n={"demo~login~register":1,demo:1,"login~register":1,login:1,register:1};o[t]?e.push(o[t]):0!==o[t]&&n[t]&&e.push(o[t]=new Promise((function(e,n){for(var i="css/"+({"demo~login~register":"demo~login~register",demo:"demo","login~register":"login~register",login:"login",register:"register"}[t]||t)+"."+{"demo~login~register":"0670aa22",demo:"ab40b420","login~register":"c0df4ef6",login:"e38fcd8e",register:"caed6656"}[t]+".css",r=c.p+i,a=document.getElementsByTagName("link"),s=0;s<a.length;s++){var l=a[s],u=l.getAttribute("data-href")||l.getAttribute("href");if("stylesheet"===l.rel&&(u===i||u===r))return e()}var d=document.getElementsByTagName("style");for(s=0;s<d.length;s++){l=d[s],u=l.getAttribute("data-href");if(u===i||u===r)return e()}var h=document.createElement("link");h.rel="stylesheet",h.type="text/css",h.onload=e,h.onerror=function(e){var i=e&&e.target&&e.target.src||r,a=new Error("Loading CSS chunk "+t+" failed.\n("+i+")");a.code="CSS_CHUNK_LOAD_FAILED",a.request=i,delete o[t],h.parentNode.removeChild(h),n(a)},h.href=r;var m=document.getElementsByTagName("head")[0];m.appendChild(h)})).then((function(){o[t]=0})));var i=r[t];if(0!==i)if(i)e.push(i[2]);else{var a=new Promise((function(e,n){i=r[t]=[e,n]}));e.push(i[2]=a);var l,u=document.createElement("script");u.charset="utf-8",u.timeout=120,c.nc&&u.setAttribute("nonce",c.nc),u.src=s(t);var d=new Error;l=function(e){u.onerror=u.onload=null,clearTimeout(h);var n=r[t];if(0!==n){if(n){var i=e&&("load"===e.type?"missing":e.type),o=e&&e.target&&e.target.src;d.message="Loading chunk "+t+" failed.\n("+i+": "+o+")",d.name="ChunkLoadError",d.type=i,d.request=o,n[1](d)}r[t]=void 0}};var h=setTimeout((function(){l({type:"timeout",target:u})}),12e4);u.onerror=u.onload=l,document.head.appendChild(u)}return Promise.all(e)},c.m=t,c.c=i,c.d=function(t,e,n){c.o(t,e)||Object.defineProperty(t,e,{enumerable:!0,get:n})},c.r=function(t){"undefined"!==typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(t,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(t,"__esModule",{value:!0})},c.t=function(t,e){if(1&e&&(t=c(t)),8&e)return t;if(4&e&&"object"===typeof t&&t&&t.__esModule)return t;var n=Object.create(null);if(c.r(n),Object.defineProperty(n,"default",{enumerable:!0,value:t}),2&e&&"string"!=typeof t)for(var i in t)c.d(n,i,function(e){return t[e]}.bind(null,i));return n},c.n=function(t){var e=t&&t.__esModule?function(){return t["default"]}:function(){return t};return c.d(e,"a",e),e},c.o=function(t,e){return Object.prototype.hasOwnProperty.call(t,e)},c.p="/",c.oe=function(t){throw console.error(t),t};var l=window["webpackJsonp"]=window["webpackJsonp"]||[],u=l.push.bind(l);l.push=e,l=l.slice();for(var d=0;d<l.length;d++)e(l[d]);var h=u;a.push([0,"chunk-vendors"]),n()})({0:function(t,e,n){t.exports=n("56d7")},1769:function(t,e,n){},"31d1":function(t,e,n){},"56d7":function(t,e,n){"use strict";n.r(e);n("e260"),n("e6cf"),n("cca6"),n("a79d");var i=n("2b0e"),o=function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("div",{staticClass:"back",attrs:{id:"app"}},[n("v-app",{attrs:{id:"inspire"}},[n("router-view"),n("v-dialog",{attrs:{"max-width":"300"},model:{value:t.addToHomeScreen,callback:function(e){t.addToHomeScreen=e},expression:"addToHomeScreen"}},[n("v-card",{staticClass:"mx-auto pt-2"},[n("v-card-text",{staticClass:"pb-0"},[t._v(" لطفا با زدن دکمه ی زیر این وب اپلیکیشن را به گوشی خود اضافه نمایید ")]),n("v-card-actions",{staticStyle:{"justify-content":"center"},attrs:{center:""}},[n("v-btn",{attrs:{color:"primary"},on:{click:t.handleAdd}},[t._v(" افزودن اپلیکیشن ")])],1)],1)],1)],1)],1)},r=[],a={name:"App",data:function(){return{addToHomeScreen:!1,deferredPrompt:null}},methods:{handleAdd:function(){var t=this;this.addToHomeScreen=!1,this.deferredPrompt.prompt(),this.deferredPrompt.userChoice.then((function(e){"accepted"===e.outcome&&console.log("hoora"),t.deferredPrompt=null}))}},mounted:function(){var t=this;window.addEventListener("beforeinstallprompt",(function(e){e.preventDefault(),t.deferredPrompt=e,t.addToHomeScreen=!0}))}},s=a,c=(n("e275"),n("2877")),l=n("6544"),u=n.n(l),d=n("7496"),h=n("8336"),m=n("b0af"),g=n("99d9"),f=n("169a"),p=Object(c["a"])(s,o,r,!1,null,"0d9f7a80",null),b=p.exports;u()(p,{VApp:d["a"],VBtn:h["a"],VCard:m["a"],VCardActions:g["a"],VCardText:g["c"],VDialog:f["a"]});n("d3b7");var v=n("8c4f"),x=function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("div",{attrs:{id:"layout"}},[n("Navbar",{attrs:{user:t.user}}),n("v-content",{staticStyle:{"padding-left":"4px","padding-right":"4px"}},[n("router-view",{attrs:{user:t.user},on:{checkToken:t.checkToken}})],1),n("v-dialog",{attrs:{"max-width":"290"},model:{value:t.tutorialDialog,callback:function(e){t.tutorialDialog=e},expression:"tutorialDialog"}},[n("v-card",{staticClass:"mx-auto pt-2"},[n("v-card-text",{staticClass:"pb-0"},[t._v(" "+t._s(t.items.dialog)+" ")]),n("v-checkbox",{staticClass:"py-0 pr-4",attrs:{label:t.items.label},model:{value:t.checkbox,callback:function(e){t.checkbox=e},expression:"checkbox"}}),n("v-card-actions",{staticStyle:{"justify-content":"center"},attrs:{center:""}},[n("v-btn",{attrs:{color:"success"},on:{click:t.handleRead}},[n("a",{staticClass:"white--text",staticStyle:{"text-decoration":"none"},attrs:{href:"http://www.sarafi.com"}},[t._v(" "+t._s(t.items.read))])]),n("v-btn",{attrs:{color:"info"},on:{click:t.handleLater}},[t._v(t._s(t.items.later)+" ")])],1)],1)],1),n("v-dialog",{attrs:{"max-width":"290"},model:{value:t.notifDialog,callback:function(e){t.notifDialog=e},expression:"notifDialog"}},[n("v-card",{staticClass:"mx-auto pt-2"},[n("v-card-text",{staticClass:"pb-0"},[t._v(" لطفا امکان ارسال نوتیفیکیشن را با فشردن دکمه زیر حتما فعال کنید تا از آخرین سیگنال های ما سریعا مطلع شوید ")]),n("v-card-actions",{staticStyle:{"justify-content":"center"},attrs:{center:""}},[n("v-btn",{attrs:{color:"info"},on:{click:t.handleNotifClick}},[t._v("فعالسازی ")])],1)],1)],1),n("v-dialog",{attrs:{"max-width":"290"},model:{value:t.notifDialogDenied,callback:function(e){t.notifDialogDenied=e},expression:"notifDialogDenied"}},[n("v-card",{staticClass:"mx-auto pt-2"},[n("v-card-text",{staticClass:"pb-0"},[t._v(" امکان ارسال نوتیفیکشن در دستگاه شما محدود شده است، لطفا طبق آموزش زیر حتما امکان ارسال نوتیفیکیشن را بدهید ")]),n("v-card-actions",{staticStyle:{"justify-content":"center"},attrs:{center:""}})],1)],1),n("Footer",{attrs:{user:t.user}})],1)},k=[],y=(n("4160"),n("caad"),n("159b"),function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("nav",[n("v-app-bar",{attrs:{fixed:"",app:"",transparent:"",height:"45px"}},[n("v-app-bar-nav-icon",{staticClass:"white--text",on:{click:function(e){e.stopPropagation(),t.drawer=!t.drawer}}}),n("v-spacer"),n("div",{staticClass:"white--text",staticStyle:{"font-size":"13px"}},[t._v(" "+t._s(t.$route.name)+" ")]),n("v-spacer"),n("a",{on:{click:function(e){return t.$router.go(-1)}}},[n("v-icon",{attrs:{color:"white"}},[t._v("keyboard_backspace ")])],1)],1),n("v-navigation-drawer",{attrs:{app:"",width:"65%",dark:"",right:"",temporary:""},scopedSlots:t._u([{key:"append",fn:function(){return[n("div",{staticClass:"pa-2"},[n("v-btn",{staticClass:"grey--text text--darken-2",attrs:{block:"",light:""},on:{click:t.logout}},[n("v-icon",[t._v("exit_to_app")])],1)],1)]},proxy:!0}]),model:{value:t.drawer,callback:function(e){t.drawer=e},expression:"drawer"}},[n("v-img",{staticClass:"my-4 mx-auto",attrs:{src:"/img/logo-for-splash-screen.png","max-height":"100","max-width":"100",contain:""}}),n("v-divider"),n("v-list",[n("v-list-item",[n("v-list-item-content",[n("v-list-item-title",{staticClass:"caption",staticStyle:{"font-size":"16px!important","font-weight":"bold"}},[t._v(" "+t._s(t.user.fullName)+" ")])],1)],1),t._l(t.items,(function(e){return n("v-list-item",{key:e.title,attrs:{link:"",router:"",to:e.route}},[n("v-list-item-icon",{staticClass:"ml-1"},[n("v-icon",[t._v(t._s(e.icon))])],1),n("v-list-item-content",[n("v-list-item-title",{staticClass:"caption"},[t._v(t._s(e.title))])],1)],1)}))],2)],1)],1)}),w=[],_={props:{user:Object},data:function(){return{test:!1,persianItems:[{title:"خرید اشتراک ",icon:"payment",route:"/subscription"},{title:"درباره ی ما",icon:"info",route:"/about"},{title:"تماس با ما",icon:"contacts",route:"/contact"}],englishItems:[{title:"Buy account ",icon:"payment",route:"/subscription"},{title:"About Us",icon:"info",route:"/about"},{title:"Contact Us",icon:"contacts",route:"/contact"}],arabicItems:[{title:"الاشتراک ",icon:"payment",route:"/subscription"},{title:"خصوصیاتنا",icon:"info",route:"/about"},{title:"الاتصال بنا",icon:"contacts",route:"/contact"}],items:"",persianExit:"خروج",englishExit:"Exit",arabicExit:"اخرج",exit:"",drawer:!1}},methods:{logout:function(){var t=this;this.$http.get("logout/"+this.user.id).then((function(e){console.log(e),localStorage.removeItem("token"),t.$router.push("/login")})).catch((function(t){return console.log(t)}))},checkLanguage:function(){"ar"==this.user.language?(this.items=this.arabicItems,this.exit=this.arabicItems):"en"==this.user.language?(this.items=this.englishItems,this.exit=this.englishExit):(this.items=this.persianItems,this.exit=this.persianExit)}},computed:{},watch:{user:{handler:function(){this.checkLanguage()}}},mounted:function(){this.checkLanguage()}},C=_,S=(n("95ae"),n("40dc")),D=n("5bc1"),I=n("ce7e"),P=n("132d"),V=n("adda"),N=n("8860"),T=n("da13"),E=n("5d23"),L=n("34c3"),j=n("f774"),A=n("2fa4"),O=Object(c["a"])(C,y,w,!1,null,"6f42c03f",null),$=O.exports;u()(O,{VAppBar:S["a"],VAppBarNavIcon:D["a"],VBtn:h["a"],VDivider:I["a"],VIcon:P["a"],VImg:V["a"],VList:N["a"],VListItem:T["a"],VListItemContent:E["a"],VListItemIcon:L["a"],VListItemTitle:E["b"],VNavigationDrawer:j["a"],VSpacer:A["a"]});var B=function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("footer",[n("v-bottom-navigation",{attrs:{height:"50px",dark:"",grow:"",fixed:"",color:"white"},model:{value:t.bottomNav,callback:function(e){t.bottomNav=e},expression:"bottomNav"}},t._l(t.items,(function(e){return n("v-btn",{key:e.value,attrs:{value:e.value,router:"",to:e.route}},[n("span",[t._v(t._s(e.title))]),n("v-icon",[t._v(t._s(e.icon))])],1)})),1)],1)},F=[],H={props:{user:Object},data:function(){return{bottomNav:"tutorial",items:"",persianItems:[{title:"آموزش",icon:"account_balance",route:"/",value:"tutorial"},{title:"فارکس",icon:"bar_chart",route:"/farx",value:"farx"},{title:"باینری",icon:"multiline_chart",route:"/binary",value:"binary"},{title:"بایگانی",icon:"move_to_inbox",route:"/archive",value:"archive"}],englishItems:[{title:"Tutorial",icon:"account_balance",route:"/",value:"tutorial"},{title:"Farx",icon:"bar_chart",route:"/farx",value:"farx"},{title:"Binary",icon:"multiline_chart",route:"/binary",value:"binary"},{title:"Archive",icon:"move_to_inbox",route:"/archive",value:"archive"}],arabicItems:[{title:"تدريب",icon:"account_balance",route:"/",value:"tutorial"},{title:"فوركس",icon:"bar_chart",route:"/farx",value:"farx"},{title:"باینری",icon:"multiline_chart",route:"/binary",value:"binary"},{title:"الأرشيف",icon:"move_to_inbox",route:"/archive",value:"archive"}]}},methods:{checkLanguage:function(){"ar"==this.user.language?this.items=this.arabicItems:"en"==this.user.language?this.items=this.englishItems:this.items=this.persianItems}},watch:{user:{handler:function(){this.checkLanguage()}}},mounted:function(){this.checkLanguage()}},M=H,U=(n("690d"),n("b81c")),q=Object(c["a"])(M,B,F,!1,null,"6d44bbe5",null),R=q.exports;u()(q,{VBottomNavigation:U["a"],VBtn:h["a"],VIcon:P["a"]});var z=n("782e"),G=n.n(z),J=window.messaging,K={name:"App",components:{Navbar:$,Footer:R},data:function(){return{token:localStorage.getItem("token"),user:"",audio:new Audio("https://freesound.org/data/previews/66/66136_606715-lq.mp3"),notifDialog:!1,notifDialogDenied:!1,tutorialDialog:!1,checkbox:!1,items:{},arabicItems:{dialog:"لطفاابتدا به لینک زیر رفته و آموزش استفاده از اپلیکیشن را مطالعه فرمایید",label:"دیگر این پیام نشان داده نشود",later:"بعدا",read:"خواندن مقاله"},persianItems:{dialog:"لطفاابتدا به لینک زیر رفته و آموزش استفاده از اپلیکیشن را مطالعه فرمایید",label:"دیگر این پیام نشان داده نشود",later:"بعدا",read:"خواندن مقاله"},englishItems:{dialog:"Please go to the link below and read the tutorial on how to use app",label:"Don't show this again",later:"Later",read:"Read now"}}},methods:{checkToken:function(){var t=this;""==this.token?this.$router.push("/login"):this.$http.get("token",{params:{token:this.token}}).then((function(e){t.user=e.data,t.checkNotifSetting(),t.checkLanguage(),t.checkSubscribe()})).catch((function(e){console.log(e),localStorage.removeItem("token"),t.$router.push("/login")}))},checkSubscribe:function(){if(this.user.freeTime)this.farxSubscribe(),this.binarySubscribe();else{var t=[];this.user.plans.forEach((function(e){t.push(e.plan.type)})),t.includes("forex")&&t.includes("binary")?(this.farxSubscribe(),this.binarySubscribe()):t.includes("both")?(this.farxSubscribe(),this.binarySubscribe()):t.includes("forex")?this.farxSubscribe():t.includes("binary")&&this.binarySubscribe()}},farxSubscribe:function(){var t=this,e=new G.a("0b6db206a7be0ce7e956",{cluster:"ap2"});e.subscribe("ForexNotif"),e.bind("App\\Events\\ForexNotifEvent",(function(){return t.audio.play()}))},binarySubscribe:function(){var t=this,e=new G.a("0b6db206a7be0ce7e956",{cluster:"ap2"});e.subscribe("BinaryNotif"),e.bind("App\\Events\\BinaryNotif",(function(){return t.audio.play()}))},handleLater:function(){this.tutorialDialog=!1,1==this.checkbox&&(this.$http.get("user-guide-check/"+this.user.id).then((function(t){return console.log(t)})).catch((function(t){return console.log(t)})),this.$emit("checkToken"))},handleRead:function(){this.tutorialDialog=!1,1==this.checkbox&&(this.$http.get("user-guide-check/"+this.user.id).then((function(t){return console.log(t)})).then((function(){return window.location.href="http://www.sarafi.com"})).catch((function(t){return console.log(t)})),this.$emit("checkToken"),window.location.href="http://www.sarafi.com")},checkUserGuide:function(){"1"==this.user.guide_check?this.tutorialDialog=!1:"0"==this.user.guide_check&&(this.tutorialDialog=!0)},checkLanguage:function(){"ar"==this.user.language?this.items=this.arabicItems:"en"==this.user.language?this.items=this.englishItems:this.items=this.persianItems},initFCM:function(){var t=this;J.requestPermission().then((function(t){return console.log(t,"permission granted"),J.getToken()})).then((function(e){t.$http.get("take-token/"+t.user.id,{params:{api_key:e}}).then((function(t){return console.log(t)})).catch((function(t){return console.log(t)}))})).catch((function(t){console.log(t)}))},checkNotifSetting:function(){console.log(window.Notification.permission);var t=window.Notification||window.mozNotification||window.webkitNotification;"granted"===t.permission?this.initFCM():"denied"===t.permission?this.notifDialogDenied=!0:this.notifDialog=!0},handleNotifClick:function(){this.notifDialog=!1,this.initFCM()}},mounted:function(){this.checkToken(),this.checkUserGuide()},updated:function(){},watch:{user:{handler:function(){this.checkUserGuide()}}}},Q=K,W=n("ac7c"),X=n("a75b"),Y=Object(c["a"])(Q,x,k,!1,null,null,null),Z=Y.exports;u()(Y,{VBtn:h["a"],VCard:m["a"],VCardActions:g["a"],VCardText:g["c"],VCheckbox:W["a"],VContent:X["a"],VDialog:f["a"]}),i["a"].use(v["a"]);var tt=[{path:"/",name:"home",component:Z,children:[{path:"/",name:"آموزش",component:function(){return Promise.all([n.e("demo~login~register"),n.e("demo")]).then(n.bind(null,"cfa7"))}},{path:"/tutorial/farx",name:"آموزش فارکس",component:function(){return Promise.all([n.e("demo~login~register"),n.e("demo")]).then(n.bind(null,"b242"))}},{path:"/tutorial/binary",name:"آموزش باینری",component:function(){return Promise.all([n.e("demo~login~register"),n.e("demo")]).then(n.bind(null,"4ecd"))}},{path:"/tutorial/single/:id",name:"مقاله آموزشی",component:function(){return Promise.all([n.e("demo~login~register"),n.e("demo")]).then(n.bind(null,"d991"))}},{path:"/farx",name:"فارکس",component:function(){return Promise.all([n.e("demo~login~register"),n.e("demo")]).then(n.bind(null,"5df2"))}},{path:"/binary",name:"باینری آپشن",component:function(){return Promise.all([n.e("demo~login~register"),n.e("demo")]).then(n.bind(null,"87b5"))}},{path:"/archive",name:"آرشیو",component:function(){return Promise.all([n.e("demo~login~register"),n.e("demo")]).then(n.bind(null,"12b6"))}},{path:"/contact",name:"تماس با ما",component:function(){return Promise.all([n.e("demo~login~register"),n.e("demo")]).then(n.bind(null,"e9bb"))}},{path:"/about",name:"درباره ی ما",component:function(){return Promise.all([n.e("demo~login~register"),n.e("demo")]).then(n.bind(null,"2664"))}},{path:"/subscription",name:"اشتراک",component:function(){return Promise.all([n.e("demo~login~register"),n.e("demo")]).then(n.bind(null,"d7e2"))}}]},{path:"/register",name:"عضویت",component:function(){return Promise.all([n.e("demo~login~register"),n.e("login~register"),n.e("register")]).then(n.bind(null,"3232"))}},{path:"/login",name:"ورود",component:function(){return Promise.all([n.e("demo~login~register"),n.e("login~register"),n.e("login")]).then(n.bind(null,"d60c"))}},{path:"/test",name:"ورود",component:function(){return Promise.all([n.e("demo~login~register"),n.e("login~register"),n.e("login")]).then(n.bind(null,"2762"))}}],et=new v["a"]({base:"/",linkExactActiveClass:"active",routes:tt}),nt=et,it=n("bc3a"),ot=n.n(it),rt=n("f309");i["a"].use(rt["a"]);var at=new rt["a"]({rtl:!0}),st=(n("89e3"),n("683f"));n("ddb8");i["a"].use(st["a"]),i["a"].config.productionTip=!1,ot.a.defaults.baseURL="https://signal.tipsy.ir/",i["a"].prototype.$http=ot.a,new i["a"]({router:nt,vuetify:at,render:function(t){return t(b)}}).$mount("#app")},"690d":function(t,e,n){"use strict";var i=n("31d1"),o=n.n(i);o.a},"89e3":function(t,e,n){},"95ae":function(t,e,n){"use strict";var i=n("1769"),o=n.n(i);o.a},b592:function(t,e,n){},ddb8:function(t,e){},e275:function(t,e,n){"use strict";var i=n("b592"),o=n.n(i);o.a}});
//# sourceMappingURL=app.ff45cbe1.js.map