"use strict"

var APP = window.APP || {};

// routing
var router = require('./router/router');


(function() {

  // lazyload images
  $('img.images-lazy').lazyload({
    threshold: 200,
  })
  .removeClass('images-lazy')
  .filter(':in-viewport').trigger('appear');

  // router
  new router;
}());

// #main.js