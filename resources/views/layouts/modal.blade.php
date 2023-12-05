<!-- Cart Modal -->
<div class="modal fade cart-modal" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ModalLabel">Your Cart (2)</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div>
            <div class="row align-items-center">
              <div class="col-5 d-flex align-items-center">
                <div class="me-4">
                  <button type="submit" class="btn btn-primary btn-sm"><i class="las la-times"></i>
                  </button>
                </div>
                <!-- Image -->
                <a href="product-left-image.html">
                  <img class="img-fluid" src="assets/images/product/01.jpg" alt="...">
                </a>
              </div>
              <div class="col-7">
                <!-- Title -->
                <h6><a class="link-title" href="product-left-image.html">Women Lather Jacket</a></h6>
                <div class="product-meta"><span class="me-2 text-primary">$25.00</span><span class="text-muted">x 1</span>
                </div>
              </div>
            </div>
          </div>
          <hr class="my-5">
          <div>
            <div class="row align-items-center">
              <div class="col-5 d-flex align-items-center">
                <div class="me-4">
                  <button type="submit" class="btn btn-primary btn-sm"><i class="las la-times"></i>
                  </button>
                </div>
                <!-- Image -->
                <a href="product-left-image.html">
                  <img class="img-fluid" src="assets/images/product/13.jpg" alt="...">
                </a>
              </div>
              <div class="col-7">
                <!-- Title -->
                <h6><a class="link-title" href="product-left-image.html">Men's Brand Tshirts</a></h6>
                <div class="product-meta"><span class="me-2 text-primary">$27.00</span><span class="text-muted">x 1</span>
                </div>
              </div>
            </div>
          </div>
          <hr class="my-5">
          <div class="d-flex justify-content-between align-items-center mb-8"> <span class="text-muted">Subtotal:</span>  <span class="text-dark">$52.00</span> 
          </div> <a href="{{ route('page.cart.index') }}" class="btn btn-primary btn-animated me-2"><i class="las la-shopping-cart me-1"></i>Zobacz koszyk</a>
          <a href="product-checkout.html" class="btn btn-dark"><i class="las la-money-check me-1"></i>Kontynuuj zakupy</a>
        </div>
      </div>
    </div>
|</div>  