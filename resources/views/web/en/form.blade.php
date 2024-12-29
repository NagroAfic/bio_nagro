<section class="form-price" id="quote">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6">
                <h2 class="text-white wow animate__animated  animate__fadeInDown">Get a quick quote  <br> without obligation</h2>
                <p class="text-white wow animate__animated  animate__fadeInLeftBigs">Fill out the form and receive a personalized quote in just a few minutes. <br> It's quick, easy and no obligation!</p>
            </div>
            <div class="col-12 col-md-6 d-flex justify-align-center align-items-center">
                <div class="card mb-4 wow animate__animated  animate__fadeInRightBig">
                    <div class="card-body p-2 wow animate__animated  animate__fadeInRightBig">
                        <form action="{{ route('contactoMail',["lang" => "en"]) }}" class="w-100">
                            @csrf
                            <div class="row">
                                <div class="col-12 mb-2">
                                    <div class="form-group">
                                        <label for="">Names</label>
                                        <input type="text" class="form-control" name="fullname" required>
                                    </div>
                                </div>
                                <div class="col-6 mb-2">
                                    <div class="form-group">
                                        <label for="">ID</label>
                                        <input type="text" class="form-control" name="idruc" required minlength="8" maxlength="11">
                                    </div>
                                </div>
                                <div class="col-6 mb-2">
                                    <div class="form-group">
                                        <label for="">Phone</label>
                                        <input type="tel" class="form-control" name="phone" required maxlength="11">
                                    </div>
                                </div>
                                <div class="col-12 mb-2">
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="email" class="form-control" name="email" required>
                                    </div>
                                </div>
                                <div class="col-12 mb-2">
                                    <div class="form-group">
                                        <label for="">Select the product</label>
                                        <select name="product_selected" id="" class="form-control">
                                            @foreach($productos as $key)
                                                @if(isset($product))
                                                    @if($key->id == $product->id)
                                                    <option value="{{$product->en_title}}">{{$product->en_title}}</option>
                                                    @endif
                                                @else
                                                    <option value="{{$key->en_title}}">{{$key->en_title}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6 mb-2">
                                    <div class="form-group">
                                        <label for="">Quantity</label>
                                        <input type="number" class="form-control" name="unit" required>
                                    </div>
                                </div>
                                <div class="col-6 mb-2">
                                    <div class="form-group">
                                        <label for="">Rent or sale</label>
                                        <select name="sales" id="" class="form-control">
                                            <option value="Rent">Rent</option>
                                            <option value="Sale">Sale</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="h-captcha" data-sitekey="247e60d2-3838-4fea-9478-35f62c5282da" data-callback="captchaCompleted"></div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100" id="form-cotizacion-sub" disabled>Send</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>