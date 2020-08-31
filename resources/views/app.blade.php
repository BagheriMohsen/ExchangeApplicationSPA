<!DOCTYPE html><html lang=en><head><meta charset=utf-8><meta http-equiv=X-UA-Compatible content="IE=edge"><meta name=viewport content="width=device-width,initial-scale=1"><!--[if IE]><link rel="icon" href="/favicon.ico"><![endif]--><title>unique-app</title><link rel=manifest href=/manifest.json><link rel=stylesheet href=https://cdn.jsdelivr.net/npm/@mdi/font@latest/css/materialdesignicons.min.css><link rel=stylesheet href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons"><link href=/css/demo.af8d6250.css rel=prefetch><link href=/css/demo~login~register.0670aa22.css rel=prefetch><link href=/css/login.7e2831e3.css rel=prefetch><link href=/css/login~register.c0df4ef6.css rel=prefetch><link href=/css/register.3e9c8968.css rel=prefetch><link href=/js/demo.6f9e6c5c.js rel=prefetch><link href=/js/demo~login~register.6e979924.js rel=prefetch><link href=/js/login.0c8489f0.js rel=prefetch><link href=/js/login~register.13d124e3.js rel=prefetch><link href=/js/register.257199bc.js rel=prefetch><link href=/css/app.c891ee53.css rel=preload as=style><link href=/css/chunk-vendors.970a74ef.css rel=preload as=style><link href=/js/app.3f4f9449.js rel=preload as=script><link href=/js/chunk-vendors.6ed0c009.js rel=preload as=script><link href=/css/chunk-vendors.970a74ef.css rel=stylesheet><link href=/css/app.c891ee53.css rel=stylesheet><link rel=icon type=image/png sizes=32x32 href=/img/icons/favicon-32x32.png><link rel=icon type=image/png sizes=16x16 href=/img/icons/favicon-16x16.png><link rel=manifest href=/manifest.json><meta name=theme-color content=#4DBA87><meta name=apple-mobile-web-app-capable content=no><meta name=apple-mobile-web-app-status-bar-style content=default><meta name=apple-mobile-web-app-title content=unique-app><link rel=apple-touch-icon href=/img/icons/apple-touch-icon-152x152.png><link rel=mask-icon href=/img/icons/safari-pinned-tab.svg color=#4DBA87><meta name=msapplication-TileImage content=/img/icons/msapplication-icon-144x144.png><meta name=msapplication-TileColor content=#000000></head><body><noscript><strong>We're sorry but unique-app doesn't work properly without JavaScript enabled. Please enable it to continue.</strong></noscript><div id=app></div><script src=https://www.gstatic.com/firebasejs/7.9.3/firebase-app.js></script><script src=https://www.gstatic.com/firebasejs/7.9.3/firebase-messaging.js></script><script>var firebaseConfig = {
    apiKey: "AIzaSyAFsD8KzVcrkg9eogMoC5PznU0Ztsjes-s",
    authDomain: "webpush-2096d.firebaseapp.com",
    databaseURL: "https://webpush-2096d.firebaseio.com",
    projectId: "webpush-2096d",
    storageBucket: "webpush-2096d.appspot.com",
    messagingSenderId: "379512137881",
    appId: "1:379512137881:web:d07cfc5ee290feb1a1f008",
    measurementId: "G-7EQFJSDNNM"
  };
  // Initialize Firebase
  var firebase = window.firebase || [];
  firebase.initializeApp(firebaseConfig);
  var messaging = firebase.messaging();
  navigator.serviceWorker.register('./firebase-messaging-sw.js')
  .then((registration) => {
    messaging.useServiceWorker(registration);
  });</script><script src=/js/chunk-vendors.6ed0c009.js></script><script src=/js/app.3f4f9449.js></script></body></html>