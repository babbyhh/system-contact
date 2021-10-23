window._ = require('lodash');

window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';


window.$ = window.jQuery = require('jquery');
var waves = require('node-waves');
require('bootstrap');
require('jquery-mask-plugin');

window.toastr = require('toastr');

window.mensg = require('./toastr-config');