@extends('client.master')

@section('tittle')
    Shopper HomePage
@endsection

@section('content')
    {{-- Banner --}}
    <div class="site-blocks-cover" style="background-image: url(shoppers/images/hero_1.jpg);" data-aos="fade">
        <div class="container">
            <div class="row align-items-start align-items-md-center justify-content-end">
                <div class="col-md-5 text-center text-md-left pt-5 pt-md-0">
                    <h1 class="mb-2">Finding Your Perfect Shoes</h1>
                    <div class="intro-text text-center text-md-left">
                        <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus at
                            iaculis quam.
                            Integer accumsan tincidunt fringilla. </p>
                        <p>
                            <a href="#" class="btn btn-sm btn-primary">Shop Now</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('client.partials.endow')
    @include('client.partials.collection')
    @include('client.partials.hot-product')
    @include('client.partials.big-sale')
@endsection