var $       = require('jquery');
var React   = require('react');
var Actions = require('../actions/actions');

var SearchTool = React.createClass({
  getInitialState: function() {
    return {
      keyword: ''
    };
  },

  componentDidMount: function() {
    this.$keywordInput = $('.search-tool__keyword');
  },

  handleSubmit: function(e) {
    e.preventDefault();
    this.setState({
      keyword: this.$keywordInput.val()
    });
    Actions.searchVenues({
      keyword: this.$keywordInput.val()
    })
  },

  render: function() {
    return (
      <form className="search-tool" onSubmit={this.handleSubmit}>
        <input className="search-tool__keyword" placeholder="Keyword"/>
        <button className="button">Filter</button>
      </form>
    );
  }
});

module.exports = SearchTool;
