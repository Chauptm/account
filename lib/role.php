<?php
    function redirect($controller, $action){
        header('location: index.php?controller='.$controller.'&action='.$action);
        exit();
    }

    function redirectEmail($controller, $action, $email){
        header('location: index.php?controller='.$controller.'&action='.$action.'&email='.$email);
        exit();
    }
    
