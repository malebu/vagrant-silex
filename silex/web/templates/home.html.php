<?php $view->extend('layout.html.php') ?>

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="jumbotron">

                <h1><strong>Web-Engineering Projekt</strong></h1>
                <p>Ein kleiner Blog mit Loginfunktion</p>
                <p><a class="btn btn-warning btn-lg" href="/blog" role="button">
                        <span class="glyphicon glyphicon-book" aria-hidden="true"></span> Blogbeiträge
                    </a></p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">

                <?php if ($latestpost == NULL) : ?>
                    <div class="panel-heading"><b>Es wurden noch keine Beiträge erstellt</b></div>
                <?php else : ?>
                <div class="panel-heading"><h4>Neuster Blogbeitrag <span class="label label-default">New</span></h4>
                </div>
                <ul class="list-group">
                    <li class="list-group-item">
                        <b><?= ($latestpost['title']); ?></b> erstellt am <?= $latestpost['created_at']; ?>
                        von <?= $latestpost['author']; ?>
                    <li class="list-group-item">
                        <?= nl2br(substr($latestpost['text'], 0, 200)); ?>
                        <a href="/blog/<?= $latestpost['id'] ?>">[...]</a>
                        <?php endif; ?></li>
                </ul>
            </div>
        </div>

        <div class="col-md-4">
            <a class="btn-block btn-success btn-lg pull-right text-center" href="/new" role="button">
                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Beitrag schreiben</a><br>
            <div class="panel panel-default">
                <div class="panel-body text-center"><h1><span
                            class="label label-default"> <?php $latestpost == NULL ? printf('0') : $latestpost['id'] ?></span>
                    </h1>
                    <h2>vorhandene
                        Beiträge</h2></div>
            </div>
        </div>
    </div>

</div>



