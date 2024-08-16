//LAYOUT
import { hamburger } from './layout';
//COMPONENTS
import { Modal, File } from './components';

import "../sass/main.scss";

window.addEventListener('load', ()=>{
    hamburger();
    Modal();
    File();
});