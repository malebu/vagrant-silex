<?php $view->extend('layout.html.php') ?>

<div class="container">
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-default panel-body" style ='background-color: #BDBDBD;'>
                        <form>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Blogbeitrag</label>
                                <textarea class="form-control" rows="6" placeholder="Gebe hier ein was du bloggen möchtest" ></textarea>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"> Ich möchte das hier wirklich posten </input>
                                </label>
                            </div>
                            <button type="submit" class="btn btn-primary">Absenden</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>