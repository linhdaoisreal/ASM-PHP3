<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function product(){
        $product = Product::getAllProduct();

        return view('client.product', ['product' => $product]);
    }

    public function product_by_cate($cate_id){
        $product = Product::getProductByCateID($cate_id);

        return view('client.product', ['product' => $product]);
    }

    public function find_product(){
        $keyword = $_REQUEST['keyword'];

        $product = Product::findProductByName($keyword);

        return view('client.product', ['product' => $product]);
    }

    public function product_info($id){
        $product = Product::getOneProduct($id);

        // dd($product->toRawSql());

        return view('client.product-info', ['product' => $product]);
    }
}
