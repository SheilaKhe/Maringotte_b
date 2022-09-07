import './styles/app.css';
import './bootstrap';
import './styles/app.css';
import '@splidejs/splide/css';
import Splide from '@splidejs/splide';


require('@fortawesome/fontawesome-free/css/all.min.css');
require('@fortawesome/fontawesome-free/js/all.js');

const $ = require('jquery');
require('bootstrap');

//Slider - La Maringotte
if (document.querySelector('.splide')) {
    new Splide( '.splide', {
        type: 'loop',
        perPage: 2,
        perMove: 1,
        autoplay: true,
        interval: 1500,
        arrows: true,
        speed: 5000,

    } ).mount();
}

// Redirection - écran



