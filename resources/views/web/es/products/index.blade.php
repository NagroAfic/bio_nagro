<div class="container my-5">
    <div class="row">
        <div class="col-12 mt-5">
            <h2>{{$product->es_title}}</h2>
        </div>
        <div class="col-12 d-flex justify-content-center align-items-center">
            <!-- Imagen del producto solo 1 -->
            <div class="product-img-visualization">
                <img src="{{$product->url_image}}" alt="{{$product->es_title}}" title="{{$product->es_title}}">
            </div>
        </div>
        <div class="col-12">
            <hr>
        </div>
        <div class="col-12 product-visualization-dashboard">
            <!-- Descripción del producto -->
            {!!$product->en_description!!}
        </div>
        <div class="col-12">
            {!!$product->embed_video!!}
        </div>
        <div class="col-12 my-5">
            <h3 class="fw-bold">TODOS NUESTROS PRODUCTOS INCLUYEN</h3>
            <ul>
                <li>Certificado de garantía por 12 meses contra defectos de fabricación</li>
                <li>Manual de operaciones y mantenimiento</li>
                <li>Certificado de verificación de tamaño de poro</li>
                <li>Bolso de tela resistente para adecuado transporte</li>
            </ul>
        </div>
        <!--CARRUSEL-->
        <div class="col-12">
            <h3>Más productos de la marca</h3>
            <div class="swiper biosac-swiper2 pb-5">
                <div class="swiper-wrapper">
                    @foreach($productos as $product)
                    <div class="swiper-slide">
                        <div class="list-product pb-0 shadow-sm rounded overflow-hidden">
                            <div class="w-100" style="height: 75%">
                                <img src="{{ $product->url_image }}" class="rounded-top" alt="" width="100%">
                            </div>
                            <div class="w-100" style="height: 25%;background:white;">
                                <p class="fw-bold ms-2 mt-2 mb-1 text-truncate-multiline">{{$product->es_title}}</p>
                                <a href="{{ route('product_home', ['lang'=>"es" , 'product'=>$product->url_seo]) }}" class="btn ms-2 btn-primary">Consultar</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="swiper-pagination d-none"></div>
            </div>
        </div>
    </div>
</div>