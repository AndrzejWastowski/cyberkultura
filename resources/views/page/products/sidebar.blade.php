<div class="col-lg-3 col-md-12 sidebar mt-8 mt-lg-0">
    <div class="shadow-sm p-5">
        <div class="widget widget-categories mb-4 pb-4 border-bottom">
            <h4 class="widget-title mb-3">{{ trans('messages.Categories') }}</h4>
            <div id="accordion" class="accordion">
                <div class="card border-0 mb-3">
                    <div class="card-header">
                        <h6 class="mb-0">
                            <a class="link-title" data-bs-toggle="collapse"
                                data-bs-parent="#accordion" href="#collapse1"
                                aria-expanded="true">{{ trans('messages.dedicated_products') }}</a>
                        </h6>
                    </div>
                    <div id="collapse1" class="collapse show" data-bs-parent="#accordion">
                        <div class="card-body text-muted">
                            <ul class="list-unstyled">

                                @foreach ($productsCategory as $category)
                                    <li>
                                        <a class="link-title" href="{{ route('products.category',['name'=>$category->translations_locale->first()->name,'category'=>$category]) }}">{{ $category->translations_locale->first()->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card border-0 mb-3">
                    <div class="card-header">
                        <h6 class="mb-0">
                            <a class="link-title" data-bs-toggle="collapse"
                                data-bs-parent="#accordion" href="#collapse2">Footwear</a>
                        </h6>
                    </div>
                    <div id="collapse2" class="collapse" data-bs-parent="#accordion">
                        <div class="card-body text-muted">
                            <ul class="list-unstyled">
                                <li><a href="#">Men's Footwear</a>
                                </li>
                                <li><a href="#">Women's Footwear</a>
                                </li>
                                <li><a href="#">Kid's Footwear</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card border-0 mb-3">
                    <div class="card-header">
                        <h6 class="mb-0">
                            <a class="link-title" data-bs-toggle="collapse"
                                data-bs-parent="#accordion" href="#collapse3">Clothing</a>
                        </h6>
                    </div>
                    <div id="collapse3" class="collapse" data-bs-parent="#accordion">
                        <div class="card-body text-muted">
                            <ul class="list-unstyled">
                                <li><a href="#">T-Shirts</a>
                                </li>
                                <li><a href="#">Shirts</a>
                                </li>
                                <li><a href="#">Dresses & Skirts</a>
                                </li>
                                <li><a href="#">Leggings & Jeggings</a>
                                </li>
                                <li><a href="#">Polos & T-Shirts</a>
                                </li>
                                <li><a href="#">Jeans</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card border-0 mb-3">
                    <div class="card-header">
                        <h6 class="mb-0">
                            <a class="link-title" data-bs-toggle="collapse"
                                data-bs-parent="#accordion" href="#collapse4">Watches</a>
                        </h6>
                    </div>
                    <div id="collapse4" class="collapse" data-bs-parent="#accordion">
                        <div class="card-body text-muted">
                            <ul class="list-unstyled">
                                <li><a href="#">Fastrack</a>
                                </li>
                                <li><a href="#">Casio</a>
                                </li>
                                <li><a href="#">Titan</a>
                                </li>
                                <li><a href="#">Motion</a>
                                </li>
                                <li><a href="#">Sonata</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card border-0 mb-3">
                    <div class="card-header">
                        <h6 class="mb-0">
                            <a class="link-title" data-bs-toggle="collapse"
                                data-bs-parent="#accordion" href="#collapse5">Bags</a>
                        </h6>
                    </div>
                    <div id="collapse5" class="collapse" data-bs-parent="#accordion">
                        <div class="card-body text-muted">
                            <ul class="list-unstyled">
                                <li><a href="#">Handbags</a>
                                </li>
                                <li><a href="#">Shoulder Bags</a>
                                </li>
                                <li><a href="#">Sling bags</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card border-0">
                    <div class="card-header">
                        <h6 class="mb-0">
                            <a class="link-title" data-bs-toggle="collapse"
                                data-bs-parent="#accordion" href="#collapse6">Accessories</a>
                        </h6>
                    </div>
                    <div id="collapse6" class="collapse" data-bs-parent="#accordion">
                        <div class="card-body text-muted">
                            <ul class="list-unstyled">
                                <li><a href="#">Backpacks</a>
                                </li>
                                <li><a href="#">Sunglasses</a>
                                </li>
                                <li><a href="#">Wallets & Belts</a>
                                </li>
                                <li><a href="#">Jewellery</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="widget widget-price mb-4 pb-4 border-bottom">
            <h4 class="widget-title mb-3">Price</h4>
            <div class="form-check mb-2">
                <input type="checkbox" class="form-check-input" id="priceCheck1">
                <label class="form-check-label" for="priceCheck1">$10 - $100</label>
            </div>
            <div class="form-check mb-2">
                <input type="checkbox" class="form-check-input" id="priceCheck2">
                <label class="form-check-label" for="priceCheck2">$100 - $200</label>
            </div>
            <div class="form-check mb-2">
                <input type="checkbox" class="form-check-input" id="priceCheck3">
                <label class="form-check-label" for="priceCheck3">$200 - $300</label>
            </div>
            <div class="form-check mb-2">
                <input type="checkbox" class="form-check-input" id="priceCheck4">
                <label class="form-check-label" for="priceCheck4">$300 - $400</label>
            </div>
            <div class="form-check mb-2">
                <input type="checkbox" class="form-check-input" id="priceCheck5">
                <label class="form-check-label" for="priceCheck5">$400 - $500</label>
            </div>
        </div>
        <div class="widget widget-brand mb-4 pb-4 border-bottom">
            <h4 class="widget-title mb-3">Brand</h4>
            <div class="form-check mb-2">
                <input type="checkbox" class="form-check-input" id="brandCheck1">
                <label class="form-check-label" for="brandCheck1">Raymond</label>
            </div>
            <div class="form-check mb-2">
                <input type="checkbox" class="form-check-input" id="brandCheck2">
                <label class="form-check-label" for="brandCheck2">Adidas</label>
            </div>
            <div class="form-check mb-2">
                <input type="checkbox" class="form-check-input" id="brandCheck3">
                <label class="form-check-label" for="brandCheck3">Levi's</label>
            </div>
            <div class="form-check mb-2">
                <input type="checkbox" class="form-check-input" id="brandCheck4">
                <label class="form-check-label" for="brandCheck4">Reebok</label>
            </div>
            <div class="form-check mb-2">
                <input type="checkbox" class="form-check-input" id="brandCheck5">
                <label class="form-check-label" for="brandCheck5">Killer</label>
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="brandCheck6">
                <label class="form-check-label" for="brandCheck6">John Players</label>
            </div>
        </div>
        <div class="widget widget-color mb-4 pb-4 border-bottom">
            <h4 class="widget-title mb-3">Color</h4>
            <ul class="list-inline">
                <li>
                    <div class="form-check ps-0">
                        <input type="radio" class="form-check-input" id="color-filter1"
                            name="Radios">
                        <label class="form-check-label" for="color-filter1"
                            data-bg-color="#3cb371"></label>
                    </div> <small>Green</small>
                </li>
                <li>
                    <div class="form-check ps-0">
                        <input type="radio" class="form-check-input" id="color-filter2"
                            name="Radios" checked>
                        <label class="form-check-label" for="color-filter2"
                            data-bg-color="#4876ff"></label>
                    </div> <small>Blue</small>
                </li>
                <li>
                    <div class="form-check ps-0">
                        <input type="radio" class="form-check-input" id="color-filter3"
                            name="Radios">
                        <label class="form-check-label" for="color-filter3"
                            data-bg-color="#0a1b2b"></label>
                    </div> <small>Black</small>
                </li>
                <li>
                    <div class="form-check ps-0">
                        <input type="radio" class="form-check-input" id="color-filter4"
                            name="Radios">
                        <label class="form-check-label" for="color-filter4"
                            data-bg-color="#f94f15"></label>
                    </div> <small>Orange</small>
                </li>
                <li>
                    <div class="form-check ps-0">
                        <input type="radio" class="form-check-input" id="color-filter5"
                            name="Radios">
                        <label class="form-check-label" for="color-filter5"
                            data-bg-color="#FF00FF"></label>
                    </div> <small>Fuchsia</small>
                </li>
                <li>
                    <div class="form-check ps-0">
                        <input type="radio" class="form-check-input" id="color-filter6"
                            name="Radios">
                        <label class="form-check-label" for="color-filter6"
                            data-bg-color="#ffc300"></label>
                    </div> <small>Yellow</small>
                </li>
                <li>
                    <div class="form-check ps-0">
                        <input type="radio" class="form-check-input" id="color-filter7"
                            name="Radios">
                        <label class="form-check-label" for="color-filter7"
                            data-bg-color="#808080"></label>
                    </div> <small>Gray</small>
                </li>
                <li>
                    <div class="form-check ps-0">
                        <input type="radio" class="form-check-input" id="color-filter8"
                            name="Radios">
                        <label class="form-check-label" for="color-filter8"
                            data-bg-color="#008080"></label>
                    </div> <small>Teal</small>
                </li>
            </ul>
        </div>
        <div class="widget widget-size">
            <h4 class="widget-title mb-3">Size</h4>
            <ul class="list-inline clearfix">
                <li>
                    <input name="sc" id="xs-size" type="radio">
                    <label for="xs-size">XS</label>
                </li>
                <li>
                    <input name="sc" id="s-size" type="radio">
                    <label for="s-size">S</label>
                </li>
                <li>
                    <input name="sc" id="m-size" checked="" type="radio">
                    <label for="m-size">M</label>
                </li>
                <li>
                    <input name="sc" id="l-size" type="radio">
                    <label for="l-size">L</label>
                </li>
                <li>
                    <input name="sc" id="xl-size" type="radio">
                    <label for="xl-size">XL</label>
                </li>
                <li>
                    <input name="sc" id="xxl-size" type="radio">
                    <label for="xxl-size">XXL</label>
                </li>
                <li>
                    <input name="sc" id="3xl-size" type="radio">
                    <label for="3xl-size">3XL</label>
                </li>
                <li>
                    <input name="sc" id="4xl-size" type="radio">
                    <label for="4xl-size">4XL</label>
                </li>
                <li>
                    <input name="sc" id="5xl-size" type="radio">
                    <label for="5xl-size">5XL</label>
                </li>
                <li>
                    <input name="sc" id="36-size" type="radio">
                    <label for="36-size">36</label>
                </li>
                <li>
                    <input name="sc" id="38-size" type="radio">
                    <label for="38-size">38</label>
                </li>
                <li>
                    <input name="sc" id="39-size" type="radio">
                    <label for="39-size">39</label>
                </li>
                <li>
                    <input name="sc" id="40-size" type="radio">
                    <label for="40-size">40</label>
                </li>
                <li>
                    <input name="sc" id="42-size" type="radio">
                    <label for="42-size">42</label>
                </li>
                <li>
                    <input name="sc" id="44-size" type="radio">
                    <label for="44-size">44</label>
                </li>
            </ul>
        </div>
    </div>
</div>