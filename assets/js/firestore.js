import { initializeApp } from "https://www.gstatic.com/firebasejs/9.1.3/firebase-app.js";
import { collection, doc, getDoc, onSnapshot, getFirestore } from "https://www.gstatic.com/firebasejs/9.1.3/firebase-firestore.js";

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

/* Escuchar las actualizaciones de la configuración general */
onSnapshot(doc(db, 'users', idUser, 'config', 'general'), (general) => {
    config.general = general.data();
    setGeneralConfig(config.general);
})

/* Escuchar las actualizaciones de la configuración específica */
onSnapshot(doc(db, 'users', idUser, 'config', 'especific'), (especific) => {
    config.especific = especific.data();
    setEspecificConfig(config.especific);
})

onSnapshot(collection(db, 'users', idUser, 'dishes'), (dishes) => {
    dishes.forEach(contenedor => {
        menu[contenedor.id] = contenedor.data();
    });
    setMenu();
})

getImage = async function getImage(idImages, idImage) {
    if (sessionStorage.getItem(idImage) == null) {
        
        const ref = doc(db, 'images', idUser, idImages, idImage);
        const docImage = await getDoc(ref);
        if (docImage.exists()) {
            const image = docImage.data().data;
            sessionStorage.setItem(idImage, image);
            console.log('Image source got from database');
            return 'data:image/png;base64,' + image;
        } else {
            console.log('Image source got from default')
            return '/files/maindata/default.jpg';
        }
    } else {
        console.log('Image source got from localstorage');
        const image = sessionStorage.getItem(idImage);
        return 'data:image/png;base64,' + image;
    }

}