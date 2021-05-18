/*
 * Import jQuery
 */
window.$ = require('jquery');

/*
 * Import Bootstrap
 */
import 'bootstrap';
import './scss/app.scss';

/*
 * Import Translations
 */
require('./translation.js');

/*
 * Import Select2
 */ 
import 'select2';

/*
 * Import LibPhoneNumber-js
 */
import { findPhoneNumbersInText } from 'libphonenumber-js'

/* 
 * Import our main js file
 */
require('./main.js'); 