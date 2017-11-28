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
          "click div.textwidget span.dropdown": "dropdown",
          "click div.textwidget span.dropdown": "dropdown",
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