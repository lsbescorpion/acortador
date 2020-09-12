importScripts('https://www.gstatic.com/firebasejs/7.13.2/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/7.13.2/firebase-messaging.js');

var PROJECT = 'usefulcontentsites';
var CAPPING_DOMAIN = 'c.usefulcontentsites.com';

firebase.initializeApp({
  apiKey: "AIzaSyDhy6-z-AiVhO-53M5SxI9zDI89x5F7YQU",
  authDomain: "usefulcontentsites.firebaseapp.com",
  databaseURL: "https://usefulcontentsites.firebaseio.com",
  projectId: "usefulcontentsites",
  storageBucket: "usefulcontentsites.appspot.com",
  messagingSenderId: "517828191182",
  appId: "1:517828191182:web:e83ea882ca94b74197819f"
});

importScripts('https://cdn.usefulcontentsites.com/js/push/sw/idb-keyval-iife.min.js?t=7');
importScripts('https://cdn.usefulcontentsites.com/js/push/sw/firebase-messaging-handler.js?t=7');
