<?php
    function createCaptcha(){
        $md5_hash= md5(rand(0,999));
        $captcha= substr($md5_hash, 15, 5);
        return $captcha;
    }
?>