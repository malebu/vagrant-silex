<?php $view->extend('layout.html.php') ?>

<div class="container">
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-3 col-md-6">
                    <div class="panel panel-success">
                        <div class="panel-heading"><b>Du hast dich erfolgreich ausgeloggt</b></div>
                    </div>
                    <?php if ($cookieset != FALSE) : ?>
                        <form action="/logout" method="post">
                            <a class="btn btn-danger" href="/logout" role="button">Ausloggen</a>
                        </form>
                    <?php else : ?>
                    <form action=/home" method="post">
                        <a class="btn btn-success" href="/home" role="button">Zur Startseite</a> <?php endif ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>