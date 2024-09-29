@extends('admin.master')

@section('tittle')
    Product Show
@endsection

@section('content')
    <table class="table bg-white rounded">
        <tr>
            <th>Key</th>
            <th>Value</th>
        </tr>

        @foreach($product->toArray() as $field=>$value)
            <tr>
                <td>{{$field}}</td>
                <td>
                    @php
                        switch ($field) {
                            case 'img_cover':
                                $url = \Storage::url($product->img_cover);
                                echo '<img src="'.$url.'" class="" width="75px" alt="">';
                                break;
                            
                            default:
                                echo $value;
                                break;
                        }   
                    @endphp
                </td>
            </tr>
        @endforeach
    </table>

    <a href="{{route('products.index')}}" class="btn btn-info">Back to List</a>
@endsection