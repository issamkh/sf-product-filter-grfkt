/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you require will output into a single css file (app.css in this case)
require('../css/app.css');

import noUiSlider from 'noUiSlider';
import 'nouislider/distribute/nouislider.css'

// Need jQuery? Install it with "yarn add jquery", then uncomment to require it.
// const $ = require('jquery');
console.log('Hello Webpack Encore! Edit me in assets/js/app.js');

const slider = document.getElementById('price-slider');



if(slider){
    const min = document.getElementById('min');
    const max = document.getElementById('max');
    const minValue = Math.floor(parseInt(slider.dataset.min , 10) / 10 ) * 10;
    const maxValue = Math.ceil(parseInt(slider.dataset.max , 10) / 10 ) * 10;

    const range = noUiSlider.create(slider, {
        start: [min.value || minValue, max.value || maxValue ],
        connect: true,
        range: {
            'min': minValue,
            'max': maxValue
        }
    });

    range.on('slide', function(values, handle){

        if(handle === 0){
            min.value = parseInt(values[0]);
        }else{
            max.value= parseInt(values[1]);
        }



    })
}
