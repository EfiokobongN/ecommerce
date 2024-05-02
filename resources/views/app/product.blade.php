@extends('layouts.base')

@section('content')

    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{ route('app.index') }}"><i class="fa fa-home"></i> Home</a>
                        <a href="{{ route('shop.index') }}">shop </a>
                        <span>{{ $product->name }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        
        <div class="container">
            @if (\Session::has('message'))
                  <div class="alert alert-success">
                    <p class="pt-2 pb-2">{{ \Session::get('message') }}</p>
                  </div>  
                @endif 
            <div class="row">
                <div class="col-lg-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__left product__thumb nice-scroll">

                            @if ($product->images)
                            @php
                                $images = explode(',', $product->images);
                            @endphp
                            @foreach ($images as $image)
                                
                                    <img class="product__big__img pt active" src="{{ asset('assets/img/shop/') }}/{{ $image }}" alt="{{ $product->name }}">
                               
                            @endforeach
                        @endif

                        </div>
                        <div class="product__details__slider__content">
                            <div class="product__details__pic__slider owl-carousel">

                                <img  class="product__big__img" src="{{ asset('assets/img/shop') }}/{{ $product->image }}" alt="{{ $product->name }}">
                                

                            @if ($product->images)
                                @php
                                    $images = explode(',', $product->images);
                                @endphp
                                @foreach ($images as $image)
                                    
                                        <img class="product__big__img" src="{{ asset('assets/img/shop/' . $image) }}" alt="{{ $product->name }}">
                                    
                                @endforeach
                            @endif


                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product__details__text">
                        <h3>{{ $product->name }} <span>Brand: SKMEIMore Men Watches from SKMEI</span></h3>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <span>( 138 reviews )</span>
                        </div>
                        @if ($product->sale_price)
                        <div class="product__details__price">$ {{ $product->regular_price }} <span>$ {{ $product->sale_price }}</span> {{ round((($product->regular_price - $product->sale_price)/$product->regular_price)*100) }}% off</div>
                        @else
                        <div class="product__details__price">${{ $product->regular_price }} </div>
                        @endif
                       
                        <p>{{ $product->short_description }}.</p>
                        <div class="product__details__button">
                            <div class="quantity">
                                <span>Quantity:</span>
                                <div class="pro-qty">
                                    <input type="text" value="{{ $product->qty }}">
                                </div>
                            </div>
                            <a href="javascript:void(0)" onclick="event.preventDefault();document.getElementById('addtocart').submit();" class="cart-btn"><span class="icon_bag_alt"></span> Add to cart
                                <form method="POST" action="{{ route('product.store') }}" id="addtocart">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $product->id }}">
                                    <input type="hidden" name="quantity" id="qty" value="1">
                                </form>
                            </a>
                            <ul>
                                <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                                <li><a href="#"><span class="icon_adjust-horiz"></span></a></li>
                            </ul>
                        </div>
                        <div class="product__details__widget">
                            <ul>
                                <li>
                                    <span>Availability:</span>
                                    <div class="stock__checkbox">
                                        <label for="stockin">
                                            @if ($product->stock_status =='instock')
                                            In Stock
                                            @else
                                            Out Of Stock
                                            @endif
                                            
                                            <input type="checkbox" id="stockin">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <span>Available color:</span>
                                    <div class="color__checkbox">
                                        <label for="red">
                                            <input type="radio" name="color__radio" id="red" checked>
                                            <span class="checkmark"></span>
                                        </label>
                                        <label for="black">
                                            <input type="radio" name="color__radio" id="black">
                                            <span class="checkmark black-bg"></span>
                                        </label>
                                        <label for="grey">
                                            <input type="radio" name="color__radio" id="grey">
                                            <span class="checkmark grey-bg"></span>
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <span>Available size:</span>
                                    <div class="size__btn">
                                        <label for="xs-btn" class="active">
                                            <input type="radio" id="xs-btn">
                                            xs
                                        </label>
                                        <label for="s-btn">
                                            <input type="radio" id="s-btn">
                                            s
                                        </label>
                                        <label for="m-btn">
                                            <input type="radio" id="m-btn">
                                            m
                                        </label>
                                        <label for="l-btn">
                                            <input type="radio" id="l-btn">
                                            l
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <span>Promotions:</span>
                                    <p>Free shipping</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Specification</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">Reviews ( 2 )</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <h6>Description</h6>
                                <p>{{ $product->description }}</p>
                            </div>
                            <div class="tab-pane" id="tabs-2" role="tabpanel">
                                <h6>Specification</h6>
                                <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut loret fugit, sed
                                    quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt loret.
                                    Neque porro lorem quisquam est, qui dolorem ipsum quia dolor si. Nemo enim ipsam
                                    voluptatem quia voluptas sit aspernatur aut odit aut loret fugit, sed quia ipsu
                                    consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Nulla
                                consequat massa quis enim.</p>
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget
                                    dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes,
                                    nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium
                                quis, sem.</p>
                            </div>
                            <div class="tab-pane" id="tabs-3" role="tabpanel">
                                <h6>Reviews ( 2 )</h6>
                                <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut loret fugit, sed
                                    quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt loret.
                                    Neque porro lorem quisquam est, qui dolorem ipsum quia dolor si. Nemo enim ipsam
                                    voluptatem quia voluptas sit aspernatur aut odit aut loret fugit, sed quia ipsu
                                    consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Nulla
                                consequat massa quis enim.</p>
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget
                                    dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes,
                                    nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium
                                quis, sem.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--related product -->
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="related__title">
                        <h5>Customes Also Reviews</h5>
                    </div>
                </div>
                @foreach ($customs  as $custom)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="{{ asset('assets/img/shop') }}/{{ $custom->image }}">
                            <div class="label new">{{ $custom->category->name }}</div>
                            <ul class="product__hover">
                                <li><a href="{{ asset('assets/img/shop') }}/{{ $custom->image }}" class="image-popup"><span class="arrow_expand"></span></a></li>
                                <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                                <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="{{ route('product.show',[$custom->slug]) }}">{{ $custom->name }}</a></h6>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product__price">$ @if ($custom->sale_price )
                                {{ $custom->sale_price }} 
                            @else
                            {{ $custom->regular_price }}
                            @endif</div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!--related product  ends-->
        </div>
    </section>
    <!-- Product Details Section End -->

@endsection