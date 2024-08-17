//LAYOUT
import { hamburger } from './layout';
//COMPONENTS
import { Modal, File, RegisterBill, RegisterUser } from './components';

import "../sass/main.scss";

window.addEventListener('load', ()=>{
    hamburger();
    Modal();
    RegisterBill();
    RegisterUser();
    File();
});