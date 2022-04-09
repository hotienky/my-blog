/*
Give the service worker access to Firebase Messaging.
Note that you can only use Firebase Messaging here, other Firebase libraries are not available in the service worker.
*/
importScripts('https://www.gstatic.com/firebasejs/7.23.0/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/7.23.0/firebase-messaging.js');
   
/*
Initialize the Firebase app in the service worker by passing in the messagingSenderId.
* New configuration for app@pulseservice.com
*/
firebase.initializeApp({
      apiKey: "AIzaSyB7mprSl8o97RyQOKcG4AQYmWfW1HZ1r-I",
      authDomain: "my-blog-5cfd0.firebaseapp.com",
      databaseURL: "https://my-blog-5cfd0-default-rtdb.asia-southeast1.firebasedatabase.app",
      projectId: "my-blog-5cfd0",
      storageBucket: "my-blog-5cfd0.appspot.com",
      messagingSenderId: "8647800564",
      appId: "1:8647800564:web:9ff69d72a4f7d8a28c90a1",
      measurementId: "G-0LC02XX2M7"
    });
  
/*
Retrieve an instance of Firebase Messaging so that it can handle background messages.
*/
const messaging = firebase.messaging();
messaging.setBackgroundMessageHandler(function(payload) {
    console.log(
        "[firebase-messaging-sw.js] Received background message ",
        payload,
    );
    /* Customize notification here */
    const notificationTitle = "Background Message Title";
    const notificationOptions = {
        body: "Background Message body.",
        icon: "/itwonders-web-logo.png",
    };
  
    return self.registration.showNotification(
        notificationTitle,
        notificationOptions,
    );
});