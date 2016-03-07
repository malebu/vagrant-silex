<?php $view->extend('layout.html.php') ?>

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading"><b>Übersicht</b></div>
                <ul class="list-group">
                    <?php foreach ($posts as $entry) : ?>
                    <li class="list-group-item">
                        <b><?= $entry['title']; ?></b> <?= $entry['created_at']; ?>
                        <br><?= substr($entry['text'], 0, 70); ?>
                        <a href="/blog/<?= $entry['id'] ?>">[...]</a>
                        <?php endforeach; ?>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>


