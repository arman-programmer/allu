@extends('common/layout')
@section('title')
    Список желаний
@endsection

@section('main_content')

    <div class="row">
        <div class="col-12">
            <div class="section-content">
                <h5 class="section-content__title">Your Wishlist items</h5>
            </div>
            <!-- Start Wishlist Table -->
            <div class="table-content table-responsive cart-table-content m-t-30">
                <table>
                    <thead>
                    <tr>
                        <th>Image</th>
                        <th>Product Name</th>
                        <th>Until Price</th>
                        <th>Qty</th>
                        <th>Subtotal</th>
                        <th>ADD TO CART</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="product-thumbnail">
                            <a href="#"><img class="img-fluid" src="assets/img/cart/cart-1.jpg" alt=""></a>
                        </td>
                        <td class="product-name"><a href="#">Product Name</a></td>
                        <td class="product-price-cart"><span class="amount">$60.00</span></td>
                        <td class="product-quantity">
                            <div class="quantity d-inline-block">
                                <input type="number" min="1" step="1" value="1">
                            </div>
                        </td>
                        <td class="product-subtotal">$70.00</td>
                        <td class="product-add-cart">
                            <a href="#modalAddCart" data-toggle="modal"
                               class="btn btn--box btn--small btn--blue btn--uppercase btn--weight">ADD TO CART</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="product-thumbnail">
                            <a href="#"><img class="img-fluid" src="assets/img/cart/cart-2.jpg" alt=""></a>
                        </td>
                        <td class="product-name"><a href="#">Product Name</a></td>
                        <td class="product-price-cart"><span class="amount">$50.00</span></td>
                        <td class="product-quantity">
                            <div class="quantity d-inline-block">
                                <input type="number" min="1" step="1" value="1">
                            </div>
                        </td>
                        <td class="product-subtotal">$80.00</td>
                        <td class="product-add-cart">
                            <a href="#modalAddCart" data-toggle="modal"
                               class="btn btn--box btn--small btn--blue btn--uppercase btn--weight">ADD TO CART</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="product-thumbnail">
                            <a href="#"><img class="img-fluid" src="assets/img/cart/cart-3.jpg" alt=""></a>
                        </td>
                        <td class="product-name"><a href="#">Product Name</a></td>
                        <td class="product-price-cart"><span class="amount">$70.00</span></td>
                        <td class="product-quantity">
                            <div class="quantity d-inline-block">
                                <input type="number" min="1" step="1" value="1">
                            </div>
                        </td>
                        <td class="product-subtotal">$90.00</td>
                        <td class="product-add-cart">
                            <a href="#modalAddCart" data-toggle="modal"
                               class="btn btn--box btn--small btn--blue btn--uppercase btn--weight">ADD TO CART</a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>  <!-- End Wishlist Table -->
        </div>
    </div>

    <!-- Start Modal Add cart -->
    <div class="modal fade" id="modalAddCart" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center">Product Successfully Added To Your Shopping Cart</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="modal__product-img">
                                            <img class="img-fluid"
                                                 src="assets/img/product/size-normal/product-home-1-img-1.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <span class="modal__product-title">SonicFuel Wireless Over-Ear Headphones</span>
                                        <span class="modal__product-price m-tb-15">$31.59</span>
                                        <ul class="modal__product-info ">
                                            <li>Size:<span> S</span></li>
                                            <li>Quantity:<span>3</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 modal__border">
                                <span class="modal__product-cart-item">There are 3 items in your cart.</span>
                                <ul class="modal__product-shipping-info m-tb-15">
                                    <li>Total products:<span>$94.78</span></li>
                                    <li>Total shipping:<span>$7.00</span></li>
                                    <li>Taxes:<span>$0.00</span></li>
                                    <li>Total: <span>$101.78 (tax excl.)</span></li>
                                </ul>

                                <div class="modal__product-cart-buttons">
                                    <a href="#" class="btn btn--box btn--large btn--blue btn--uppercase btn--weight"
                                       data-dismiss="modal">Continue Shopping</a>
                                    <a href="checkout.html"
                                       class="btn btn--box btn--large btn--blue btn--uppercase btn--weight">Process to
                                        checkout</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Modal Add cart -->
@endsection


