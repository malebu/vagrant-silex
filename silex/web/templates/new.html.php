<?php $view->extend('layout.html.php') ?>

<div class="container">
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading"><b>Neuer Beitrag</b></div>
                        <div class="panel-body">
                            <div> <?php if ($allFieldsCorrect == false) : ?>
                                    <div class="alert alert-danger" role="alert">Bitte das gesamte Formular ausfüllen
                                    </div>
                                <?php endif; ?>
                            </div>
                            <form action="/new" method="post">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Titel</label>
                                    <input type="text" id="title" class="form-control" name="title"
                                           placeholder="Gebe hier einen Titel an" value="<?php echo $title; ?>"/>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Blogbeitrag</label>
                                    <textarea class="form-control" id="text" rows="6" name="content"
                                              placeholder=
                                              "Gebe hier ein was du bloggen möchtest"><?php echo $content; ?></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Absenden</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
