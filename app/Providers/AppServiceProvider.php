<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Paginator::useBootstrapFive();
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $cate_arr = DB::table('categories')->select('id', 'category_name', 'status')->get();

        $hot_pro = DB::table('products')->from('products as p')
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
        ->latest('p.id')->where('hot_product', '=', 1)->limit(7)->get();
        View::share('cate_arr', $cate_arr);
        View::share('hot_pro', $hot_pro);

    }
}
