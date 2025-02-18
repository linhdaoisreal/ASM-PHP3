{{-- Hot Product --}}
<div class="site-section block-3 site-blocks-2 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 site-section-heading text-center pt-4">
                <h2>Hot Products</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="nonloop-block-3 owl-carousel">
                    @foreach ($hot_pro as $hot_pro)
                        <div class="item">
                            <div class="block-4 text-center">
                                <figure class="block-4-image">
                                    <img src="{{\Storage::url($hot_pro->img_cover)}}" alt="Image placeholder" class="img-fluid">
                                </figure>
                                <div class="block-4-text p-4">
                                    <h3><a href="#">{{$hot_pro->pro_name}}</a></h3>
                                    <p class="mb-0">Category: {{$hot_pro->cate_name}}</p>
                                    <p class="text-primary font-weight-bold">{{$hot_pro->price}}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    
                    {{-- <div class="item">
                        <div class="block-4 text-center">
                            <figure class="block-4-image">
                                <img src="/shoppers/images/shoe_1.jpg" alt="Image placeholder" class="img-fluid">
                            </figure>
                            <div class="block-4-text p-4">
                                <h3><a href="#">Corater</a></h3>
                                <p class="mb-0">Finding perfect products</p>
                                <p class="text-primary font-weight-bold">$50</p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="block-4 text-center">
                            <figure class="block-4-image">
                                <img src="/shoppers/images/cloth_2.jpg" alt="Image placeholder" class="img-fluid">
                            </figure>
                            <div class="block-4-text p-4">
                                <h3><a href="#">Polo Shirt</a></h3>
                                <p class="mb-0">Finding perfect products</p>
                                <p class="text-primary font-weight-bold">$50</p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="block-4 text-center">
                            <figure class="block-4-image">
                                <img src="/shoppers/images/cloth_3.jpg" alt="Image placeholder" class="img-fluid">
                            </figure>
                            <div class="block-4-text p-4">
                                <h3><a href="#">T-Shirt Mockup</a></h3>
                                <p class="mb-0">Finding perfect products</p>
                                <p class="text-primary font-weight-bold">$50</p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="block-4 text-center">
                            <figure class="block-4-image">
                                <img src="/shoppers/images/shoe_1.jpg" alt="Image placeholder" class="img-fluid">
                            </figure>
                            <div class="block-4-text p-4">
                                <h3><a href="#">Corater</a></h3>
                                <p class="mb-0">Finding perfect products</p>
                                <p class="text-primary font-weight-bold">$50</p>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
