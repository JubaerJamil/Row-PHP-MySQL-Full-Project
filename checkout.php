<?php include 'layout/header.php'; ?>

<div class="d-flex gap-6">
  <!-- sidebar start -->
  <?php include 'layout/sidebar.php'; ?>
  <!-- sidebar end -->

  <div class="main-content w-100">
    <!-- top header  -->
    <?php include 'layout/responsive_top_Header.php';?>

    <!-- bottom header  -->
    <?php include 'layout/responsive_bottom_Header.php';?>

    <!-- color palettes btns -->
    <?php include 'layout/color_palettes.php';?>

      <!-- Checkout section start -->
      <section class="pt-120 pb-120 mt-10 mt-lg-0">
        <div class="container">
          <div class="row g-6 g-xxl-12">
            <div class="col-lg-6 order-2">
              <form class="d-flex flex-column gap-4 gap-md-8">
                <!-- contact  -->
                <div class="brn4 p-3 p-md-5 rounded">
                  <h5 class="fs-six fw-medium n5-color mb-3 mb-md-5">
                    Contact
                  </h5>
                  <input type="text" placeholder="Email or mobile number" required
                    class="brn4 p-3 n5-color mb-2 mb-md-3" />
                  <div class="d-flex align-items-center gap-2">
                    <input type="checkbox" id="check" class="cursor-pointer fs-six" />
                    <label for="check" class="n4-color fs-eight cursor-pointer">Email me with news and offers</label>
                  </div>
                </div>
                <!-- Delivery -->
                <div class="brn4 p-3 p-md-5 rounded">
                  <h5 class="fs-six fw-medium n5-color mb-3 mb-md-5">
                    Delivery
                  </h5>
                  <!-- select options  -->
                  <div class="select-box mb-3 mb-md-5">
                    <div class="options-container">
                      <div class="option">
                        <input type="radio" class="radio" id="grade-a" name="category" />
                        <label for="grade-a">
                          <span>Bangladesh</span>
                        </label>
                      </div>

                      <div class="option">
                        <input type="radio" class="radio" id="grade-b" name="category" />
                        <label for="grade-b">
                          <span>India</span>
                        </label>
                      </div>

                      <div class="option">
                        <input type="radio" class="radio" id="grade-c" name="category" />
                        <label for="grade-c">
                          <span>Australia</span>
                        </label>
                      </div>
                      <div class="option">
                        <input type="radio" class="radio" id="grade-d" name="category" />
                        <label for="grade-d">
                          <span>China</span>
                        </label>
                      </div>
                    </div>

                    <div class="selected">
                      <span>Select Your Country</span>
                    </div>
                  </div>
                  <div
                    class="d-flex flex-wrap flex-xxl-nowrap align-items-center gap-2 gap-md-3 my-2 my-md-3 my-2 my-md-3">
                    <input type="text" placeholder="First Name" class="brn4 p-3 n5-color" />
                    <input type="text" placeholder="Last Name" required class="brn4 p-3 n5-color" />
                  </div>
                  <input type="text" placeholder="Company (optional)" class="brn4 p-3 n5-color my-2 my-md-3" />
                  <input type="text" placeholder="Address" required class="brn4 p-3 n5-color my-2 my-md-3" />
                  <input type="text" placeholder="Apartment, suite, etc. (optional)"
                    class="brn4 p-3 n5-color my-2 my-md-3" />
                  <div
                    class="d-flex flex-wrap flex-xxl-nowrap align-items-center gap-2 gap-md-3 my-2 my-md-3 my-2 my-md-3">
                    <input type="text" placeholder="City" required class="brn4 p-3 n5-color" />
                    <input type="text" placeholder="Postal Code (optional)" class="brn4 p-3 n5-color" />
                  </div>
                  <input type="number" placeholder="Phone" required class="brn4 p-3 n5-color my-2 my-md-3" />
                  <div class="d-flex align-items-center gap-2">
                    <input type="checkbox" id="check1" class="cursor-pointer fs-six" />
                    <label for="check1" class="n4-color fs-eight cursor-pointer">Save this information for next
                      time</label>
                  </div>
                </div>
                <!-- Shipping  -->
                <div class="brn4 p-3 p-md-5 rounded">
                  <h5 class="fs-six fw-medium n5-color mb-3 mb-md-5">
                    Shipping method
                  </h5>

                  <div class="radioBtn d-flex gap-2 align-items-center brn4 px-2 px-md-3 rounded w-100 mb-2 mb-md-3">
                    <input type="radio" required class="brn4 p-3 n5-color my-2 my-md-3 w-max" id="radio1"
                      name="radio" />
                    <label for="radio1"
                      class="cursor-pointer n5-color d-flex justify-content-between align-items-center py-1 py-md-2 w-100">Inside
                      Dhaka City
                      <span class="n5-color">Free</span>
                    </label>
                  </div>

                  <div class="radioBtn d-flex gap-2 align-items-center brn4 px-2 px-md-3 rounded w-100">
                    <input type="radio" required class="brn4 p-3 n5-color my-2 my-md-3 w-max" id="radio2"
                      name="radio" />
                    <label for="radio2"
                      class="cursor-pointer n5-color d-flex justify-content-between align-items-center py-1 py-md-2 w-100">Outside
                      Dhaka City
                      <span class="n5-color">$20USD</span>
                    </label>
                  </div>
                </div>
                <!-- Payment -->
                <div class="brn4 p-3 p-md-5 rounded">
                  <h5 class="fs-six fw-medium n5-color">Payment</h5>
                  <p class="n4-color fs-eight mb-3 mb-md-5">
                    All transactions are secure and encrypted.
                  </p>

                  <div class="d-flex flex-column gap-2 gap-md-3">
                    <div class="radio-wrapper position-relative">
                      <div class="radioBtn active d-flex gap-2 align-items-center brn4 px-2 px-md-3 rounded w-100">
                        <input type="radio" required class="payment brn4 p-3 n5-color my-2 my-md-3 w-max" id="py1"
                          name="pay" checked="checked" />
                        <label for="py1" class="cursor-pointer n5-color py-1 py-md-2 w-100">Cash on Delivery (COD)
                        </label>
                      </div>
                      <div class="radio-content p-2 rounded">
                        <p class="n5-color text-center">
                          Only applicable INSIDE DHAKA CITY
                        </p>
                      </div>
                    </div>

                    <div class="radio-wrapper position-relative">
                      <div class="radioBtn d-flex gap-2 align-items-center brn4 px-2 px-md-3 rounded w-100">
                        <input type="radio" required class="payment brn4 p-3 n5-color my-2 my-md-3 w-max" id="py2"
                          name="pay" />
                        <label for="py2" class="cursor-pointer n5-color py-1 py-md-2 w-100">
                          Bkash Payment
                        </label>
                      </div>
                      <div class="radio-content p-2 rounded">
                        <span class="n5-color d-block">Pay with your bkash wallet</span>
                        <span class="n5-color d-block">4004911111 - Merchant Account (Make Payment)</span>
                        <span class="n5-color d-block">Put your order ID as reference number</span>
                      </div>
                    </div>
                    <div class="radio-wrapper position-relative">
                      <div class="radioBtn d-flex gap-2 align-items-center brn4 px-2 px-md-3 rounded w-100">
                        <input type="radio" required class="payment brn4 p-3 n5-color my-2 my-md-3 w-max" id="py3"
                          name="pay" />
                        <label for="py3" class="cursor-pointer n5-color py-1 py-md-2 w-100">
                          Bank Transfer - BEFTN/NPSB
                        </label>
                      </div>
                      <div class="radio-content p-2 rounded">
                        <span class="n5-color d-block">You can transfer the invoice amount to following
                          Bank Account :</span>
                        <span class="n5-color d-block">Bank Name: City Bank Bangladesh</span>
                        <span class="n5-color d-block">Account Name: GRID Ventures Ltd</span>
                        <span class="n5-color d-block">Account Number: 1003615365001</span>
                        <span class="n5-color d-block">Branch Name: Banani Branch</span>
                        <span class="n5-color d-block">Please call us at 014044-330 to confirm the payment
                          after the transfer.</span>
                      </div>
                    </div>
                    <div class="radio-wrapper position-relative">
                      <div class="radioBtn d-flex gap-2 align-items-center brn4 px-2 px-md-3 rounded w-100">
                        <input type="radio" required class="payment brn4 p-3 n5-color my-2 my-md-3 w-max" id="py4"
                          name="pay" />
                        <label for="py4" class="cursor-pointer n5-color py-1 py-md-2 w-100">
                          Cash On Delivery - Outside Dhaka
                        </label>
                      </div>
                      <div class="radio-content p-2 rounded">
                        <p class="n5-color d-block">
                          Minimum 10% of total invoice amount + shipping
                          charge needs to be paid in Advance.
                        </p>
                      </div>
                    </div>
                    <div class="radio-wrapper position-relative">
                      <div class="radioBtn d-flex gap-2 align-items-center brn4 px-2 px-md-3 rounded w-100">
                        <input type="radio" required class="payment brn4 p-3 n5-color my-2 my-md-3 w-max" id="py5"
                          name="pay" />
                        <label for="py5" class="cursor-pointer n5-color py-1 py-md-2 w-100">
                          EMI - Credit Card
                        </label>
                      </div>
                      <div class="radio-content p-2 rounded">
                        <span class="n5-color d-block">EMI available for following bank credit card:</span>
                        <span class="n5-color d-block">Eastern Bank Limited</span>
                        <span class="n5-color d-block">LankaBangla Finance Limited</span>
                        <span class="n5-color d-block">United Commercial Bank</span>
                        <span class="n5-color d-block">Dutch Bangla Bank Ltd.</span>
                        <span class="n5-color d-block">BRAC Bank</span>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Billing address -->
                <div class="brn4 p-3 p-md-5 rounded">
                  <h5 class="fs-six fw-medium n5-color mb-3 mb-md-5">
                    Billing address
                  </h5>
                  <div class="d-flex flex-column gap-2 gap-md-3">
                    <div class="radio-wrapper position-relative">
                      <div class="radioBtn active d-flex gap-2 align-items-center brn4 px-2 px-md-3 rounded w-100">
                        <input type="radio" required class="billing brn4 p-3 n5-color my-2 my-md-3 w-max" id="py11"
                          name="billing" checked="checked" />
                        <label for="py11" class="cursor-pointer n5-color py-1 py-md-2 w-100">Same as shipping address
                        </label>
                      </div>
                      <div class="radio-content rounded"></div>
                    </div>
                    <div class="radio-wrapper position-relative">
                      <div class="radioBtn d-flex gap-2 align-items-center brn4 px-2 px-md-3 rounded w-100">
                        <input type="radio" required class="billing brn4 p-3 n5-color my-2 my-md-3 w-max" id="py22"
                          name="billing" />
                        <label for="py22" class="cursor-pointer n5-color py-1 py-md-2 w-100">
                          Use a different billing address
                        </label>
                      </div>
                      <div class="radio-content p-3 rounded">
                        <div class="select-box my-2 my-md-3 bgn1-color">
                          <div class="options-container">
                            <div class="option">
                              <input type="radio" class="radio" id="grade-aa" name="category" />
                              <label for="grade-aa">
                                <span>Bangladesh</span>
                              </label>
                            </div>

                            <div class="option">
                              <input type="radio" class="radio" id="grade-bb" name="category" />
                              <label for="grade-bb">
                                <span>India</span>
                              </label>
                            </div>

                            <div class="option">
                              <input type="radio" class="radio" id="grade-cc" name="category" />
                              <label for="grade-cc">
                                <span>Australia</span>
                              </label>
                            </div>
                            <div class="option">
                              <input type="radio" class="radio" id="grade-dd" name="category" />
                              <label for="grade-dd">
                                <span>China</span>
                              </label>
                            </div>
                          </div>

                          <div class="selected">
                            <span>Select Your Country</span>
                          </div>
                        </div>
                        <div
                          class="d-flex flex-wrap flex-xxl-nowrap align-items-center gap-2 gap-md-3 my-2 my-md-3 my-2 my-md-3">
                          <input type="text" placeholder="First Name" class="brn4 p-3 n5-color bgn1-color" />
                          <input type="text" placeholder="Last Name" required class="brn4 p-3 n5-color bgn1-color" />
                        </div>
                        <input type="text" placeholder="Company (optional)"
                          class="brn4 p-3 n5-color my-2 my-md-3 bgn1-color" />
                        <input type="text" placeholder="Address" required
                          class="brn4 p-3 n5-color my-2 my-md-3 bgn1-color" />
                        <input type="text" placeholder="Apartment, suite, etc. (optional)"
                          class="brn4 p-3 n5-color my-2 my-md-3 bgn1-color" />
                        <div
                          class="d-flex flex-wrap flex-xxl-nowrap align-items-center gap-2 gap-md-3 my-2 my-md-3 my-2 my-md-3">
                          <input type="text" placeholder="City" required class="brn4 p-3 n5-color bgn1-color" />
                          <input type="text" placeholder="Postal Code (optional)"
                            class="brn4 p-3 n5-color bgn1-color" />
                        </div>
                        <input type="number" placeholder="Phone" required
                          class="brn4 p-3 n5-color my-2 my-md-3 bgn1-color" />
                      </div>
                    </div>
                  </div>
                </div>

                <button class="primary-btn w-100 py-3 py-md-4">
                  Complete Order
                </button>
              </form>
            </div>

            <div class="col-lg-6 order-1 order-lg-2">
              <div class="bgn2-color p-3 p-sm-6 p-md-10 h-100 br-left-n4 rounded">
                <div class="checkout-right brn4 p-3 p-md-5 rounded">
                  <div class="d-flex align-items-start gap-4 mb-3 mb-md-5">
                    <img src="assets/images/blog4.png" alt="..." class="add-cart-img" />
                    <div class="d-flex flex-wrap gap-2 align-items-center justify-content-between w-100">
                      <div>
                        <h5 class="fs-seven fw-medium n5-color mb-2">
                          Unleashing Creativity in Code
                        </h5>
                        <div class="d-flex gap-1 align-items-center">
                          <span class="discrement fs-eight n5-color cursor-pointer">
                            <i class="ph-bold ph-minus"></i>
                          </span>
                          <span class="product-count fs-eight fw-semibold n5-color py-1 px-2 brn4 rounded">1</span>
                          <span class="increment fs-eight n5-color cursor-pointer">
                            <i class="ph-bold ph-plus"></i>
                          </span>
                        </div>
                      </div>
                      <span class="fs-eight p1-color d-block">$120.00 USD</span>
                    </div>
                  </div>

                  <div class="d-flex gap-4 align-items-start mb-3 mb-md-5">
                    <img src="assets/images/blog5.png" alt="..." class="add-cart-img" />
                    <div class="d-flex flex-wrap gap-2 align-items-center justify-content-between w-100">
                      <div>
                        <h5 class="fs-seven fw-medium n5-color mb-2">
                          Mastering Modern Development
                        </h5>
                        <div class="d-flex gap-1 align-items-center">
                          <span class="discrement fs-eight n5-color cursor-pointer">
                            <i class="ph-bold ph-minus"></i>
                          </span>
                          <span class="product-count fs-eight fw-semibold n5-color py-1 px-2 brn4 rounded">1</span>
                          <span class="increment fs-eight n5-color cursor-pointer">
                            <i class="ph-bold ph-plus"></i>
                          </span>
                        </div>
                      </div>
                      <span class="fs-eight p1-color d-block">$100.00 USD</span>
                    </div>
                  </div>

                  <form
                    class="d-flex flex-wrap flex-sm-nowrap flex-lg-wrap flex-xl-nowrap align-items-center gap-2 mt-3 mt-md-6">
                    <input type="text" class="brn4 p-3 n5-color" placeholder="Discount code" />
                    <button class="p-3 bg1-color rounded n11-color">
                      Apply
                    </button>
                  </form>
                  <div class="mt-3 mt-md-6">
                    <span class="d-flex align-items-center gap-2 justify-content-between mb-1">
                      <span class="n5-color">Subtotal:</span>
                      <span class="n5-color">$220.00 USD</span>
                    </span>
                    <span class="d-flex align-items-center gap-2 justify-content-between">
                      <span class="n5-color">Shipping:</span>
                      <span class="n5-color">Free</span>
                    </span>
                    <span class="line-divider"></span>
                    <span class="d-flex align-items-center gap-2 justify-content-between">
                      <span class="fw-medium fs-five n5-color">Total:</span>
                      <span class="n5-color fw-medium">$220.00 USD</span>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Checkout section end -->

      <!-- footer section start -->
      <?php include 'layout/footer.php';?>