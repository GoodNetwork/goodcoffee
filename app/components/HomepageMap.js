var React  = require('react');

var Actions     = require('../actions/actions');
var VenueStore  = require('../stores/VenueStore');

var HomepageMap = React.createClass({

    getInitialState: function() {
      return {
        map: null,
        markers: []
      };
    },

    getDefaultProps: function () {
        return {
            initialZoom: 13,
            mapCenterLat: 40.7504877,
            mapCenterLng: -73.9839238,
        };
    },

    componentDidMount: function (rootNode) {
      var props = this.props;
      var mapOptions = {
          center: this.googleLatLng(props.mapCenterLat, props.mapCenterLng),
          zoom: props.initialZoom,
          mapTypeId: google.maps.MapTypeId.ROADMAP
      },
      map = new google.maps.Map(this.getDOMNode(), mapOptions);
      this.setState({map:map});

      Actions.mapMounted();
    },

    componentWillReceiveProps: function(props) {
      var _this = this;
      this.googleClearMarkers();
      props.venues.forEach(function(venue){
        _this.googleAddMarker(venue.lat, venue.lng);
      });
    },

    googleLatLng: function (lat, lng) {
        return new google.maps.LatLng(lat, lng);
    },

    googleAddMarker: function(lat, lng, map) {
      var marker;
      var markers = this.state.markers;

      if (!map) {
        map = this.state.map;
      }

      marker = new google.maps.Marker({
        position: this.googleLatLng(lat, lng),
        map: map
      })

      markers.push(marker);
      this.setState({
        markers: markers
      })
    },

    googleClearMarkers: function() {
      for (var i = 0; i < this.state.markers.length; i++) {
        this.state.markers[i].setMap(null);
      }
      this.setState({
        markers: []
      })
    },

    render: function () {
      return (
        <div className="map"></div>
      );
    }
});

module.exports = HomepageMap;
