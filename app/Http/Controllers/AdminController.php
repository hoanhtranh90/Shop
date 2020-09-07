<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Category;
use App\Order_product;
use App\Product;
use App\Order_succes;
use Illuminate\Support\Facades\Redirect;
class AdminController extends Controller
{
    public function index(){
        # code...
       return view('admin.admin');

    }
    public function account()
    {
       $a = User::all();
       return view('admin.account')->with('users',$a);
    }
    public function category()
    {
        # code...
       $a = Category::all();

       return view('admin.category')->with('categories' ,$a);

    }
    public function product()
    {
        # code...
       $a = Product::all();
      
       // lay du lieu category
       $product_categories = $a->fresh('category');
       
       return view('admin.product')->with('products',$product_categories);

    }
    public function add_product_form()
    {
        $a = Category::all();
        
        return view('admin.add_product_form')->with('cate_product',$a);
    }
    public function add_product(Request $request)
    {
        # code...
        $product = new Product;
        $product->price = $request->price;
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->count = 100;
        $product->Product_Description = $request->Product_Description;
        $product->product_content = $request->product_content;
        $get_image = $request->file('img');
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('uploads/product',$new_image);
            $product->img = $new_image;
            $product->save();
        
        return Redirect::to('admin/product');
    //    return view('admin.product')->with('products',$a);

    }
    public function add_order_product(Request $request){
        // save product
        $order = new Order_product;
        $a = Product::where('id',$request->id)->get();

        $order->name = $a[0]->name;
        $order->price = $a[0]->price;
        $order->img = $a[0]->img;
        $order->count = $a[0]->count;
        $order->Product_Description = $a[0]->Product_Description;
        $order->product_content = $a[0]->product_content;
        $order->category_id = $a[0]->category_id;
        $order->user_id = $request->user_id;
        $order->save();        
        return response()->json($request->user_id);
    }
    public function delete_order_product(Request $request)
    {
        //delete gio hang
        $a = Order_product::where('id',$request->id)->delete();
        
        return response()->json($a);

    }
    public function order_succes(Request $request)
    {
        //don hang thanh cong
        $datax = [];

        for ($i=0; $i < count($request->data) ; $i++) { 
        $a = Order_product::where('id',$request->data[$i])->get();
        $b = $a[0];
        $c = Order_succes::create([
            'user_id' => $b->user_id,

            'name' => $b->name,
            'price' => $b->price,
            'img' => $b->img,
        ]);
        $c->save();
        $d = Order_product::where('id',$b->id)->delete();


            array_push($datax,$c);
        };
        return response()->json($datax);

        
    }
    public function order_product_succes_view()
    {
        //xem don hang thanh cong
        $a = Order_succes::all();

       return view('admin.order_product_succes')->with('products',$a);
    }
    

}
