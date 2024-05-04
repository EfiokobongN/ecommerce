@extends('layouts.base')

@section('content')


    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{ route('app.index') }}"><i class="fa fa-home"></i> Home</a>
                        <span>Shop</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Shop Section Begin -->
    <section class="shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <!--sidebar section --->
                    @include('components.shopsidebar')
                </div>
                <div class="col-lg-9 col-md-9">
                    <div class="row">
                        <!-- product section items start -->
                        @foreach ($products as $product)
                        <div class="col-lg-4 col-md-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="assets/img/shop/{{ $product->image }}">
                                    <div class="label new">{{ $product->category->name }}</div>
                                    <ul class="product__hover">
                                        <li><a href="assets/img/shop/{{ $product->image }}" class="image-popup"><span class="arrow_expand"></span></a></li>
                                        <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                                        <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="{{ route('product.show',[$product->slug]) }}">{{ $product->name }}</a></h6>
                                    <div class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <div class="product__price">$ {{ $product->regular_price }}</div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        
                        <!-- product section ends -->
                        {{$products->links("pagination.default")}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section End -->

    <!-- Instagram Begin -->
    
    <!-- Instagram End -->

    <form id="frmfliter" method="GET">
        <input type="hidden" name="brands" id="brands" value="{{ $q_brands }}">
    </form>
   
@endsection
<script>
    function filterProductsByBrand($brand)
        {
            var brands = "";
            $("input[name='brands']:checked").each(function(){
                if(brands == "")
                {
                    brands += this.value;
                }else{
                    brands += ";" + this.value;
                }
            });
            $("#brands").val(brands);
            $("#frmfliter").submit();
        }
</script>