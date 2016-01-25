<?php
use Symfony\Component\HttpFoundation\Request;

/**
 * <@var $app silex\Application
 */

$app->get('/welcome/{name}', function ($name) use ($app) {
    return $app['templating']->render(
        'hello.html.php',
        array('name' => $name)
    );
});

$app->get('/welcome-twig/{name}', function ($name) use ($app) {
    return $app['twig']->render(
        'hello.html.twig',
        array('name' => $name)
    );
});

$app->get('/home', function () use ($app) {
    return $app['templating']->render(
        'home.html.php',
        array('active'=>'home')
    );
});


$app->get('/blog', function () use ($app) {
    return $app['templating']->render(
        'blog.html.php',
        array('active'=>'blog')
    );
});

$app->get('/new', function () use ($app) {
    return $app['templating']->render(
        'new.html.php',
        array('active'=>'new')
    );
});

$app->get('/test', function () use ($app) {
    return $app['templating']->render(
        'test.html.php',
        array('active'=>'test')
    );
});