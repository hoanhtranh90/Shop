<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Category;
use App\Product;
use App\Order_product;
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
}
