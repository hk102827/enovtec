<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::get();
        return view('products.index',compact('products'));
    }
    public function create()
    {
        return view('products.create');
    }
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:png,jpg,gif,jpeg|max:10000',
        ]);
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('products'), $imageName);

        $product = new Product();
        $product->image = $imageName;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->save();
        return redirect('/')->with('success', 'Product Added !!!!');
        
    }
    public function edit($id)
    {
        $product = Product::where('id',$id)->first();
        return view('products.edit',compact('product'));
    }

    public function update(Request $request, $id)
    {
        
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'nullable|mimes:png,jpg,gif,jpeg|max:10000',
        ]);
        $product = Product::where('id',$id)->first();
        if(isset($request->image)){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('products'), $imageName);
            $product->image = $imageName;
        }
    
        $product->name = $request->name;
        $product->description = $request->description;
        $product->save();
        return redirect('/')->with('success', 'Product Updated !!!!');
    }

    public function destroy($id)
    {
        $product = Product::where('id',$id)->first();
        $product->delete();
        return back()->with('danger','Product Deleted');
    }
    public function show($id)
    {
        $product = Product::where('id',$id)->first();
       return view('products.show',compact('product'));
    }

    public function addProduct(Request $request)
    {
        $product = new Product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->image = $request->image;
        $resul = $product->save();
        if($resul){

            return ["result"=>"Products added Successfully"];
        }else{
            return ["result"=>"Somthing Went Wrong"];

        }
    }
    public function updateproduct(Request $request)
    {
        $product = Product::where($request->id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->image = $request->image;
        $resul = $product->save();
        if($resul){
            return ["result"=>"Products Updated Successfully"];
        }else{
            return ["result"=>"Somthing Went Wrong"];
        }
    }

    public function deleteproduct($id)
    {
        Product::find($id)->delete();
        return ["result"=>"Products Deleted Successfully"];
    }

    public function searchproduct($name)
    {
        return Product::where('name',"like","%".$name."%")->get();
    }

    public function productvalidate(Request $request)
    {
         $rules = array(
            'name'=>'required|string',
            'description'=>'required|string',
            'image'=>'required'
        );
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json($validator->errors(),401);
        }else{
            $product = new Product();
            $product->name = $request->name;
            $product->description = $request->description;
            $product->image = $request->image;
            $product->save();
            return ['Result','Products has been added'];
        }
      
    }


    public function FileUpload(Request $request)
    {
        $result = $request->file('file')->store("apiimages");
        return ['result',$result];
    }

}
