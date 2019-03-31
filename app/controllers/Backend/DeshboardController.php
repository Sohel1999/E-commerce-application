<?php
/**
 * Created by PhpStorm.
 * User: MD.SOHEL
 * Date: 3/27/2019
 * Time: 8:39 PM
 */

namespace App\Controllers\Backend;


use App\controllers\Controller;

class DeshboardController  extends Controller
{
    public function getIndex(){
        view('Backend/deshboard');
    }

}