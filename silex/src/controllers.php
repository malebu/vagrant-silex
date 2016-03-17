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


//--------------------------------//
// homepage resp. standard route  //
//--------------------------------//

$app->get('/home', function () use ($app, $template, $dbConnection) {
    //--get username to show click spot in navbar (in every template)--//
    $name = $app['session']->get('username');
    //--check if someone is already logged in (in every template)--//
    $cookieset = true;
    if ($name['username'] != TRUE) {
        $cookieset = false;
    }
    //--get latest blog entry out of db--//
    $latestpost = $dbConnection->fetchAssoc('SELECT * FROM blog_post id WHERE id =(SELECT max(id) FROM blog_post);');

        return $template->render(
        'home.html.php',
        array(
            'active' => 'home', //-- marks the current template as active in the navbar (in every template)--//
            'navbaruser' => $name['username'],
            'cookieset' => $cookieset,
            'latestpost' => $latestpost)
    );
});

//--------------//
//login route   //
//--------------//

$app->match('/login', function (Request $request) use ($app, $template) {
    $name = $app['session']->get('username');
    $cookieset = true;
    if ($name['username'] != TRUE) {
        $cookieset = false;
    }
    if (!$request->isMethod('POST') && !$request->isMethod('GET')) {
        $app->abort(405);
    }

    $username = $request->get('username');

    //-- check if all entries are correct--//
    $logincorrect = true;
    if ($request->isMethod('POST')) {
        if ($request->get('username') == NULL) {
            $logincorrect = false;
        }
    }

    $return_site = 'login.html.php';

    //--if login is correct a session with the username will be created--//
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

//--------------------------------------------------------------//
// user profil with entries that the current user has created   //
//--------------------------------------------------------------//

$app->get('/user', function () use ($template, $app, $dbConnection) {
    $name = $app['session']->get('username');
    $cookieset = true;
    if ($name['username'] != TRUE) {
        $cookieset = false;
    }
    //--show all entries in db that where created by the current user logged in user--//
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

//------------------------------------------------//
// blog route - all entries are showed in a list  //
//------------------------------------------------//

$app->get('/blog', function () use ($app, $template, $dbConnection) {
    $name = $app['session']->get('username');
    $cookieset = true;
    if ($name['username'] != TRUE) {
        $cookieset = false;
    }
    //-- get all blog entries out of the db --//
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

//----------------------------------------------//
// show one entire blog entry identified by id  //
//----------------------------------------------//

$app->get('/blog/{id}', function ($id) use ($app, $template, $dbConnection) {
    $name = $app['session']->get('username');
    $cookieset = true;
    if ($name['username'] != TRUE) {
        $cookieset = false;
    }
    //--get one entry out of the db by calling the id--//
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

//-------------------------//
//create a new blog entry  //
//-------------------------//

$app->match('/new', function (Request $request) use ($app, $template, $dbConnection) {
    $name = $app['session']->get('username');
    $cookieset = true;
    if ($name['username'] != TRUE) {
        $cookieset = false;
    }

    if (!$request->isMethod('POST') && !$request->isMethod('GET')) {
        $app->abort(405);

    }
    //-- if no user is logged in return the login request template--//
    if ($cookieset == FALSE && $request->isMethod('GET')) {
        return $template->render(
            'requestlogin.html.php',
            array(
                'active' => 'new',
                'navbaruser' => $name['username'],
                'cookieset' => $cookieset)
        );

    }

    //--check if all fields are entered correct, if not return a warning in template--//
    $allFieldsCorrect = true;
    if ($request->isMethod('POST')) {
        if ($request->get("title") == NULL || $request->get("content") == NULL) {
            $allFieldsCorrect = false;
        }
    }

    $return_site = 'new.html.php';

    //--if all fields correct write the entries in the db--//
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

//-------------------------------------------//
// logout function with logout success site  //
//-------------------------------------------//

$app->get('/logout', function () use ($template, $app) {
    $name = $app['session']->get('username');
    $cookieset = true;
    if ($name['username'] != TRUE) {
        $cookieset = false;
    }
    //--end session and logout--//
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