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
                <div class="panel-heading"><b>Neuster Blogbeitrag</b></div>
                <ul class="list-group">
                    <li class="list-group-item">
                        <b><?= htmlentities($latestpost['title']); ?></b> erstellt am <?= $latestpost['created_at']; ?>
                        von <?= $latestpost['author']; ?>
                        <br><?= htmlentities(substr($latestpost['text'], 0, 300)); ?>
                        <a href="/blog/<?= $latestpost['id'] ?>">[...]</a>
                        <?php endif; ?>
            </div>
        </div>

        <div class="col-md-4">
            <div class="panel panel-default panel-body">
                Hose Wurst und Eier jeder hat Maramlade test test test bis zum zielen umbruch lalala schalal
            </div>
        </div>
    </div>

</div>



