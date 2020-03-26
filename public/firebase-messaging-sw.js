importScripts('https://www.gstatic.com/firebasejs/7.9.3/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/7.9.3/firebase-messaging.js');

var firebaseConfig = {
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
  firebase.initializeApp(firebaseConfig);
  const messaging = firebase.messaging();
  messaging.setBackgroundMessageHandler(function(payload) {
    console.log('[firebase-messaging-sw.js] Received background message ', payload);
    // Customize notification here
    // alert('test');
    const notificationTitle = payload.data.title;
    const notificationOptions = {
      body: payload.data.body,
      icon: './img/icons/icon-192x192.png',
      badge: './img/icons/icon-72x72.png'
    };
  
    return self.registration.showNotification(notificationTitle,
      notificationOptions);
  });
  


  




  // importScripts("https://storage.googleapis.com/workbox-cdn/releases/4.3.1/workbox-sw.js");

  // importScripts(
  //   "/precache-manifest.72ed1c3d5d5ea023d27975068bcd43d1.js"
  // );
  
  // workbox.core.setCacheNameDetails({prefix: "unique-app"});
  
  // self.addEventListener('message', (event) => {
  //   if (event.data && event.data.type === 'SKIP_WAITING') {
  //     self.skipWaiting();
  //   }
  // });
  
  // /**
  //  * The workboxSW.precacheAndRoute() method efficiently caches and responds to
  //  * requests for URLs in the manifest.
  //  * See https://goo.gl/S9QRab
  //  */
  // self.__precacheManifest = [].concat(self.__precacheManifest || []);
  // workbox.precaching.precacheAndRoute(self.__precacheManifest, {});
  