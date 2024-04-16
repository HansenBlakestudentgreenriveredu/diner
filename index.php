<?php

// 328/diner/index.php
// This is my CONTROLLER!

// Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Require the autoload file
require_once ('vendor/autoload.php');

// Instantiate the F3 Base class
$f3 = Base::instance();

// Define a default route
// https://tostrander.greenriverdev.com/328/hello-fat-free/
$f3->route('GET /', function() {
    //echo '<h1>Hello from My Diner App!</h1>';

    // Render a view page
    $view = new Template();
    echo $view->render('views/home-page.html');
});

// Breakfast menu
$f3->route('GET /menus/breakfast', function() {
    //echo '<h1>My Breakfast Menu</h1>';

    // Render a view page
    $view = new Template();
    echo $view->render('views/breakfast-menu.html');
});

// Lunch menu
$f3->route('GET /menus/lunch', function() {
    //echo '<h1>My Breakfast Menu</h1>';

    // Render a view page
    $view = new Template();
    echo $view->render('views/lunch-menu.html');
});

// Dinner menu
$f3->route('GET /menus/dinner', function() {
    //echo '<h1>My Breakfast Menu</h1>';

    // Render a view page
    $view = new Template();
    echo $view->render('views/dinner-menu.html');
});

// order1 menu
$f3->route('GET|POST /order1', function($f3) {
    //echo '<h1>My Breakfast Menu</h1>';

    // If form submitted
    if ($_SERVER['REQUEST_METHOD'] = "POST") {

        // Get daata from post array
        $food = $_POST['food'];
        $meal = $_POST['meal'];

        // If data is valid
        if (true){
            $f3->set('SESSION.food', $food);
            $f3->set('SESSION.meal', $meal);
        }
        echo "<p>Got here in post method</p>";
        var_dump ($_POST);
    } else {
        echo "<p>Got here in the get method</p>";
    }

    // Render a view page
    $view = new Template();
    echo $view->render('views/order1.html');
});

// order2 menu
$f3->route('GET /order2', function() {
    //echo '<h1>My Breakfast Menu</h1>';

    // Render a view page
    $view = new Template();
    echo $view->render('views/order2.html');
});
// Run Fat-Free
$f3->run();