<?php $view->extend('layout.html.php') ?>

<div class="container">
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="alert alert-success" role="alert">Alle deinen Eingaben sind korrekt</div>
                    <div class="panel panel-success">
                        <div class="panel-heading"><b>Titel:</b></div>
                        <div><?php echo $title; ?></div>
                    </div>
                    <div class="panel panel-success">
                        <div class="panel-heading"><b>Beitrag:</b></div>
                        <div> <?php echo $content; ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
