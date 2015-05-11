var React       = require('react');
var Reflux      = require('reflux');
var _           = require('lodash');
var $           = require('jquery');

var HomepageMap = require('./HomepageMap');
var SearchTool  = require('./SearchTool');
var ListingView = require('./ListingView');
var Actions     = require('../actions/actions');
var VenueStore  = require('../stores/VenueStore');

// Load Css
require('../../scss/style.scss');

var CheckboxWithLabel = React.createClass({
  getInitialState: function() {
    return { isChecked: false };
  },
  onChange: function() {
    this.setState({isChecked: !this.state.isChecked});
  },
  render: function() {
    return (
      <label>
        <input
          type="checkbox"
          checked={this.state.isChecked}
          onChange={this.onChange}
        />
        {this.props.label}
      </label>
    );
  }
});

var App = React.createClass({
  mixins: [
    Reflux.listenTo(VenueStore, 'onVenueStoreUpdate')
  ],

  getInitialState: function() {
    return {
      venues:         []
    };
  },

  onVenueStoreUpdate: function(data) {
    this.setState({
      venues: data.venues
      // neighborhoods: _.uniq(data.venues.map(function(venue){return venue.neighborhood;}))
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
              <li><CheckboxWithLabel label="Williamsburg" /></li>
              <li><CheckboxWithLabel label="East Village" /></li>
              <li><CheckboxWithLabel label="Midtown" /></li>
              <li><CheckboxWithLabel label="Upper Side" /></li>
            </ul>
          </section>
        </div>
        <ListingView venues={this.state.venues} />
      </div>
    );
  }
});

module.exports = App;
