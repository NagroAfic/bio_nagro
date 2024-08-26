<section class="form-price" id="quote">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6">
                <h2 class="text-white">Get a quick quote  <br> without obligation</h2>
                <p class="text-white">Fill out the form and receive a personalized quote in just a few minutes. <br> It's quick, easy and no obligation!</p>
            </div>
            <div class="col-12 col-md-6 d-flex justify-align-center align-items-center">
                <div class="card mb-4">
                    <div class="card-body p-2">
                        <form action="" class="w-100">
                            <div class="row">
                                <div class="col-12 mb-2">
                                    <div class="form-group">
                                        <label for="">Names</label>
                                        <input type="text" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-6 mb-2">
                                    <div class="form-group">
                                        <label for="">ID</label>
                                        <input type="text" class="form-control" required maxlength="11">
                                    </div>
                                </div>
                                <div class="col-6 mb-2">
                                    <div class="form-group">
                                        <label for="">Phone</label>
                                        <input type="tel" class="form-control" required maxlength="11">
                                    </div>
                                </div>
                                <div class="col-12 mb-2">
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="email" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-12 mb-2">
                                    <div class="form-group">
                                        <label for="">Select the product</label>
                                        <select name="" id="" class="form-control">
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
                                        <input type="number" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-6 mb-2">
                                    <div class="form-group">
                                        <label for="">Rent or sale</label>
                                        <select name="" id="" class="form-control">
                                            <option value="">Rent</option>
                                            <option value="">Sale</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100">Send</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>