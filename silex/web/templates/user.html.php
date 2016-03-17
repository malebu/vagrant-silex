<?php $view->extend('layout.html.php') ?>

<div class="container">
    <div class="row">
        <div class="col-md-offset-3 col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Angemeldeter User: <b><?= $username; ?></b></div>
                <div class="panel-body">
                    <form action="/logout" method="post">
                        <a class="btn btn-block btn-danger pull-right" href="/logout" role="button"><span
                                class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Ausloggen</a>
                    </form>
                </div>
            </div>
            <br>
            <div>
                <div class="panel panel-default">
                    <?php if ($posts == NULL) : ?>
                        <div class="panel-heading"><b>Du hast noch keine Beiträge erstellt</b></div>
                    <?php else : ?>
                        <div class="panel-heading"><b>Von dir erstelle Beiträge:</b></div>
                        <ul class="list-group">
                            <?php foreach ($posts as $entry) : ?>
                                <li class="list-group-item">
                                    <b><?= htmlentities($entry['title']); ?></b> erstellt
                                    am <?= $entry['created_at']; ?>
                                    <br><?= htmlentities(substr($entry['text'], 0, 70)); ?>
                                    <a href="/blog/<?= $entry['id'] ?>">[...]</a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>



