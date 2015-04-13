var React       = require('react');
var HomepageMap = require('./HomepageMap');
var SearchTool  = require('./SearchTool');
var ListingView = require('./ListingView');
var Actions     = require('../actions/actions');
var VenueStore  = require('../stores/VenueStore');
var Reflux      = require('reflux');

// Load Css
require('../../scss/style.scss');

var App = React.createClass({
  mixins: [
    Reflux.listenTo(VenueStore, 'onVenueStoreUpdate')
  ],

  getInitialState: function() {
    return {
      venues: []
    };
  },

  onVenueStoreUpdate: function(data) {
    this.setState({
      venues: data.venues
    });
  },

  render: function() {
    return (
      <div className="homepage">
        <SearchTool />
        <HomepageMap />
        <ListingView venues={this.state.venues} />
      </div>
    );
  }
});

module.exports = App;
