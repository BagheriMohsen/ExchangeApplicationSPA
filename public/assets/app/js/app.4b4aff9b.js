(function(e){function t(t){for(var i,r,s=t[0],c=t[1],u=t[2],l=0,d=[];l<s.length;l++)r=s[l],Object.prototype.hasOwnProperty.call(o,r)&&o[r]&&d.push(o[r][0]),o[r]=0;for(i in c)Object.prototype.hasOwnProperty.call(c,i)&&(e[i]=c[i]);m&&m(t);while(d.length)d.shift()();return a.push.apply(a,u||[]),n()}function n(){for(var e,t=0;t<a.length;t++){for(var n=a[t],i=!0,r=1;r<n.length;r++){var s=n[r];0!==o[s]&&(i=!1)}i&&(a.splice(t--,1),e=c(c.s=n[0]))}return e}var i={},r={app:0},o={app:0},a=[];function s(e){return c.p+"js/"+({"demo~login~register":"demo~login~register",demo:"demo","login~register":"login~register",login:"login",register:"register"}[e]||e)+"."+{"demo~login~register":"b6e1a23a",demo:"52353e5a","login~register":"99df24be",login:"d52218d0",register:"62cb92a7"}[e]+".js"}function c(t){if(i[t])return i[t].exports;var n=i[t]={i:t,l:!1,exports:{}};return e[t].call(n.exports,n,n.exports,c),n.l=!0,n.exports}c.e=function(e){var t=[],n={"demo~login~register":1,demo:1,"login~register":1,login:1,register:1};r[e]?t.push(r[e]):0!==r[e]&&n[e]&&t.push(r[e]=new Promise((function(t,n){for(var i="css/"+({"demo~login~register":"demo~login~register",demo:"demo","login~register":"login~register",login:"login",register:"register"}[e]||e)+"."+{"demo~login~register":"6a605fdd",demo:"3528a3a6","login~register":"c0df4ef6",login:"994457c1",register:"4a4573e9"}[e]+".css",o=c.p+i,a=document.getElementsByTagName("link"),s=0;s<a.length;s++){var u=a[s],l=u.getAttribute("data-href")||u.getAttribute("href");if("stylesheet"===u.rel&&(l===i||l===o))return t()}var d=document.getElementsByTagName("style");for(s=0;s<d.length;s++){u=d[s],l=u.getAttribute("data-href");if(l===i||l===o)return t()}var m=document.createElement("link");m.rel="stylesheet",m.type="text/css",m.onload=t,m.onerror=function(t){var i=t&&t.target&&t.target.src||o,a=new Error("Loading CSS chunk "+e+" failed.\n("+i+")");a.code="CSS_CHUNK_LOAD_FAILED",a.request=i,delete r[e],m.parentNode.removeChild(m),n(a)},m.href=o;var p=document.getElementsByTagName("head")[0];p.appendChild(m)})).then((function(){r[e]=0})));var i=o[e];if(0!==i)if(i)t.push(i[2]);else{var a=new Promise((function(t,n){i=o[e]=[t,n]}));t.push(i[2]=a);var u,l=document.createElement("script");l.charset="utf-8",l.timeout=120,c.nc&&l.setAttribute("nonce",c.nc),l.src=s(e);var d=new Error;u=function(t){l.onerror=l.onload=null,clearTimeout(m);var n=o[e];if(0!==n){if(n){var i=t&&("load"===t.type?"missing":t.type),r=t&&t.target&&t.target.src;d.message="Loading chunk "+e+" failed.\n("+i+": "+r+")",d.name="ChunkLoadError",d.type=i,d.request=r,n[1](d)}o[e]=void 0}};var m=setTimeout((function(){u({type:"timeout",target:l})}),12e4);l.onerror=l.onload=u,document.head.appendChild(l)}return Promise.all(t)},c.m=e,c.c=i,c.d=function(e,t,n){c.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:n})},c.r=function(e){"undefined"!==typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},c.t=function(e,t){if(1&t&&(e=c(e)),8&t)return e;if(4&t&&"object"===typeof e&&e&&e.__esModule)return e;var n=Object.create(null);if(c.r(n),Object.defineProperty(n,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var i in e)c.d(n,i,function(t){return e[t]}.bind(null,i));return n},c.n=function(e){var t=e&&e.__esModule?function(){return e["default"]}:function(){return e};return c.d(t,"a",t),t},c.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},c.p="/assets/app/",c.oe=function(e){throw console.error(e),e};var u=window["webpackJsonp"]=window["webpackJsonp"]||[],l=u.push.bind(u);u.push=t,u=u.slice();for(var d=0;d<u.length;d++)t(u[d]);var m=l;a.push([0,"chunk-vendors"]),n()})({0:function(e,t,n){e.exports=n("56d7")},"31d1":function(e,t,n){},"56d7":function(e,t,n){"use strict";n.r(t);n("e260"),n("e6cf"),n("cca6"),n("a79d");var i=n("2b0e"),r=function(){var e=this,t=e.$createElement,n=e._self._c||t;return n("div",{staticClass:"back",attrs:{id:"app"}},[n("v-app",{attrs:{id:"inspire"}},[n("router-view")],1)],1)},o=[],a={name:"App",data:function(){return{}}},s=a,c=n("2877"),u=n("6544"),l=n.n(u),d=n("7496"),m=Object(c["a"])(s,r,o,!1,null,null,null),p=m.exports;l()(m,{VApp:d["a"]});n("d3b7");var h=n("8c4f"),g=function(){var e=this,t=e.$createElement,n=e._self._c||t;return n("div",{attrs:{id:"layout"}},[n("Navbar",{attrs:{user:e.user}}),n("v-content",{staticStyle:{"padding-left":"4px","padding-right":"4px"}},[n("router-view",{attrs:{user:e.user},on:{checkToken:e.checkToken}})],1),n("Footer",{attrs:{user:e.user}})],1)},f=[],b=(n("4160"),n("caad"),n("159b"),function(){var e=this,t=e.$createElement,n=e._self._c||t;return n("nav",[n("v-app-bar",{attrs:{fixed:"",app:"",transparent:"",height:"45px"}},[n("v-app-bar-nav-icon",{staticClass:"white--text",on:{click:function(t){t.stopPropagation(),e.drawer=!e.drawer}}}),n("v-spacer"),n("div",{staticClass:"white--text",staticStyle:{"font-size":"13px"}},[e._v(" "+e._s(e.$route.name)+" ")]),n("v-spacer"),n("a",{on:{click:function(t){return e.$router.go(-1)}}},[n("v-icon",{attrs:{color:"white"}},[e._v("keyboard_backspace ")])],1)],1),n("v-navigation-drawer",{attrs:{app:"",width:"65%",dark:"",right:"",temporary:""},scopedSlots:e._u([{key:"append",fn:function(){return[n("div",{staticClass:"pa-2"},[n("v-btn",{staticClass:"grey--text text--darken-2",attrs:{block:"",light:""},on:{click:e.logout}},[n("v-icon",[e._v("exit_to_app")])],1)],1)]},proxy:!0}]),model:{value:e.drawer,callback:function(t){e.drawer=t},expression:"drawer"}},[n("v-img",{staticClass:"my-4 mx-auto",attrs:{src:"/img/logo-for-splash-screen.png","max-height":"100","max-width":"100",contain:""}}),n("v-divider"),n("v-list",[n("v-list-item",[n("v-list-item-content",[n("v-list-item-title",{staticClass:"caption"},[e._v(" "+e._s(e.user.fullName))])],1)],1),e._l(e.items,(function(t){return n("v-list-item",{key:t.title,attrs:{link:"",router:"",to:t.route}},[n("v-list-item-icon",{staticClass:"ml-1"},[n("v-icon",[e._v(e._s(t.icon))])],1),n("v-list-item-content",[n("v-list-item-title",{staticClass:"caption"},[e._v(e._s(t.title))])],1)],1)}))],2)],1)],1)}),v=[],y={props:{user:Object},data:function(){return{test:!1,persianItems:[{title:"درباره ی ما",icon:"info",route:"/about"},{title:"تماس با ما",icon:"contacts",route:"/contact"},{title:"عضویت ",icon:"assignment_turned_in",route:"/register"},{title:"اشتراک ",icon:"payment",route:"/subscription"}],englishItems:[{title:"About Us",icon:"info",route:"/about"},{title:"Contact Us",icon:"contacts",route:"/contact"},{title:"Register",icon:"assignment_turned_in",route:"/register"},{title:"Subscription ",icon:"payment",route:"/subscription"}],arabicItems:[{title:"معلومات عنا",icon:"info",route:"/about"},{title:"اتصل بنا",icon:"contacts",route:"/contact"},{title:"تسجيل",icon:"assignment_turned_in",route:"/register"},{title:"اشتراك ",icon:"payment",route:"/subscription"}],items:"",persianExit:"خروج",englishExit:"Exit",arabicExit:"اخرج",exit:"",drawer:!1}},methods:{logout:function(){var e=this;this.$http.get("logout/"+this.user.id).then((function(t){console.log(t),localStorage.removeItem("token"),e.$router.push("/login")})).catch((function(e){return console.log(e)}))},checkLanguage:function(){"ar"==this.user.language?(this.items=this.arabicItems,this.exit=this.arabicItems):"en"==this.user.language?(this.items=this.englishItems,this.exit=this.englishExit):(this.items=this.persianItems,this.exit=this.persianExit)}},computed:{},watch:{user:{handler:function(){this.checkLanguage()}}},mounted:function(){this.checkLanguage()}},x=y,_=(n("a4d1"),n("40dc")),k=n("5bc1"),w=n("8336"),S=n("ce7e"),I=n("132d"),E=n("adda"),P=n("8860"),C=n("da13"),N=n("5d23"),O=n("34c3"),V=n("f774"),j=n("2fa4"),A=Object(c["a"])(x,b,v,!1,null,"ef429fb0",null),L=A.exports;l()(A,{VAppBar:_["a"],VAppBarNavIcon:k["a"],VBtn:w["a"],VDivider:S["a"],VIcon:I["a"],VImg:E["a"],VList:P["a"],VListItem:C["a"],VListItemContent:N["a"],VListItemIcon:O["a"],VListItemTitle:N["b"],VNavigationDrawer:V["a"],VSpacer:j["a"]});var T=function(){var e=this,t=e.$createElement,n=e._self._c||t;return n("footer",[n("v-bottom-navigation",{attrs:{height:"50px",dark:"",grow:"",fixed:"",color:"white"},model:{value:e.bottomNav,callback:function(t){e.bottomNav=t},expression:"bottomNav"}},e._l(e.items,(function(t){return n("v-btn",{key:t.value,attrs:{value:t.value,router:"",to:t.route}},[n("span",[e._v(e._s(t.title))]),n("v-icon",[e._v(e._s(t.icon))])],1)})),1)],1)},$=[],B={props:{user:Object},data:function(){return{bottomNav:"tutorial",items:"",persianItems:[{title:"آموزش",icon:"account_balance",route:"/",value:"tutorial"},{title:"فارکس",icon:"bar_chart",route:"/farx",value:"farx"},{title:"باینری",icon:"multiline_chart",route:"/binary",value:"binary"},{title:"بایگانی",icon:"move_to_inbox",route:"/archive",value:"archive"}],englishItems:[{title:"Tutorial",icon:"account_balance",route:"/",value:"tutorial"},{title:"Farx",icon:"bar_chart",route:"/farx",value:"farx"},{title:"Binary",icon:"multiline_chart",route:"/binary",value:"binary"},{title:"Archive",icon:"move_to_inbox",route:"/archive",value:"archive"}],arabicItems:[{title:"تدريب",icon:"account_balance",route:"/",value:"tutorial"},{title:"فوركس",icon:"bar_chart",route:"/farx",value:"farx"},{title:"باینری",icon:"multiline_chart",route:"/binary",value:"binary"},{title:"الأرشيف",icon:"move_to_inbox",route:"/archive",value:"archive"}]}},methods:{checkLanguage:function(){"ar"==this.user.language?this.items=this.arabicItems:"en"==this.user.language?this.items=this.englishItems:this.items=this.persianItems}},watch:{user:{handler:function(){this.checkLanguage()}}},mounted:function(){this.checkLanguage()}},F=B,D=(n("690d"),n("b81c")),M=Object(c["a"])(F,T,$,!1,null,"6d44bbe5",null),U=M.exports;l()(M,{VBottomNavigation:D["a"],VBtn:w["a"],VIcon:I["a"]});var q=n("782e"),J=n.n(q),R={name:"App",components:{Navbar:L,Footer:U},data:function(){return{token:localStorage.getItem("token"),user:"",audio:new Audio("https://freesound.org/data/previews/66/66136_606715-lq.mp3")}},methods:{checkToken:function(){var e=this;""==this.token?this.$router.push("/login"):this.$http.get("token",{params:{token:this.token}}).then((function(t){e.user=t.data,e.checkSubscribe()})).catch((function(t){console.log(t),e.$router.push("/login")}))},checkSubscribe:function(){if(this.user.freeTime)this.farxSubscribe(),this.binarySubscribe();else{var e=[];this.user.plans.forEach((function(t){e.push(t.plan.type)})),e.includes("forex")&&e.includes("binary")?(this.farxSubscribe(),this.binarySubscribe()):e.includes("both")?(this.farxSubscribe(),this.binarySubscribe()):e.includes("forex")?this.farxSubscribe():e.includes("binary")&&this.binarySubscribe()}},farxSubscribe:function(){var e=this,t=new J.a("0b6db206a7be0ce7e956",{cluster:"ap2"});t.subscribe("ForexNotif"),t.bind("App\\Events\\ForexNotifEvent",(function(){return e.audio.play()}))},binarySubscribe:function(){var e=this,t=new J.a("0b6db206a7be0ce7e956",{cluster:"ap2"});t.subscribe("BinaryNotif"),t.bind("App\\Events\\BinaryNotif",(function(){return e.audio.play()}))}},created:function(){this.checkToken()},updated:function(){},mounted:function(){}},z=R,H=n("a75b"),K=Object(c["a"])(z,g,f,!1,null,null,null),G=K.exports;l()(K,{VContent:H["a"]}),i["a"].use(h["a"]);var Q=[{path:"/",name:"home",component:G,children:[{path:"/",name:"آموزش",component:function(){return Promise.all([n.e("demo~login~register"),n.e("demo")]).then(n.bind(null,"cfa7"))}},{path:"/tutorial/farx",name:"آموزش فارکس",component:function(){return Promise.all([n.e("demo~login~register"),n.e("demo")]).then(n.bind(null,"b242"))}},{path:"/tutorial/binary",name:"آموزش باینری",component:function(){return Promise.all([n.e("demo~login~register"),n.e("demo")]).then(n.bind(null,"4ecd"))}},{path:"/tutorial/single/:id",name:"مقاله آموزشی",component:function(){return Promise.all([n.e("demo~login~register"),n.e("demo")]).then(n.bind(null,"d991"))}},{path:"/farx",name:"فارکس",component:function(){return Promise.all([n.e("demo~login~register"),n.e("demo")]).then(n.bind(null,"5df2"))}},{path:"/binary",name:"باینری آپشن",component:function(){return Promise.all([n.e("demo~login~register"),n.e("demo")]).then(n.bind(null,"87b5"))}},{path:"/archive",name:"آرشیو",component:function(){return Promise.all([n.e("demo~login~register"),n.e("demo")]).then(n.bind(null,"12b6"))}},{path:"/contact",name:"تماس با ما",component:function(){return Promise.all([n.e("demo~login~register"),n.e("demo")]).then(n.bind(null,"e9bb"))}},{path:"/about",name:"درباره ی ما",component:function(){return Promise.all([n.e("demo~login~register"),n.e("demo")]).then(n.bind(null,"2664"))}},{path:"/subscription",name:"اشتراک",component:function(){return Promise.all([n.e("demo~login~register"),n.e("demo")]).then(n.bind(null,"d7e2"))}}]},{path:"/register",name:"عضویت",component:function(){return Promise.all([n.e("demo~login~register"),n.e("login~register"),n.e("register")]).then(n.bind(null,"3232"))}},{path:"/login",name:"ورود",component:function(){return Promise.all([n.e("demo~login~register"),n.e("login~register"),n.e("login")]).then(n.bind(null,"d60c"))}},{path:"/test",name:"ورود",component:function(){return Promise.all([n.e("demo~login~register"),n.e("login~register"),n.e("login")]).then(n.bind(null,"2762"))}}],W=new h["a"]({base:"/",linkExactActiveClass:"active",routes:Q}),X=W,Y=n("bc3a"),Z=n.n(Y),ee=n("f309");i["a"].use(ee["a"]);var te=new ee["a"]({rtl:!0}),ne=(n("89e3"),n("683f"));i["a"].use(ne["a"]),i["a"].config.productionTip=!1,Z.a.defaults.baseURL="http://localhost:8000/",i["a"].prototype.$http=Z.a,new i["a"]({router:X,vuetify:te,render:function(e){return e(p)}}).$mount("#app")},"690d":function(e,t,n){"use strict";var i=n("31d1"),r=n.n(i);r.a},"89e3":function(e,t,n){},a40e:function(e,t,n){},a4d1:function(e,t,n){"use strict";var i=n("a40e"),r=n.n(i);r.a}});
//# sourceMappingURL=app.4b4aff9b.js.map