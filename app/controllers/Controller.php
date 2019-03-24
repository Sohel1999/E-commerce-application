<?php
/**
 * Created by PhpStorm.
 * User: MD.SOHEL
 * Date: 3/25/2019
 * Time: 12:34 AM
 */

namespace App\controllers;


class Controller
{
         public function view($view='index'):void{
             require_once __DIR__.'/../../views/'.$view.'.php';

         }
}