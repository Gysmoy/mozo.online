import { initializeApp } from "https://www.gstatic.com/firebasejs/9.1.3/firebase-app.js";
import { doc, getDoc, onSnapshot, getFirestore } from "https://www.gstatic.com/firebasejs/9.1.3/firebase-firestore.js";

var firebaseConfig = {
    apiKey: "AIzaSyAGpDt6iCxpkSNL_5aU0SkEpD9Yw_dIixc",
    authDomain: "shop-40792.firebaseapp.com",
    projectId: "shop-40792",
    storageBucket: "shop-40792.appspot.com",
    messagingSenderId: "179521115808",
    appId: "1:179521115808:web:0b99c249944008240a5bc5"
};

const idUser = '655e786674d9d3e77bc05ed1de37b4b6bc89f788829f9f3c679e7687b410c89b';

const firebaseApp = initializeApp(firebaseConfig);
const db = getFirestore();

onSnapshot(doc(db, 'users', idUser), (query) => {
    config = query.data().config;
    menu = query.data().menu;
    setConfig();
    setMenu();
})

getImage =  async function getImage(id, type = 'HTML') {
    type = type.toUpperCase();
    const docRef = doc(db, 'images', idUser);
    const docSnap = await getDoc(docRef);
    if (docSnap.exists()) {
        const image = docSnap.data()[id];
        return image;
    } else {
        console.log('');
    }
}