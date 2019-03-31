<?php
/**
 * Created by PhpStorm.
 * User: MD.SOHEL
 * Date: 3/22/2019
 * Time: 8:00 PM
 */

namespace App\controllers\frontend;
use App\controllers\Controller;

class UserController extends Controller
{
    public function getIndex()
    {
        view('login');
    }
}