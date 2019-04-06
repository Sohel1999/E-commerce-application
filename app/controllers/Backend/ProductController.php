<?php
/**
 * Created by PhpStorm.
 * User: MD.SOHEL
 * Date: 3/28/2019
 * Time: 6:52 PM
 */

namespace App\Controllers\Backend;


use App\controllers\Controller;
use App\Models\Product;
use Respect\Validation\Validator;

class ProductController extends Controller
{
    public function getIndex():void {
        view('Backend/product/index');

    }
    public  function postIndex(){
       
        $validator=new Validator();
        $errors=[];
        $category_id= (int)$_POST['category_id'] ;
        $title=$_POST['title'];
        $slug=$_POST['slug'] ;
        $description=$_POST['description'];
        $price=$_POST['price'];
        $salesPrice=$_POST['sales_price'];
        $status=(int)$_POST['status'];

        if ($validator::alnum()->validate($title) === false) {
            $errors['title'] = 'Title can only contain alphabets';
        }
        if ($validator::slug()->validate($slug) === false) {
            $errors['slug'] = 'Slug must be valid slug';
        }
        if(strlen($description)<=0){
            $errors['description']='Description cannot be empty';
        }
        if($validator::numeric()->positive()->validate($price) ===false){
            $errors['price']="price must be positive";
        }
        if($validator::numeric()->positive()->validate($salesPrice)===false){
            $errors['price']="Sales Price must be positive";
        }
        if(empty($errors)){
            Product::create([
                'category_id'=>$category_id,
                'title'=>$title,
                'slug'=>$slug,
                'description' =>$description,
                'price'=>$price,
                'sales_price'=>$salesPrice,
                'active'=>$status
            ]);
            $_SESSION['success'] = 'Product successfully add';
            redirect('deshboard/products');
        }
        $_SESSION['errors'] = $errors;
        redirect('deshboard/products');

    }

}