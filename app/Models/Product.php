<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'cate_id',
        'product_name',
        'description',
        'price',
        'sale_price',
        'img_cover',
        'quantity'
    ];

    public static function getAllProduct(){
        $data = Product::query()->from('products as p')
        ->join('categories as c', 'c.id', '=', 'p.cate_id')
        ->select([
            'p.id as p_id',
            'p.cate_id',
            'c.category_name as cate_name',
            'p.product_name as pro_name',
            'p.description',
            'p.price',
            'p.sale_price',
            'img_cover',
            'quantity',
            'hot_product',
            'p.status',
            'p.created_at',
            'p.updated_at'
        ])
        ->where('p.status', '=', 0)
        ->latest('p.id')->paginate(15);

        return $data;
    }

    public static function getProductByCateID($cate_id){
        $data = Product::query()->from('products as p')
        ->join('categories as c', 'c.id', '=', 'p.cate_id')
        ->select([
            'p.id as p_id',
            'p.cate_id',
            'c.category_name as cate_name',
            'p.product_name as pro_name',
            'p.description',
            'p.price',
            'p.sale_price',
            'img_cover',
            'quantity',
            'hot_product',
            'p.status',
            'p.created_at',
            'p.updated_at'
        ])
        ->latest('p.id')
        ->where('p.status', '=', 0)
        ->where('p.cate_id', '=', $cate_id)
        ->paginate(15);

        return $data;
    }

    public static function findProductByName($keyword){
        $data = Product::query()->from('products as p')
        ->join('categories as c', 'c.id', '=', 'p.cate_id')
        ->select([
            'p.id as p_id',
            'p.cate_id',
            'c.category_name as cate_name',
            'p.product_name as pro_name',
            'p.description',
            'p.price',
            'p.sale_price',
            'img_cover',
            'quantity',
            'hot_product',
            'p.status',
            'p.created_at',
            'p.updated_at'
        ])
        ->latest('p.id')
        ->where('p.status', '=', 0)
        ->where('p.product_name', 'LIKE', "%{$keyword}%")
        ->paginate(15);

        return $data;
    }

    public static function getOneProduct($pro_id){
        $data = Product::query()->from('products as p')
        ->join('categories as c', 'c.id', '=', 'p.cate_id')
        ->select([
            'p.id as p_id',
            'p.cate_id',
            'c.category_name as cate_name',
            'p.product_name as pro_name',
            'p.description',
            'p.price',
            'p.sale_price',
            'img_cover',
            'quantity',
            'hot_product',
            'p.status',
            'p.created_at',
            'p.updated_at'
        ])
        ->where('p.id', '=', $pro_id)->first();

        return $data;
    }
}
