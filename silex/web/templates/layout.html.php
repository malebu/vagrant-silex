<?php
/**
 * @var $slots \Symfony\Component\Templating\Helper\SlotsHelper
 */

$slots = $view['slots'];
?>

<!doctype html>

<html lang="de">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
    <title> <?php $slots->output('title', "Marius Blog") ?></title>
    <link rel="stylesheet" href="../vendor/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vendor/bootstrap/dist/css/bootstrap-theme.min.css">
    <script type="text/javascript" src="../vendor/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="../vendor/bootstrap/dist/js/bootstrap.min.js"></script>
</head>

<body>

<nav class="navbar navbar-inverse">
    <a class="navbar-brand" href="/home">Marius Blog</a>
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li <?= $active == 'home' ? 'class="active"' : '' ?>><a href="/home"><span
                            class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a></li>
                <li <?= $active == 'blog' ? 'class="active"' : '' ?>><a href="/blog"><span
                            class="glyphicon glyphicon-book" aria-hidden="true"></span> Blog</a></li>
                <li <?= $active == 'new' ? 'class="active"' : '' ?>><a href="/new"><span
                            class="glyphicon glyphicon-pencil" aria-hidden="true"></span> New Post</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li <?= $active == 'login' ? 'class="active"' : '' ?>><a href="/login"><span
                            class="glyphicon glyphicon-lock" aria-hidden="true"></span> Login</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<?php $view['slots']->output('_content') ?>
</body>
</html>