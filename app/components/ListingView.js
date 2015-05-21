var React = require('react');

var ListingView = React.createClass({
  render: function() {
    var createItem = function(venue) {
      return <div className="listing-view__block" key={venue.key}>{venue.name}</div>;
    };
    return (
      <div className="listing-view__blockisting-view">{this.props.venues.map(createItem)}</div>
    );
  }
});

module.exports = ListingView;

<div> test </div>