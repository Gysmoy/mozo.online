var firebaseConfig = {
    apiKey: "AIzaSyAGpDt6iCxpkSNL_5aU0SkEpD9Yw_dIixc",
    authDomain: "shop-40792.firebaseapp.com",
    projectId: "shop-40792",
    storageBucket: "shop-40792.appspot.com",
    messagingSenderId: "179521115808",
    appId: "1:179521115808:web:0b99c249944008240a5bc5"
};

var idUser = '655e786674d9d3e77bc05ed1de37b4b6bc89f788829f9f3c679e7687b410c89b';
var config = {};
var menu = {};

// Initialize Firebase
firebase.initializeApp(firebaseConfig);

var db = firebase.firestore();

/*db.collection('users').doc(idUser).get().then((query) => {
    config = query.data().config;
    menu = query.data().menu;
    setConfig();
    setMenu();
})*/

db.collection('users').doc(idUser).onSnapshot((query) => {
    config = query.data().config;
    menu = query.data().menu;
    setConfig();
    setMenu();
})