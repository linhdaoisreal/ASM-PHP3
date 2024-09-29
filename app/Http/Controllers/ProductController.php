<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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

        return view('admin.product.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $cate = DB::table('categories')->select(['id', 'category_name'])
        ->where('status', '=', 1)->get();

        // dd($cate);

        return view('admin.product.create', compact('cate'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        // dd($request->all());

        $data=$request->except('img_cover');

        if ($request->hasFile('img_cover')) {
            $data['img_cover'] = Storage::put('products', $request->file('img_cover'));
        }

        Product::query()->create($data);

        return redirect()->route('products.index')
            ->with('success', 'Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('admin.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $cate = DB::table('categories')->select(['id', 'category_name'])
        ->where('status', '=', 1)->get();

        return view('admin.product.update', compact('product','cate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
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

        return back()->with('success', 'Updated Successfully');
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

        return back()->with('success', 'Deleted Successfully');
    }
}
