importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js');
console.log('asd');
firebase.initializeApp({
    apiKey: "AIzaSyCA95ibEvzR3H1I2_Kob3eyAR9-YTirvaA",
    authDomain: "twitter-ff353.firebaseapp.com",
    projectId: "twitter-ff353",
    storageBucket: "twitter-ff353.appspot.com",
    messagingSenderId: "773375455379",
    appId: "1:773375455379:web:a37c083c1ff35e17ac9d66",
    measurementId: "G-TR36B87D1Y"
});

const messaging = firebase.messaging();
messaging.setBackgroundMessageHandler(function({data:{title,body,icon}}) {
    return self.registration.showNotification(title,{body,icon});
});
