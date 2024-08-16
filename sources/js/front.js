//LAYOUT
import { hamburger } from './layout';
//COMPONENTS
import { Modal, File, RegisterUser } from './components';

import "../sass/main.scss";

window.addEventListener('load', ()=>{
    hamburger();
    Modal();
    RegisterUser();
    File();
});