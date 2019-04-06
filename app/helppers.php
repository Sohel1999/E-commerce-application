<?php
if(!function_exists('view')){
    function view($view='index',$data=[]):void{
        
        extract($data, EXTR_SKIP);
        ob_start(); 
        require_once __DIR__.'/../views/'.$view.'.php';

    }
}
if(!function_exists('partial_view')) {
    function partial_view($view='index'){
        require_once __DIR__.'/../views/partials/'.$view.'.php';
    }
}
if(!function_exists('redirect')) {
   function redirect($location='/')
   {
       header('Location: '.BASE_URL.'/'.$location);
       exit();
   }

}
if(!function_exists('devtool')){
    function devtool($data){
        echo '<pre>';
            var_dump($data);
        echo '</pre>' ;
        exit();
    }
}