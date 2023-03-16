@extends('frontend.layouts.app')
@section('title', 'Cart')

@section('content')


    <!-- banner section start  -->

    <!-- Blog Section Start  -->
    <section class="blog">
        <div class="container">

            @php
                $total = 0;
            @endphp

            <div class="row">
                <div class="col-lg-8">
                    <article id="post-6" class="post-6 page type-page status-publish hentry">
                        <!-- .entry-header -->
                        <div class="entry-content">
                            <div class="woocommerce">
                                <div class="woocommerce-notices-wrapper"></div>
                                <form class="woocommerce-cart-form" action="" method="">
                                    <table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents"
                                        cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th class="product-thumbnail">Image</th>
                                                <th class="product-name">Course</th>
                                                <th class="product-price">Price</th>
                                                <th class="product-remove">Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($carts as $cart)
                                                @php
                                                    $total += $cart->course->price;
                                                @endphp

                                                <tr class="woocommerce-cart-form__cart-item cart_item">
                                                    <td class="product-thumbnail">
                                                        <a href="#"><img width="324" height="324"
                                                                src="{{ asset('upload/course/thumbnail') }}/{{ $cart->course->image }}"
                                                                class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail"
                                                                alt=""></a>
                                                    </td>

                                                    <td class="product-name" data-title="Product">
                                                        <a href="#">{{ $cart->course->title }}</a>
                                                    </td>

                                                    <td class="product-price" data-title="Price">
                                                        <span
                                                            class="woocommerce-Price-amount amount">{{ $cart->course->price }}<span
                                                                class="woocommerce-Price-currencySymbol">Tk</span></span>
                                                    </td>

                                                    <td class="product-remove">
                                                        <a href="{{ route('front.cart.delete', $cart->id) }}" class="remove"
                                                            aria-label="Remove this item" data-product_id="30"
                                                            data-product_sku="">×</a>
                                                    </td>


                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </form>
                            </div>
                        </div><!-- .entry-content -->
                    </article>
                </div>

                <div class="col-lg-4">
                    <div class="cart-collaterals">
                        <div class="cart_totals ">
                            <h2>Cart totals</h2>
                            <table cellspacing="0" class="shop_table shop_table_responsive">
                                <tbody>
                                    <tr class="cart-subtotal">
                                        <th>Subtotal</th>
                                        <td data-title="Subtotal"><span class="woocommerce-Price-amount amount">{{ $total }} <span
                                                    class="woocommerce-Price-currencySymbol">Tk</span></span>
                                        </td>
                                    </tr>
                                    <tr class="order-total">
                                        <th>Total</th>
                                        <td data-title="Total"><strong><span class="woocommerce-Price-amount amount">{{ $total }} <span
                                                    class="woocommerce-Price-currencySymbol">Tk</span></span></strong>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="wc-proceed-to-checkout">
                                <a id="bKash_button" href="{{ route('front.checkout') }}" class="checkout-button button alt wc-forward">
                                    Proceed to checkout
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- Blog Section End  -->

@endsection


