"use strict"

window.APP = window.APP || {};

window.$ = window.jQuery = require('jquery');

window.jQueryBridget = require('jquery-bridget');

window.Masonry = require('masonry-layout');

jQueryBridget( 'masonry', Masonry, $ );

window.crossroads = require('crossroads');

window.hasher = require('hasher');

require('jquery-lazyload');

require('./jquery-flip.js');

window.bootstrap = require('bootstrap');

window.Backbone = require('backbone');
window._ = require('underscore');
