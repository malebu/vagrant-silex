<?php $view->extend('layout.html.php') ?>

<div class="container">
    <div class="row">
        <div class="col-md-offset-3 col-md-6">
            <form action="/login" method="post">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>Login</b></div>
                    <div class="panel-body">
                        <div> <?php if ($logincorrect == false) : ?>
                                <div class="alert alert-danger" role="alert">Bitte geben sie ihren Benutzername ein!
                                </div>
                            <?php endif; ?>
                            <label for="username">Benutzername</label>
                            <input type="text" id="username" class="form-control" name="username"
                                   placeholder="Benutzername" value="<?php echo $username; ?>"/>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Anmelden</button>
            </form>
        </div>
    </div>
</div>
