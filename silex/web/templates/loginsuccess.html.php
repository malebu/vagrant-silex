<?php $view->extend('layout.html.php') ?>

<div class="container">
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-3 col-md-6">
                    <div class="alert alert-success" role="alert">Du hast dich erfolgreich
                        eingeloggt!<br>
                        Dein Username lautet: <b><?= $username; ?></b>
                    </div>
                    <a class="btn btn-info" href="/blog" role="button">Beiträge anzeigen</a>
                    <a class="btn btn-warning" href="/new" role="button">Beitrag schreiben</a>
                </div>
            </div>
        </div>
    </div>
</div>
