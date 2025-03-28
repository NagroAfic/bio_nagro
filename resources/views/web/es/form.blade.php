<section class="form-price" id="cotizacion">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6">
                <h2 class="text-white wow animate__animated  animate__fadeInDown">Cotiza rápidamente y <br> sin compromisos</h2>
                <p class="text-white wow animate__animated  animate__fadeInLeftBig">Completa el formulario y recibe una cotización personalizada en solo unos minutos. <br> ¡Es rápido, fácil y sin compromiso!</p>
            </div>
            <div class="col-12 col-md-6 d-flex justify-align-center align-items-center">
                <div class="card mb-4 wow animate__animated  animate__fadeInRightBig">
                    <div class="card-body p-2">
                        <form action="{{ route('contactoMail',["lang" => "es"]) }}" class="w-100" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-12 mb-2">
                                    <div class="form-group">
                                        <label for="">Nombres</label>
                                        <input type="text" class="form-control" name="fullname" required>
                                    </div>
                                </div>
                                <div class="col-6 mb-2">
                                    <div class="form-group">
                                        <label for="">DNI o RUC</label>
                                        <input type="text" class="form-control" name="idruc" required minlength="8" maxlength="11">
                                    </div>
                                </div>
                                <div class="col-6 mb-2">
                                    <div class="form-group">
                                        <label for="">Teléfono</label>
                                        <input type="tel" class="form-control" name="phone" required maxlength="11">
                                    </div>
                                </div>
                                <div class="col-12 mb-2">
                                    <div class="form-group">
                                        <label for="">Correo Electrónico</label>
                                        <input type="email" class="form-control" name="email" required>
                                    </div>
                                </div>
                                <div class="col-12 mb-2">
                                    <div class="form-group">
                                        <label for="">Selecciona el producto</label>
                                        <select name="product_selected" id="" class="form-control">
                                            @foreach($productos as $key)
                                                @if(isset($product))
                                                    @if($key->id == $product->id)
                                                    <option value="{{$product->es_title}}">{{$product->es_title}}</option>
                                                    @endif
                                                @else
                                                    <option value="{{$key->es_title}}">{{$key->es_title}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6 mb-2">
                                    <div class="form-group">
                                        <label for="">Unidades</label>
                                        <input type="number" class="form-control" name="unit" required>
                                    </div>
                                </div>
                                <div class="col-6 mb-2">
                                    <div class="form-group">
                                        <label for="">Alquiler o venta</label>
                                        <select name="sales" id="" class="form-control">
                                            <option value="Alquiler">Alquiler</option>
                                            <option value="Venta">Venta</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="h-captcha" data-sitekey="247e60d2-3838-4fea-9478-35f62c5282da" data-callback="captchaCompleted"></div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100" id="form-cotizacion-sub" disabled>Enviar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>