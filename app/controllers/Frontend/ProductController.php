<?php
/**
 * Created by PhpStorm.
 * User: MD.SOHEL
 * Date: 3/24/2019
 * Time: 12:20 PM
 */

namespace App\controllers\frontend;
use App\controllers\Controller;


class ProductController extends Controller
{
    public  function  getIndex(){
        return 'product';
    }
}