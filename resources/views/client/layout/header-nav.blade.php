<nav class="site-navigation text-right text-md-center" role="navigation">
    <div class="container">
        <ul class="site-menu js-clone-nav d-none d-md-block">
            <li class="has-children active">
                <a href="{{url('/')}}">Home</a>
                {{-- <ul class="dropdown">
                    <li><a href="#">Menu One</a></li>
                    <li><a href="#">Menu Two</a></li>
                    <li><a href="#">Menu Three</a></li>
                    <li class="has-children">
                        <a href="#">Sub Menu</a>
                        <ul class="dropdown">
                            <li><a href="#">Menu One</a></li>
                            <li><a href="#">Menu Two</a></li>
                            <li><a href="#">Menu Three</a></li>
                        </ul>
                    </li>
                </ul> --}}
            </li>
            <li class="has-children">
                <a href="{{url('all-product')}}">Product</a>
                <ul class="dropdown">
                    @foreach ($cate_arr as $cate)
                        @if ($cate->status == 1)
                            <li><a href="{{ url('product-by-cate/' . $cate->id) }}">{{$cate->category_name}}</a></li>
                        @endif
                    @endforeach
                </ul>
            </li>
            <li><a href="#">Shop</a></li>
            <li><a href="#">Catalogue</a></li>
            <li><a href="#">New Arrivals</a></li>
            <li><a href="contact.html">Contact</a></li>
        </ul>
    </div>
</nav>