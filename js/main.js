Parse.initialize("avOitl6OoNQJr7WwKgO4XfHEWIu2smvZpFXnzBFK", "v8sP1VqGr8hov9bqhD5tfA7UHPWH862gfciUy0jc");

$(document).ready(function() {

    $(".home__signup--submit-button").click(function(e) {

        e.preventDefault();
        $('.home__signup--error').hide();

        var email = $('#home__signup--email').val();
        var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;

        if ( ! email || ! re.test(email) ) {

          $('.home__signup--error').show();

        } else {
          var Signup = Parse.Object.extend('Signup');
          var signup = new Signup();
          signup.set('email', email);
          signup.save(null, {
            success: function(signup) {
              $('.home__signup--form').hide();
              $('.home__signup--success').show();
            },
            error: function(signup, error) {
              console.error('Error saving Email');
            }
          })
        }
    });
});
