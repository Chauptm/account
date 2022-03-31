<?php
class BaseController{
    public static function createView($controller,$view_name, $data){
        require('view/'.$controller.'/'.$view_name.'.php');
    }

    public static function createModel($model_name){
        require('model/'.$model_name.'.php');
    }
}
?>