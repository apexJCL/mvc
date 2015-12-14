<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="view/css/style.css">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="theme-color" content="#037995">
    <title>Librería Tecnológico</title>
</head>
<body>

<?php

include 'ChromePhp.php';

require_once 'controller/index.php'; // Load the controller

$index = new IndexController(); // Instantiate Index Controller

if(isset($_GET['action'])){
    switch($_GET['action']){
        case '':
            break;
        case 'books':
            $index->showBooks();
            break;
        case 'autors':
            $index->showAutors();
            break;
        case 'login':
            $index->showLoginScreen();
            break;
        case 'check':
            $index->checkLogin();
            break;
        case 'logout':
            $index->logout();
            break;
        case 'manage';
            if($_SESSION['user_type'] == 1)
                $index->showManagement();
            break;
        case 'register':
            $index->showRegister('show');
            break;
        case 'checkr':
            $index->register();
            break;
        case 'search':
            $index->search('autor');
            break;
        case 'searchb':
            $index->search('book');
            break;
        case 'submit':
            $index->submitComment();
            break;
        case 'showbook':
            $index->showBook();
            break;
        case 'statistics':
            $index->showStatistics();
            break;
        case 'profile':
            $index->showProfile();
            break;
    }
}
else {
    if(isset($_GET['autor']))
        $index->showAutor();
    else
        $index->showStart(); // Show the default webpage
}
?>
</body>
</html>