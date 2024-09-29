@extends('admin.master')

@section('tittle')
    Product List
@endsection

@section('content')
    <h1 class="text-white">PRODUCT LIST</h1>

    <div class="mb-4">
        <a href="{{ route('products.create') }}" class="btn btn-primary">Add New Product</a>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success">
            {{session()->get('success')}}
        </div>
    @endif

    <div class="table-responsive ">
        <table class="table table-primary rounded">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Category</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Status</th>
                    <th scope="col">Price</th>
                    <th scope="col">Sale Price</th>
                    <th scope="col">Image Cover</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Created/Updated At</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $product)
                    <tr class="">
                        <td scope="row">{{ $product->p_id }}</td>
                        <td>{{ $product->cate_name }}</td>
                        <td>{{ $product->pro_name }}</td>
                        <td>
                            @if ($product->status == 0)
                                <p class="bg-info rounded text-center">Active</p>
                            @else
                                <p class="bg-danger rounded text-center">Disable</p>
                            @endif
                        </td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->sale_price }}</td>
                        <td>
                            <img src="{{\Storage::url($product->img_cover)}}" class="" width="75px" alt="">
                        </td>
                        <td>{{ $product->quantity }}</td>
                        <td>
                            <ul>
                                <li>{{ $product->created_at }}</li>
                                <li>{{ $product->updated_at }}</li>
                            </ul>
                        </td>
                        <td>
                            <a href="{{ route('products.show', $product->p_id)}}" class="btn btn-info">Show</a>

                            <a href="{{ route('products.edit', $product->p_id)}}" class="btn btn-warning">Edit</a>

                            <form action="{{ route('products.destroy', $product->p_id)}}" method="post">   
                                @csrf
                                @method('DELETE')
                                
                                <button onclick="return confirm('Are U sure ???')" class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>

        {{$data->links()}}
    </div>
@endsection
