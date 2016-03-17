<?php $view->extend('layout.html.php') ?>

<div class="container">
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-3 col-md-6">
                    <div class="panel panel-warning">
                        <div class="panel-heading"><b>Um einen Beitrag zu schreiben musst du dich anmelden!</b></div>
                    </div>
                    <form action="/logoff" method="post">
                        <a class="btn btn-danger" href="/login" role="button"><span><span
                                    class="glyphicon glyphicon-user" aria-hidden="true"></span></span> Login</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>