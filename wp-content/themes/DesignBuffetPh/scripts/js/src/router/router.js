// this will handle all the routing for dynamic loading of modules

module.exports = function() {

    // route for homepage
    // crossroads.addRoute('recipe/create', function () {
    //   // var g = require('./../view/recipe/create.v.js');
    //   new g();
    // });

    crossroads.addRoute('/', function () {

      var homepage = Backbone.View.extend({

        el: ".grid",

        initialize: function () {
          this.$el.find('.grid-item .item').flip();
          this.$el.find('.grid-item .item .front img').lazyload({
            threshold: 300
          });
        },
      });

      new homepage();
    });

    crossroads.addRoute('services/:any*:', function () {

      var services = Backbone.View.extend({

        el: "#services",

        pagination: require('./../view/common/pagination.v.js'),

        initialize: function () {

          var ajaxUrl = APP.ajaxUrl;

          _.extend(this.pagination.prototype, {

            el: '#services',

            // template: _.template(this.tpl),

            page: 2,

            limit: 20,

            url: 'category',

            collectionBox: '.home-deal-group',

            requests: {
              page_title  : 'digital marketing',
              page        : '1',
              offset      : 2,
              action      : 'pyro_pagination',
            },

            initialize: function() {
              // console.log(options.section)
              console.log('hery')
              this.paginate();
            }
          });

          new this.pagination;
        },

        dropdown: function ( evt ) {

          evt.preventDefault();

          var $elem = $(evt.target);
          var $parent = $elem.closest('li'),
              $subCategory = $parent.find('ul'),
              timer = null;

          if ( $elem.text() == '+' ) {

            $elem.text('-');
            $subCategory.css('display', 'block');
          } else {

            $elem.text('+');
            $subCategory.css('display', 'none');
          }

          return true;
        },

        events: {
          "click div.classic-text-widget span.dropdown": "dropdown",
          "click div.classic-text-widget span.dropdown": "dropdown",
        },
      });

      new services;
    });

    // var recipePerCategory = crossroads.addRoute('{category_name}/edit/{recipe_name}',
    //   function ( category_name, recipe_name ) {

    //     // var a = require('./../view/recipe/edit.v.js');
    //     new a();
    //   });

    // recipePerCategory.rules = {

    //   category_name: ['appetizer', 'main-dish', 'desserts', 'soup'],
    // };

    // // this will log every change of url
    crossroads.parse(window.location.pathname);

 };

// #router.js
