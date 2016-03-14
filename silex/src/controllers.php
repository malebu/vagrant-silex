<?php
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

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

//homepage, starting page
$app->get('/home', function () use ($app, $template, $dbConnection) {
    $name = $app['session']->get('username');
    $cookieset = true;
    if ($name['username'] != TRUE) {
        $cookieset = false;
    }
    $latestpost = $dbConnection->fetchAssoc('SELECT * FROM blog_post HAVING max(id)');
    return $template->render(
        'home.html.php',
        array('active' => 'home',
            'navbaruser' => $name['username'],
            'cookieset' => $cookieset,
            'latestpost' => $latestpost)
    );
});

//Login
$app->match('/login', function (Request $request) use ($app, $template) {
    $name = $app['session']->get('username');
    //check if someone is already logged in
    $cookieset = true;
    if ($name['username'] != TRUE) {
        $cookieset = false;
    }
    if (!$request->isMethod('POST') && !$request->isMethod('GET')) {
        $app->abort(405);
    }

    $username = $request->get('username');

    $logincorrect = true;
    if ($request->isMethod('POST')) {
        if ($request->get('username') == NULL) {
            $logincorrect = false;
        }
    }

    $return_site = 'login.html.php';

    if ($logincorrect == true && $request->isMethod('POST')) {
        array(
            'username' => $request->get('username'));
        $app['session']->set('username', array('username' => $username));
        $return_site = 'loginsuccess.html.php';
    }

    return $template->render(
        $return_site,
        array(
            'logincorrect' => $logincorrect,
            'cookieset' => $cookieset,
            'active' => 'login',
            'username' => $request->get('username'),
            'navbaruser' => $name['username'])
    );

});

//user site, where you can see who is logged in and his entries
$app->get('/user', function () use ($template, $app, $dbConnection) {
    $name = $app['session']->get('username');
    $cookieset = true;
    if ($name['username'] != TRUE) {
        $cookieset = false;
    }
    $author = $name['username'];
    $posts = $dbConnection->fetchAll('SELECT * FROM blog_post WHERE author=? ORDER BY id DESC;', array($author));
    return $template->render(
        'user.html.php',
        array('active' => 'account',
            'cookieset' => $cookieset,
            'username' => $name['username'],
            'navbaruser' => $name['username'],
            'posts' => $posts)
    );

});

//show all blog entries in a list
$app->get('/blog', function () use ($app, $template, $dbConnection) {
    $name = $app['session']->get('username');
    $cookieset = true;
    if ($name['username'] != TRUE) {
        $cookieset = false;
    }
    $posts = $dbConnection->fetchAll('SELECT * FROM blog_post ORDER BY id DESC;');
    return $template->render(
        'blog.html.php',
        array(
            'active' => 'blog',
            'cookieset' => $cookieset,
            'posts' => $posts,
            'navbaruser' => $name['username'])

    );
});

//show one blog entry complete
$app->get('/blog/{id}', function ($id) use ($app, $template, $dbConnection) {
    $name = $app['session']->get('username');
    $cookieset = true;
    if ($name['username'] != TRUE) {
        $cookieset = false;
    }
    $post = $dbConnection->fetchAssoc("SELECT * FROM blog_post WHERE id=?", array($id));
    return $template->render(
        'showentry.html.php',
        array(
            'active' => 'blog',
            'cookieset' => $cookieset,
            'post' => $post,
            'navbaruser' => $name['username'])
    );
});

//create a new blog entry
$app->match('/new', function (Request $request) use ($app, $template, $dbConnection) {
    $name = $app['session']->get('username');
    $cookieset = true;
    if ($name['username'] != TRUE) {
        $cookieset = false;
    }
    if (!$request->isMethod('POST') && !$request->isMethod('GET')) {
        $app->abort(405);

    }

    if ($cookieset == FALSE && $request->isMethod('GET')) {
        return $template->render(
            'requestlogin.html.php',
            array(
                'active' => 'new',
                'navbaruser' => $name['username'],
                'cookieset' => $cookieset)
        );

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
                'author' => $name['username'],
                'created_at' => date('c')
            )
        );

    }

    return $template->render(
        $return_site,
        array('active' => 'new',
            'cookieset' => $cookieset,
            'allFieldsCorrect' => $allFieldsCorrect,
            'title' => $request->get('title'),
            $name = $app['session']->get('username'),
            'content' => $request->get('content'),
            'navbaruser' => $name['username'])
    );
});

//logout site with fast logout function
$app->get('/logout', function () use ($template, $app) {
    $name = $app['session']->get('username');
    $cookieset = true;
    if ($name['username'] != TRUE) {
        $cookieset = false;
    }
    $app['session']->set('username', array($name['username'] = NULL));
    $app['session']->invalidate($lifetime = null);
    $cookieset = false;


    return $template->render(
        'logout.html.php',
        array('active' => '',
            'cookieset' => $cookieset,
            'navbaruser' => $name)

    );
});