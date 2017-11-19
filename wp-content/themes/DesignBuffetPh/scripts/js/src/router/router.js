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

        events: {
          "mouseenter div.item": "showItemDetails",
          "mouseleave div.item": "hideItemDetails",
        },

        initialize: function () {

        },

        showItemDetails: function ( evt ) {

          var $parent = $(evt.target).closest('.item');

          $parent.find('img').slideUp(200);
        },

        hideItemDetails: function ( evt ) {

          var $parent = $(evt.target).closest('.item');

          $parent.find('img').slideDown(200);
        }
      });

      new homepage();
    });

    crossroads.addRoute('services/:any*:', function () {

      var services = Backbone.View.extend({

        el: "#services",

        initialize: function () {
        },

        dropdown: function ( evt ) {

          var $elem = $(evt.target);
          var $parent = $elem.closest('li'),
              $subCategory = $parent.find('ul'),
              timer = null;

          timer = setTimeout(function () {

            $parent.one('mouseleave', function () {

              $subCategory.css('display', 'none');
              clearTimeout(timer);
            });
          }, 200);

          if ( $subCategory.is(':hidden') ) {
            $subCategory.css('display', 'block');
          }

          return true;
        },

        events: {
          "mouseenter div.textwidget > ul > li": "dropdown",
          "mouseleave div.textwidget > ul > li": "dropdownClose",
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