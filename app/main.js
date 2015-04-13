// Libraries
var Parse  = require('parse').Parse;
var React  = require('react');
var $      = require('jquery');

// App Modules
var App    = require('./components/App');

// Initialize Parse
Parse.initialize("avOitl6OoNQJr7WwKgO4XfHEWIu2smvZpFXnzBFK", "v8sP1VqGr8hov9bqhD5tfA7UHPWH862gfciUy0jc");

// Start App
React.render(<App />, $('body')[0]);
