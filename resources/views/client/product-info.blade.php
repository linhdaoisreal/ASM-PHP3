@extends('client.master')

@section('tittle')
    Product
@endsection

@section('content')
    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0"><a href="{{url('/')}}">Home</a> <span class="mx-2 mb-0">/</span> <strong
                        class="text-black">{{$product->pro_name}}</strong></div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{ \Storage::url($product->img_cover) }}" alt="Image" class="img-fluid">
                </div>
                <div class="col-md-6">
                    <h2 class="text-black">{{$product->pro_name}}</h2>
                    <p class="mb-4">{{$product->description}}</p>
                    <p><strong class="text-primary h4">${{$product->price}}</strong></p>
                    <div class="mb-5">
                        <div class="input-group mb-3" style="max-width: 120px;">
                            <div class="input-group-prepend">
                                <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                            </div>
                            <input type="text" class="form-control text-center" value="1" placeholder=""
                                aria-label="Example text with button addon" aria-describedby="button-addon1">
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                            </div>
                        </div>

                    </div>
                    <p><a href="cart.html" class="buy-now btn btn-sm btn-primary">Add To Cart</a></p>

                </div>
            </div>
        </div>
    </div>

    @include('client.partials.hot-product')
@endsection
