<?php 

// Middlewares
$cms->router->before('GET|POST','/', 'App\Middlewares\AuthMiddleware@isLogin');
$cms->router->before('GET|POST','/customer.*', 'App\Middlewares\AuthMiddleware@isLogin');
$cms->router->before('GET|POST','/project.*', 'App\Middlewares\AuthMiddleware@isLogin');


// Home Page
$cms->router->get('/', 'App\Controllers\Home@index');

// Login Page
$cms->router->get('/login', 'App\Controllers\Auth@index');

// Login Post
$cms->router->post('/login', 'App\Controllers\Auth@login');

// Logout Page
$cms->router->get('/logout', 'App\Controllers\Auth@logout');


// Customers
$cms->router->mount('/customer', function() use ($cms) {

    $cms->router->get('/', 'App\Controllers\Customer@index');
    $cms->router->get('/add', 'App\Controllers\Customer@add');
    $cms->router->get('/([0-9]+)', 'App\Controllers\Customer@detail');
    $cms->router->get('/update/([0-9]+)', 'App\Controllers\Customer@update');

    // Bunları API Altına taşımak daha sağlıklı.
    $cms->router->post('/add', 'App\Controllers\Customer@createCustomer');
    $cms->router->post('/update', 'App\Controllers\Customer@updateCustomer');
    $cms->router->post('/note', 'App\Controllers\Customer@updateNote');
    $cms->router->post('/delete', 'App\Controllers\Customer@delete');

});



$cms->router->mount('/project', function() use ($cms) {

    $cms->router->get('/', 'App\Controllers\Project@index');
    $cms->router->get('/add', 'App\Controllers\Project@add');
    $cms->router->get('/([0-9]+)', 'App\Controllers\Project@detail');
    $cms->router->get('/update/([0-9]+)', 'App\Controllers\Project@update');




    $cms->router->post('/add', 'App\Controllers\Project@createProject');
    $cms->router->post('/update', 'App\Controllers\Project@updateProject');
    $cms->router->post('/delete', 'App\Controllers\Project@delete');


});


?>