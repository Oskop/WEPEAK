<!-- Banner -->
<div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
  <div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center">
      <div class="col-md-9 ftco-animate text-center">
        <p class="breadcrumbs"><span class="mr-2"><a href=".">Home</a></span> <span>Checkout</span></p>
        <h1 class="mb-0 bread">Checkout</h1>
      </div>
    </div>
  </div>
</div>
<!-- End of Banner -->

<!-- Checkout Content -->
<section class="ftco-section">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-xl-4 ftco-animate">
        <form action="?page=done" class="billing-form">
          <h3 class="mb-4 billing-heading">Billing Details</h3>
          <div class="row align-items-end">
            <div class="col-md">
              <div class="form-group">
                <label for="firstname">Nama Pemesan</label>
                <input type="text" class="form-control" name="id_user" placeholder="">
              </div>
            </div>
            <div class="w-100"></div>
            <div class="col-md">
              <div class="form-group">
                <label for="streetaddress">Alamat</label>
                <input type="text" class="form-control" name="alamat" placeholder="House number and street name">
              </div>
            </div>
          </div>
        </form><!-- END -->
      </div>
      <div class="col-xl-8">
        <div class="row mt-5 pt-3">
          <div class="col-md-6 d-flex mb-5">
            <div class="cart-detail cart-total p-3 p-md-4">
              <h3 class="billing-heading mb-4">Cart Total</h3>
              <p class="d-flex">
                <span>Subtotal</span>
                <span>$20.60</span>
              </p>
              <p class="d-flex">
                <span>Delivery</span>
                <span>$0.00</span>
              </p>
              <p class="d-flex">
                <span>Discount</span>
                <span>$3.00</span>
              </p>
              <hr>
              <p class="d-flex total-price">
                <span>Total</span>
                <span>$17.60</span>
              </p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="cart-detail p-3 p-md-4">
              <h3 class="billing-heading mb-4">Payment Method</h3>
              <div class="form-group">
                <div class="col-md-12">
                  <div class="radio">
                     <label><input type="radio" name="optradio" class="mr-2"> Direct Bank Tranfer</label>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-12">
                  <div class="radio">
                     <label><input type="radio" name="optradio" class="mr-2"> Check Payment</label>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-12">
                  <div class="radio">
                     <label><input type="radio" name="optradio" class="mr-2"> Paypal</label>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-12">
                  <div class="checkbox">
                     <label><input type="checkbox" value="" class="mr-2"> I have read and accept the terms and conditions</label>
                  </div>
                </div>
              </div>
              <p><a href="#"class="btn btn-primary py-3 px-4">Place an order</a></p>
            </div>
          </div>
        </div>
      </div> <!-- .col-md-8 -->
    </div>
  </div>
</section> <!-- .section -->
<!-- End of Checkout Content -->
