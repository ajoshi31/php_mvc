<?php Session::init(); ?>
<!doctype html>
<html>
<head>
    <title> Test MVC </title>
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/default.css"/>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">


    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>


    <script type="text/javascript" src="<?php echo URL; ?>public/js/custom.js"></script>

    <script type="text/javascript" >
        $(document).ready(function() {
            $('select').material_select();
        });
    </script>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>



    <?php
    if (isset($this->js)) {
        foreach ($this->js as $js) {
            echo '<script type="text/javascript" src="' . URL . 'views/' . $js . '"></script>';
        }
    }
    ?>

</head>
<body>
<nav style="padding-left: 1%; padding-right: 1%">
    <div class="nav-wrapper">
        <a href="#" class="brand-logo">MVC BY ATUL</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">

            <?php if (Session::get('loggedIn') == false): ?>
                <li><a href="<?php echo URL; ?>index">Index</a></li>
                <li><a href="<?php echo URL; ?>help">Help</a></li>
            <?php endif; ?>

            <?php if (Session::get('loggedIn') == true): ?>
                <li><a href="<?php echo URL; ?>dashboard">Dashboard</a></li>
                <?php if (Session::get('role') == "owner"): ?>
                    <li><a href="<?php echo URL; ?>user">Users</a></li>
                <?php endif; ?>
                <li><a href="<?php echo URL; ?>dashboard/logout">Logout</a></li>
            <?php else: ?>
                <li><a href="<?php echo URL; ?>login">Login</a></li>
            <?php endif; ?>
        </ul>
    </div>
</nav>

<div id="content">

