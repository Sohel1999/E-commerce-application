<?php
namespace App\controllers\frontend;
use App\controllers\Controller;

class HomeController extends Controller
{
    public function getIndex(){
      $this->view('home');
    }
    

}