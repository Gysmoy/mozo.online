var firebaseConfig = {
    apiKey: "AIzaSyAGpDt6iCxpkSNL_5aU0SkEpD9Yw_dIixc",
    authDomain: "shop-40792.firebaseapp.com",
    projectId: "shop-40792",
    storageBucket: "shop-40792.appspot.com",
    messagingSenderId: "179521115808",
    appId: "1:179521115808:web:0b99c249944008240a5bc5"
};

var idUser = null;
var config = {};
var menu = {};

// Initialize Firebase
firebase.initializeApp(firebaseConfig);
var db = firebase.firestore();
db.collection('data').get().then((query) => {
    query.forEach((user) => {
        idUser = user.id;
        config = user.data().config;
        menu = user.data().menu;
        setConfig();
        setMenu();
    });
})