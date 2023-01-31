<?php 


$cms->router->mount('/api', function() use ($cms) {


    // will result in '/user/'
    $cms->router->get('/', function() {
        echo 'In API';
    });

    // will result in '/user/'
    $cms->router->get('/user', function() {
        echo 'user overview';
    });

    // will result in '/user/id'
    $cms->router->get('user/(\d+)', function($id) {
        echo 'movie id ' . htmlentities($id);
    });

});
?>