<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Category;
use App\Product;
use App\Order_product;
use App\Order_succes;
class ApiController extends Controller
{
    public function product()
    {
        $a = Product::all();
        $product_categories = $a->fresh('category');
        
        return response()->json($product_categories);
       
    }
    public function order_product()
    {
        $a = Order_product::all();
        
        
        return response()->json($a);
       
    }
    public function category()
    {
        $a = Category::all();
        
        return response()->json($a);
       
    }
    public function order_product_succes()
    {
        $a = Order_succes::all();
        return response()->json($a);

    }
}
