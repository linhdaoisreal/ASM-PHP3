@extends('client.master')

@section('tittle')
    Shopper Product
@endsection

@section('content')
    @include('client.partials.hot-product')

    {{-- Hot Product --}}
    <div class="site-section block-3 site-blocks-2 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 site-section-heading text-center pt-4">
                    <h2>All Products</h2>
                </div>
            </div>
            <div class="row">
                @foreach ($product as $pro)
                    @if ($pro->status == 0)
                        <div class="col-md-4 my-2">
                            <div class="item">
                                <div class="block-4 text-center">
                                    <figure class="block-4-image">
                                        <img src="{{ \Storage::url($pro->img_cover) }}" alt="Image placeholder"
                                            class="img-fluid">
                                    </figure>
                                    <div class="block-4-text p-4">
                                        <h3><a href="{{url('product-info/'. $pro->p_id)}}">{{ $pro->pro_name }}</a></h3>
                                        <p class="mb-0">Category: {{ $pro->cate_name }}</p>
                                        <p class="text-primary font-weight-bold">{{ $pro->price }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>

            <div class="row">  
                <div class="col-md-12 text-center my-4">  
                    <nav>  
                        <ul class=" justify-content-center">  
                            {{$product->links()}}  
                        </ul>  
                    </nav>  
                </div>  
            </div> 
        </div>
    </div>
@endsection
