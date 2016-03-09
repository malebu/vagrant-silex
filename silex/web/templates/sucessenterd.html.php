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
                            <b><?php echo $title; ?></b></div>
                        <div class="panel-body">
                        <?php echo $content; ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
