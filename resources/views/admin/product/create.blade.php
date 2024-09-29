@extends('admin.master')

@section('tittle')
    Product Create
@endsection

@section('content')
    <h1 class="text-white">ADD NEW PRODUCT</h1>

    @if ($errors->any())
        <div class="alert alert-warning">
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </div>
    @endif

    <form action="{{route('products.store')}}" method="POST" class="bg-white p-4 rounded" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label">Product Name</label>
            <input value="{{old('product_name')}}" type="text" class="form-control" name="product_name">
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <input value="{{old('description')}}" type="text" class="form-control" name="description">
        </div>
        <div class="mb-3">
            <label class="form-label">Price</label>
            <input value="{{old('price')}}" type="number" class="form-control" name="price">
        </div>
        <div class="mb-3">
            <label class="form-label">SalePrice</label>
            <input value="{{old('sale_price')}}" type="number" class="form-control" name="sale_price">
        </div>
        <div class="mb-3">
            <label class="form-label">Image Cover</label>
            <input value="{{old('img_cover')}}" type="file" class="form-control" name="img_cover">
        </div>
        <div class="mb-3">
            <label class="form-label">Quantity</label>
            <input value="{{old('quantity')}}" type="number" class="form-control" name="quantity">
        </div>
        <div class="mb-3">
            <label class="form-label">Category</label>
            <select name="cate_id" id="" class="form-select">
                @foreach ($cate as $cate)
                    <option value="{{$cate->id}}">{{$cate->category_name}}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{route('products.index')}}" class="btn btn-info">Back to List</a>
    </form>
    
@endsection
