module.exports = Backbone.Collection.extend({

  model: require('../model/common/pages.m.js'),

  url: function () {
    return APP.ajaxUrl;
  }
});