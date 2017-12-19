if ( ! window.APP ) {

  window.APP = {};
}

var Utils = function () {

  return {

    rest: function ( url ) {

      return window.APP.ajaxUrl;
    }
  };
};

window.APP.utils = new Utils;