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
    <link rel="stylesheet" href="../favicon-and-css/sticky-footer.css">
    <script type="text/javascript" src="../vendor/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="../vendor/bootstrap/dist/js/bootstrap.min.js"></script>
    <link rel="icon"
          type="image/png"
          href="../favicon-and-css/Favicon_Marius_Blog.png">
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
                <li <?= $active == 'account' ? 'class="active"' : '' ?>><a
                        href="/user"><?= ($navbaruser != 0) ? ('') : ($navbaruser) ?></a></li>
                <?php if ($cookieset == false) { ?>
                <li <?= $active == 'login' ? 'class="active"' : '' ?>><a href="/login"><span
                                class="glyphicon glyphicon-log-in" aria-hidden="true"></span> Login</a>
                    </li><?php } else { ?>
                    <li <?= $active == 'logout' ? 'class="active"' : '' ?>><a href="/logout"><span
                                class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Logout</a>
                    </li> <?php } ?>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<?php $view['slots']->output('_content') ?>

<footer class="footer">
    <div class="container">
        <p class="text-muted">© Marius Buck 2015 - <a href="https://goo.gl/maps/37Wqj5khQ3J2" target="_blank">DHBW
                Stuttgart</a></p>
    </div>
</footer>

</body>
</html>