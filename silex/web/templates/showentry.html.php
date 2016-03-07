<?php $view->extend('layout.html.php') ?>

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading"><b><?php echo $post['title']; ?></b> erstellt
                    am: <?php echo $post['created_at']; ?></div>
                <ul class="list-group">
                    <li class="list-group-item">
                        <?php echo nl2br($post['text']); ?>
                    </li>
                </ul>
            </div>
            <a class="btn btn-info" href="/blog" role="button">alle Beiträge</a>
        </div>
    </div>
</div>