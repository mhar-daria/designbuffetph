module.exports = Backbone.Model.extend({

  url: function () {
    return APP.utils.rest();
  }
});