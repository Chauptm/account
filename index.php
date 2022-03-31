<?php
    session_start(); 
    define("IN_SITE", true);
    require ('lib/mail.php');
    require ('lib/captcha.php');
    require ('lib/session.php');
    require ('lib/role.php');
    require ('lib/database.php');
    require ('controller/basecontroller.php');

    require 'lib\PHPMailer\Exception.php';
    require 'lib\PHPMailer\PHPMailer.php';
    require 'lib\PHPMailer\SMTP.php';
    $_SESSION['captcha']= createCaptcha();
    

    $controller = isset($_REQUEST['controller'])? $_REQUEST['controller'] : '';
    $action = isset($_REQUEST['action'])? $_REQUEST['action'] : '';

    if (empty($controller) || empty($action)){
        $controller = 'user';
        $action = 'login';
    }

    $controller_file= strtolower($controller).'controller';
    require("controller/${controller_file}.php");
    $controller_class=ucfirst(strtolower($controller));
    $action_name= strtolower($action).''.$controller_class;

    $controller_class= new $controller_class;
    $controller_class->$action_name();

?>

