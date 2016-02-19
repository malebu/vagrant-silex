<?php
use Symfony\Component\HttpFoundation\Request;

/**
 * @var $app silex\Application
 * @var $db_connection Doctrine\DBAL\Connection
 * @var $template Symfony\Component\Form\Extension\Templating\DelegatingEngine
 */

$dbConnection = $app['db'];
$template = $app['templating'];

$app->get('/welcome/{name}', function ($name) use ($template) {
    return $template->render(
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

$app->get('/home', function () use ($template) {
    return $template->render(
        'home.html.php',
        array('active' => 'home')
    );
});


$app->get('/blog', function () use ($template, $dbConnection) {
    $posts = $dbConnection->fetchAll('SELECT * FROM blog_post ');
    return $template->render(
        'blog.html.php',
        array(
            'active' => 'blog',
            'posts' => $posts)

    );
});

$app->get('/blog/{id}', function ($id) use ($template, $dbConnection) {
    $post = $dbConnection->fetchAssoc("SELECT * FROM blog_post WHERE id=?", array($id));
    return $template->render(
        'showentry.html.php',
        array(
            'active' => 'blog',
            'post' => $post)
    );
});

$app->get('/test', function () use ($template) {
    return $template->render(
        'test.html.php',
        array('active' => 'test')
    );
});

$app->match('/new', function (Request $request) use ($app, $template, $dbConnection) {
    if (!$request->isMethod('POST') && !$request->isMethod('GET')) {
        $app->abort(405);
    }
    $allFieldsCorrect = true;
    if ($request->isMethod('POST')) {
        if ($request->get("title") == NULL || $request->get("content") == NULL) {
            $allFieldsCorrect = false;
        }
    }

    $return_site = 'new.html.php';

    if ($allFieldsCorrect == true && $request->isMethod('POST')) {
        $return_site = 'sucessenterd.html.php';
        $dbConnection->insert(
            'blog_post',
            array(
                'title' => $request->get('title'),
                'text' => $request->get('content'),
                'created_at' => date('c')
            )
        );

    }

    return $template->render(
        $return_site,
        array('active' => 'new',
            'allFieldsCorrect' => $allFieldsCorrect,
            'title' => $request->get('title'),
            'content' => $request->get('content'))
    );
});








