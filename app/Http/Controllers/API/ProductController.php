<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
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
        ->latest('p.id')->paginate(5);

        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $data=$request->except('img_cover');

        if ($request->hasFile('img_cover')) {
            $data['img_cover'] = Storage::put('products', $request->file('img_cover'));
        }

        Product::query()->create($data);

        return response()->json([], 204);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return response()->json($product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $data=$request->except('img_cover');

        if ($request->hasFile('img_cover')) {
            $data['img_cover'] = Storage::put('products', $request->file('img_cover'));
        }

        $currentPathImage = $product->img_cover;

        $product->update($data);

        if ($request->hasFile('img_cover') && Storage::exists($currentPathImage)) {
            Storage::delete($currentPathImage);
        }

        return response()->json($product);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        if (Storage::exists($product->img_cover)) {
            Storage::delete($product->img_cover);
        }

        return response()->json([], 204);
    }
}
