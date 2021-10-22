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
    if (JSON.stringify(config) === JSON.stringify(query.data().config)) { } else {
        config = query.data().config;
        setConfig();
    }
    if (JSON.stringify(menu) === JSON.stringify(query.data().menu)) { } else {
        menu = query.data().menu;
        setMenu();
    }
})

getImage = async function getImage(idImages, idImage) {
    if (localStorage.getItem(idImage) == null) {
        console.log('Obtuvo la imagen de la base de datos');
        const docRef = doc(db, 'images', idUser, idImages, idImage);
        const docSnap = await getDoc(docRef);
        if (docSnap.exists()) {
            const image = docSnap.data().image;
            localStorage.setItem(idImage, image);
            return 'data:image/jpeg;base64,' + image;
        } else {
            return 'data:image/jpeg;base64,';
        }
    } else {
        console.log('Obtuvo la imagen de almacenamiento local');
        const image = localStorage.getItem(idImage);
        return 'data:image/jpeg;base64,' + image;
    }

}