<?php $view->extend('layout.html.php') ?>

<div class="container">
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-3 col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading"><b>Angemeldeter User</b></div>
                        <div class="panel-body"><b><?= $username; ?></b>
                        </div>
                    </div>
                    <form action="/logout" method="post">
                        <a class="btn btn-danger" href="/logout" role="button">Ausloggen</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
