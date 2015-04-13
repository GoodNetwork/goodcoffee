var React       = require('react');
var HomepageMap = require('./HomepageMap');
var SearchTool  = require('./SearchTool');
var ListingView = require('./ListingView');
var Actions     = require('../actions/actions');
var VenueStore  = require('../stores/VenueStore');
var Reflux      = require('reflux');
var _           = require('lodash');
var $           = require('jquery');

// Load Css
require('../../scss/style.scss');

var App = React.createClass({
  mixins: [
    Reflux.listenTo(VenueStore, 'onVenueStoreUpdate')
  ],

  getInitialState: function() {
    return {
      venues:         [],
      neighborhoods:  [],
      filteredVenues: []
    };
  },

  onVenueStoreUpdate: function(data) {
    this.setState({
      venues: data.venues,
      neighborhoods: _.uniq(data.venues.map(function(venue){return venue.neighborhood;}))
    });
  },

  handleFilterChange: function(e) {
    console.log('asdf');
  },

  render: function() {
    var _this = this;
    return (
      <div className="homepage">
        <SearchTool />
        <HomepageMap venues={this.state.venues} />
        <div className="filter-tool">
          <section>
            <h1>Neighborhoods</h1>
            <ul className="filter-tool__neighborhood">
              <li><label><input type="checkbox" />Williamsburg</label></li>
            </ul>
          </section>
        </div>
        <ListingView venues={this.state.venues} />
      </div>
    );
  }
});

module.exports = App;
