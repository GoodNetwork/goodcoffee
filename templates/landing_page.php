<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>GoodCoffee NYC</title>

    <link rel="stylesheet" href="css/main.css">
</head>

<body>
	<script type="text/javascript" src="http://www.parsecdn.com/js/parse-1.3.1.min.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/main.js"></script>

    <div class="home__container">

	    <div class="container col-md-8 col-md-offset-2 home__modal">
	        <div class="modal__row col-md-8 col-md-offset-2">
	            <img class="home__logo" src="img/goodcoffee-brown.png" alt="GoodCoffee Logo" />
	            <h1>Be the connoisseur</h1>
	            <p>Still in search of the perfect bean?</p>

	            <form class="form-inline home__signup--form">
	                <div class="form-group">
	                    <input type="email" class="form-control" id="home__signup--email" placeholder="Enter your email">
	                </div>
	                <button class="btn btn-default home__signup--submit-button">Sign up</button>
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
