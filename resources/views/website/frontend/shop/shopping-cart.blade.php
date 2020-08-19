<!doctype html>
<html lang="zxx">
@include('website.frontend.layouts.head')


<body>
@include('website.frontend.layouts.header')
  <main>
      <!-- Hero Area Start-->
      <div class="slider-area ">
          <div class="single-slider slider-height2 d-flex align-items-center">
              <div class="container">
                  <div class="row">
                      <div class="col-xl-12">
                          <div class="hero-cap text-center">
                              <h2>Cart List</h2>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!--================Cart Area =================-->
@if (Session::has('cart'))
<section class="cart_area section_padding">
    <div class="container">
      <div class="cart_inner">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Product</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total</th>
              </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
              <tr>
                <td>
                  <div class="media">
                    <div class="d-flex">
                    <img src="{{asset('images'.$product['item']['img'])}}" alt="" />
                    </div>
                    <div class="media-body">
                      <p>{{$product['item']['product_name']}}</p>
                    </div>
                  </div>
                </td>
                <td>
                <h5>{{$product['price']}}</h5>
                </td>
                <td>
                  <div class="product_count">
                    <span class="input-number-decrement"> <i class="ti-minus"></i></span>
                  <input class="input-number" type="text" value="{{$product['qty']}}" >
                    <span class="input-number-increment"> <i class="ti-plus"></i></span>
                  </div>
                </td>

              </tr>
              @endforeach
              {{-- <tr>
                <td>
                  <div class="media">
                    <div class="d-flex">
                      <img src="assets/img/gallery/card2.png" alt="" />
                    </div>
                    <div class="media-body">
                      <p>Minimalistic shop for multipurpose use</p>
                    </div>
                  </div>
                </td>
                <td>
                  <h5>$360.00</h5>
                </td>
                <td>
                  <div class="product_count">
                      <span class="input-number-decrement"> <i class="ti-minus"></i></span>
                      <input class="input-number" type="text" value="1" min="0" max="10">
                      <span class="input-number-increment"> <i class="ti-plus"></i></span>
                  </div>
                </td>
                <td>
                  <h5>$720.00</h5>
                </td>
              </tr> --}}
              {{-- <tr class="bottom_button">
                <td>
                  <a class="btn_1" href="#">Update Cart</a>
                </td>
                <td></td>
                <td></td>
                <td>
                  <div class="cupon_text float-right">
                    <a class="btn_1" href="#">Close Coupon</a>
                  </div>
                </td>
              </tr> --}}
              <tr>
                <td></td>
                <td></td>
                <td>
                  <h5>All Total</h5>
                </td>
                <td>
                  <h5>${{$totalPrice}}</h5>
                </td>
              </tr>

            </tbody>
          </table>
          <div class="checkout_btn_inner float-right">
          <a class="btn_1 checkout_btn_1" href="{{route('website.checkout')}}">Proceed to checkout</a>
          </div>
        </div>
      </div>
  </section>
@else

@endif

      <!--================End Cart Area =================-->
  </main>
  <footer>
      <!-- Footer Start-->
      <div class="footer-area footer-padding">
          <div class="container">
              <div class="row d-flex justify-content-between">
                  <div class="col-xl-3 col-lg-3 col-md-5 col-sm-6">
                      <div class="single-footer-caption mb-50">
                          <div class="single-footer-caption mb-30">
                              <!-- logo -->
                              <div class="footer-logo">
                                  <a href="index.html"><img src="assets/img/logo/logo2_footer.png" alt=""></a>
                              </div>
                              <div class="footer-tittle">
                                  <div class="footer-pera">
                                      <p>Asorem ipsum adipolor sdit amet, consectetur adipisicing elitcf sed do eiusmod tem.</p>
                              </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-xl-2 col-lg-3 col-md-3 col-sm-5">
                      <div class="single-footer-caption mb-50">
                          <div class="footer-tittle">
                              <h4>Quick Links</h4>
                              <ul>
                                  <li><a href="#">About</a></li>
                                  <li><a href="#"> Offers & Discounts</a></li>
                                  <li><a href="#"> Get Coupon</a></li>
                                  <li><a href="#">  Contact Us</a></li>
                              </ul>
                          </div>
                      </div>
                  </div>
                  <div class="col-xl-3 col-lg-3 col-md-4 col-sm-7">
                      <div class="single-footer-caption mb-50">
                          <div class="footer-tittle">
                              <h4>New Products</h4>
                              <ul>
                                  <li><a href="#">Woman Cloth</a></li>
                                  <li><a href="#">Fashion Accessories</a></li>
                                  <li><a href="#"> Man Accessories</a></li>
                                  <li><a href="#"> Rubber made Toys</a></li>
                              </ul>
                          </div>
                      </div>
                  </div>
                  <div class="col-xl-3 col-lg-3 col-md-5 col-sm-7">
                      <div class="single-footer-caption mb-50">
                          <div class="footer-tittle">
                              <h4>Support</h4>
                              <ul>
                                  <li><a href="#">Frequently Asked Questions</a></li>
                                  <li><a href="#">Terms & Conditions</a></li>
                                  <li><a href="#">Privacy Policy</a></li>
                                  <li><a href="#">Report a Payment Issue</a></li>
                              </ul>
                          </div>
                      </div>
                  </div>
              </div>
              <!-- Footer bottom -->
              <div class="row align-items-center">
                  <div class="col-xl-7 col-lg-8 col-md-7">
                      <div class="footer-copy-right">
                          <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                      </div>
                  </div>
                  <div class="col-xl-5 col-lg-4 col-md-5">
                      <div class="footer-copy-right f-right">
                          <!-- social -->
                          <div class="footer-social">
                              <a href="#"><i class="fab fa-twitter"></i></a>
                              <a href="https://www.facebook.com/sai4ull"><i class="fab fa-facebook-f"></i></a>
                              <a href="#"><i class="fab fa-behance"></i></a>
                              <a href="#"><i class="fas fa-globe"></i></a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!-- Footer End-->
  </footer>
  <!--? Search model Begin -->
  <div class="search-model-box">
      <div class="h-100 d-flex align-items-center justify-content-center">
          <div class="search-close-btn">+</div>
          <form class="search-model-form">
              <input type="text" id="search-input" placeholder="Searching key.....">
          </form>
      </div>
  </div>
  <!-- Search model end -->

  <!-- JS here -->

  @include('website.frontend.layouts.foot')
</body>
</html>
