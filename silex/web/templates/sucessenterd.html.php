<?php $view->extend('layout.html.php') ?>

<div class="container">
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="alert alert-success" role="alert">Alle deinen Eingaben sind korrekt und wurden
                        erfolgreich übermittelt!
                    </div>
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <b>Titel: </b><?= ($title) ?></div>
                        <div class="panel-body">
                            <b>Text: </b><?= nl2br($content) ?></div>
                    </div>
                    <a class="btn btn-info" href="/blog" role="button"><span
                            class="glyphicon glyphicon-book" aria-hidden="true"></span> Beiträge anzeigen</a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
