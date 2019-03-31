<?php
/**
 * Created by PhpStorm.
 * User: MD.SOHEL
 * Date: 3/28/2019
 * Time: 6:49 PM
 */

namespace App\Controllers\Backend;


use App\controllers\Controller;
use App\Models\Category;
use Respect\Validation\Validator;

class CategoryController
{
     public function getIndex():void{
         $categories=Category::all();
         view('Backend/category/index',['categories'=>$categories]) ;
     } 
     public  function  postIndex(){

         $validator=new Validator();
         $errors=[];
         $title=$_POST['title'];
         $slug=$_POST['slug'];
         $status=$_POST['status'];
         if ($validator::alpha()->validate($title) === false) {
             $errors['title'] = 'Title can only contain alphabets';
         }
         if ($validator::slug()->validate($slug) === false) {
             $errors['slug'] = 'Slug must be valid slug';
         }
         if (empty($errors)) {
             Category::create([
                 'title' => $title,
                 'slug' => strtolower($slug),
                 'active' => $status,
             ]);
             $_SESSION['success'] = 'Category created';
            redirect('categories');
         }
         $_SESSION['errors'] = $errors;
       redirect('categories');
     }

}