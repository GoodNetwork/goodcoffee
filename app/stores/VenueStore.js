var Reflux  = require('reflux');
var Parse   = require('parse').Parse;
var Actions = require('../actions/actions');

var VenueStore = Reflux.createStore({

    listenables: [Actions],

    init: function() {
        this.venues = [];
    },

    onMapMounted: function() {
        Venue.getInitial(this.setVenues);
    },

    onSearchVenues: function(options) {
      Venue.searchVenues(options, this.setVenues);
    },

    setVenues: function(venues) {
        this.venues = venues;
        this.trigger({
            venues: this.venues
        });
    }
});

var Venue = Parse.Object.extend('Venue', {}, {

    getInitial: function(cb) {
        var query = new Parse.Query(Venue);
        query.descending('createdAt').limit(100);
        query.find({
            success: function(result) {
                cb(result);
            },
            error: function(result, error) {
                console.error('getInitial error', result, error);
            }
        })
    },

    searchVenues: function(options, cb) {
      var query = new Parse.Query(Venue);
      query.descending('createdAt');

      if (options.keyword) {
        query.matches('name_lowercase', '.*'+options.keyword+'.*');
      }

      query.find({
          success: function(result) {
            cb(result);
          },
          error: function(result, error) {
              console.error('getInitial error', result, error);
          }
      })
    }

});

module.exports = VenueStore;
