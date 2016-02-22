<?php $view->extend('layout.html.php') ?>

<div class="container">
    <div class="row">
        <div class="col-md-offset-3 col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading"><b>Login</div>
                <div class="panel-body">
                    <div> <?php if ($loginfail == true) : ?>
                            <div class="alert alert-danger" role="alert">Bitte geben sie ihren Benutzername ein!
                            </div>
                        <?php endif; ?>
                        <label for="username">Benutzername</label>
                        <input type="text" id="userame" class="form-control" name="username"
                               placeholder="Benutzername" value="<?php echo $username; ?>"/>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Anmelden</button>
        </div>
    </div>
