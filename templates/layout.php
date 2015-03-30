<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>
        <?php $title=( isset($global[ 'title'])) ? $global[ 'title'] : $global[ 'site.title']; echo $title . ' | '. $global[ 'site.name']; ?>
    </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <!-- Place favicon.ico in the root directory -->
    <link rel="stylesheet" href="/css/style.css">
    <link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
</head>

<body class="home fixed-header" style="padding-top: 75px;">
    <div id="page" class="hfeed site">

        <?php include 'partials/header.php'; ?>

        <?php echo $content; ?>

        <?php include 'partials/footer.php'; ?>

    </div>

</body>

</html>
