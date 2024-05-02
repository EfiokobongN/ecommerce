@extends('layouts.base')

@section('content')

    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{ route('app.index') }}"><i class="fa fa-home"></i> Home</a>
                        <span>Shopping cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Shop Cart Section Begin -->
    <section class="shop-cart spad">
       
            
        
        <div class="container">
            @if ($cartItems->count() > 0)
            <div class="row">
                <div class="col-lg-12">
                    <div class="shop__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cartItems as $item)
                                
                                <tr>
                                    <td class="cart__product__item">
                                        <a href="{{ route('product.show',[$item->model->slug]) }}">
                                            <img src="{{ asset('assets/img/shop') }}/{{ $item->model->image }}" width="110" height="110" alt="{{ $item->model->name }}">
                                        </a>
                                        <div class="cart__product__item__title">
                                            <h6>{{ $item->model->name }}</h6>
                                            <div class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="cart__price">$ {{ $item->price }}</td>
                                    <td class="cart__quantity">
                                        <div class="pro-qty">
                                            <input type="number" name="quantity" data-rowId="{{ $item->rowId }}" onchange="updateQuantity(this)" value="{{ $item->qty }}" class="input-number">
                                        </div>
                                    </td>
                                    <td class="cart__total">$ {{ $item->subtotal }}</td>

                                    <td >
                                        <a href="javascript:void(0)" class="cart__close" onclick="removeItemFromCart('{{ $item->rowId }}')"><span class="icon_close"></span>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--continue shopping apply -->
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="cart__btn3 site-btn text-white">
                        <a href="{{ route('shop.index') }}">Continue Shopping</a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="cart__btn update__btn">
                        <a href="javascript:void(0)" onclick="clearCart()"><span class="icon_loading"></span> Clear All Item</a>
                        
                    </div>
                </div>
            </div>
            <!--code apply -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="discount__content">
                        <h6>Discount codes</h6>
                        <form action="#">
                            <input type="text" placeholder="Enter your coupon code">
                            <button type="submit" class="site-btn">Apply</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 offset-lg-2">
                    <div class="cart__total__procced">
                        <h6>Cart total</h6>
                        <ul>
                            <li>Subtotal <span>$ {{ Cart::instance('cart')->subtotal() }}</span></li>
                            <li>Tax <span>$ {{ Cart::instance('cart')->tax() }}</span></li>
                            <li>Total <span>$ {{ Cart::instance('cart')->total() }}</span></li>
                        </ul>
                        <a href="#" class="primary-btn">Proceed to checkout</a>
                    </div>
                </div>
            </div>
            <!--code apply ends -->

            @else
               <div class="row">
                
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <h4>No Items Found In Your Shopping Cart</h4>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="cart__btn3 site-btn text-white">
                        <a href="{{ route('shop.index') }}">Go Shopping</a>
                    </div>
                </div>
            </div>  
           @endif
        </div>

       
    </section>
    <!-- Shop Cart Section End -->

    <form method="POST" action="{{ route('product.update') }}" id="updateCartQty">
        @csrf
        @method('put')
        <input type="hidden" id="rowId" name="rowId" >
        <input type="hidden" name="quantity" id="quantity">
    </form>

    <form method="POST" action="{{ route('product.delete') }}" id="deleteFromCart">
        @csrf
        @method('delete')
        <input type="hidden" id="rowId_D" name="rowId" >
    </form>
    <form method="POST" action="{{ route('product.clear') }}" id="clearCart">
        @csrf
        @method('delete')
        <input type="hidden" id="rowId_D" name="rowId" >
    </form>
@endsection

@push('scripts')
<script>
    function updateQuantity(qty)
    {
        $('#rowId').val($(qty).data('rowid'));
        $('#quantity').val($(qty).val());
        $('#updateCartQty').submit();
    }   
    function removeItemFromCart(rowId) 
     {
        $('#rowId_D').val(rowId);
        $('#deleteFromCart').submit();
    }
    function clearCart()
    {
        $('#clearCart').submit();
    }
</script>
@endpush