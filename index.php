<?php
/**
 * Created by IntelliJ IDEA.
 * User: ajoshi.biz
 * Date: 01/03/17
 * Time: 10:04
 */

//Use an autoloader!
    require 'libs/Bootstrap.php';
    require 'libs/Controller.php';
    require 'libs/Model.php';
    require 'libs/View.php';

    require 'libs/Database.php';

    require 'config/paths.php';
    require 'config/database.php';

    $app = new Bootstrap();
?>

