<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>GoodCoffee NYC</title>
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <script type="text/javascript" src="http://www.parsecdn.com/js/parse-1.3.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript">
    Parse.initialize("avOitl6OoNQJr7WwKgO4XfHEWIu2smvZpFXnzBFK", "v8sP1VqGr8hov9bqhD5tfA7UHPWH862gfciUy0jc");

    $(document).ready(function() {

        $(".home__signup--submit-button").click(function(e) {

            e.preventDefault();
            $('.home__signup--error').hide();

            var email = $('#home__signup--email').val();
            var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;

            if (!email || !re.test(email)) {

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
    </script>
    <div class="home__container">
        <div class="container col-md-8 col-md-offset-2 home__modal">
            <div class="modal__row col-md-8 col-md-offset-2">
                <img class="home__logo" src="img/goodcoffee-brown.png" alt="GoodCoffee Logo" />
                <h1>Be the connoisseur</h1>
                <p>Still in search of the perfect bean?</p>
                <p>If you’re looking for the best way to find good coffee in New York City you’re at the right place. Users will have access to all the filter choices that matter in the coffee world, reviews done only by “locals” getting you with the in crowd (NYC style), and only the finest selection of locations in our directory. </p>
                <form class="form-inline home__signup--form">
                    <div class="form-group">
                        <input type="email" class="form-control" id="home__signup--email" placeholder="Enter your email">
                    </div>
                    <button class="btn btn-default home__signup--submit-button">Sign up</button>
                    <p style="font-style: italic;">Save your favorite spots in your account across other Good City Network sites (goodbrunch.nyc, goodhappyhour.nyc, goodrestuarants.nyc) and arm yourself to be the master of your city. </p>
                </form>
                <div class="alert alert-danger home__signup--error" role="alert">Please enter a valid email</div>
                <div class="alert alert-success home__signup--success" role="alert">Thank you for signing up!</div>
            </div>
        </div>
        <div class="home__overlay"></div>
        <video class="home__video--full" autoplay="" loop="" muted="muted" poster="//thumbs.gfycat.com/SimplisticPositiveDuckling-poster.jpg">
            <source id="webmsource" src="//zippy.gfycat.com/SimplisticPositiveDuckling.webm" type="video/webm">
                <source id="mp4source" src="//fat.gfycat.com/SimplisticPositiveDuckling.mp4" type="video/mp4">
        </video>
    </div>
</body>

</html>
