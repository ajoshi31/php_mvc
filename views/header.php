<?php Session::init(); ?>
<!doctype html>
<html>
<head>
    <title> Test MVC </title>
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/default.css" />
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script type="text/javascript" src="<?php echo URL; ?>public/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo URL; ?>public/js/custom.js"></script>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>

    <?php
    if(isset($this->js)){
        foreach($this->js as $js){
            echo '<script type="text/javascript" src="'. URL.'views/'.$js.'"></script>' ;
        }
    }
    ?>

</head>
<body>
<header>
    Header
    <br>
    <a href="<?php echo URL; ?>index">Index</a>
    <a href="<?php echo URL; ?>help">Help</a>

    <?php
    if (Session::get('loggedIn') == true):?>
        <a href="<?php echo URL; ?>dashboard/logout">Logout</a>
    <?php else: ?>
        <a href="<?php echo URL; ?>login">Login</a>
    <?php endif ?>

</header>

<div id="content">

