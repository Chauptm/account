<?php
 
    function session_set($key, $val){
        $_SESSION[$key] = $val;
    }
     
       
    function session_delete(){
        session_destroy();
    }
