@extends('admin.master')

@section('tittle')
    Category Update
@endsection

@section('content')
    <h1 class="text-white">UPDATE PRODUCT {{ $product->product_name }}</h1>

    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-warning">
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </div>
    @endif

    <form action="{{ route('products.update', $product) }}" method="POST" class="bg-white p-4 rounded"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Product Name</label>
            <input value="{{ $product->product_name }}" type="text" class="form-control" name="product_name">
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <input value="{{ $product->description }}" type="text" class="form-control" name="description">
        </div>
        <div class="mb-3">
            <label class="form-label">Price</label>
            <input value="{{ $product->price }}" type="number" class="form-control" name="price">
        </div>
        <div class="mb-3">
            <label class="form-label">SalePrice</label>
            <input value="{{ $product->sale_price }}" type="number" class="form-control" name="sale_price">
        </div>
        <div class="mb-3">
            <label class="form-label">Image Cover</label>
            <img src="{{ \Storage::url($product->img_cover) }}" class="" width="75px" alt="">
            <input value="{{ $product->img_cover }}" type="file" class="form-control" name="img_cover">
        </div>
        <div class="mb-3">
            <label class="form-label">Quantity</label>
            <input value="{{ $product->quantity }}" type="number" class="form-control" name="quantity">
        </div>
        <div class="mb-3">
            <label class="form-label">Category</label>
            <select name="cate_id" id="" class="form-select">
                @foreach ($cate as $cate)
                    <option value="{{ $cate->id }}">{{ $cate->category_name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{route('products.index')}}" class="btn btn-info">Back to List</a>
    </form>
@endsection
