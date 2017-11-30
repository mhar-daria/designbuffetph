module.exports = Backbone.View.extend({

  el: $('body'),

  isLoading: false, // will determine if have a current ajax request

  // to temporarily disbled query functions
  // to prevent continous fetch of data when no records found
  // this will be set to true if no records found
  isLocked: false,

  default : {

    template: null,
    page: 1,
    offset: 20,
  },

  url: null,

  collection: require('../../model/common/pages.m.js'),

  initialize: function initialize() {},

  requests: {},

  pageContainer: '#content',

  paginate: function paginate() {

    var _me = this;

    _me.collection = new _me.collection();
    _me.collection.url = APP.utils.rest();

    $(window).scroll(function (e) {

      if (_me.$el.length < 1) {
        return false;
      }

      var defaultPageContainer = _me.$el
                                    .find(_me.pageContainer )
                                    .height();

      var div = _me.$el.offset().top,
          divHeight = _me.$el.height() + div - defaultPageContainer * 2,
          documentHeight = $(window).scrollTop() + $(window).height();

      // check if scroll is near the bottom of the page
      if (divHeight < documentHeight) {

        // check if have a current ajax request
        if (!_me.isLoading && !_me.isLocked) {

          // set is loading to true
          _me.isLoading = true;
          // set is locked to true also
          _me.isLocked = true;
console.log(_me.default);
return
          // add to requests
          var request = _me.default.concat(_me.requests);

          _me.collection.fetch({
            data: request
          }).then(function (resp) {

console.log(_me.collection.toJSON());

            // var deals = _me.collection.toJSON();

            // if (resp && resp.records && _.size(resp.records) > 0) {
            //   _me.page++;

            //   _.each(resp.records, function (deal, key) {
            //     _me.$el.find(_me.collectionBox).append(_me.template(deal));
            //   });
            // } else {

            //   _me.isLocked = true;
            //   _me.timeout = setTimeout(function () {
            //     _me.isLocked = false;

            //     clearTimeout(_me.timeout);
            //   }, 30000);
            // }

            // _me.isLoading = false;

            // $('img.images-lazy').lazyload({
            //   threshold: 200
            // }).removeClass('images-lazy').filter(':in-viewport').trigger('appear');
          });
        }
      }
    });
  }
});