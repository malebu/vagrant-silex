<?php $view->extend('layout.html.php') ?>

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading"><b>Übersicht</b></div>
                <ul class="list-group">
                    <?php foreach ($posts as $entry) : ?>
                    <li class="list-group-item">
                        <b><?= ($entry['title']); ?></b> am <?= $entry['created_at']; ?>
                        von <?= $entry['author']; ?>
                        erstellt
                        <br><?= (substr($entry['text'], 0, 150)); ?>
                        <a href="/blog/<?= $entry['id'] ?>">[...]</a>
                        <?php endforeach; ?>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>


