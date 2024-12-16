<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\Array_;

class ApiController extends Controller
{
    public function getData()
    {
        $arr = array("name"=>"Hazrat","age"=>20,);
        return $arr;
    }

    public function getProduct($id = null)
    {
        return $id?Product::find($id):Product::all();
    }
    
}
