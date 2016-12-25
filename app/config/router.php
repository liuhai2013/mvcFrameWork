<?php 

// map homepage
$router->map( 'GET', '/', function() {
    echo 'hello world!';
});

// map user details page
$router->map( 'GET', '/user/[i:id]/', function( $id ) {
    echo $id;
});

// map user details page
$router->map( 'GET', '/fei/[a:action]/', function( $action ) {
    echo $action;
});

$router->map( 'GET', '/home/[i:id]', 'Home@show');
