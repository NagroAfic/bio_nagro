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
        <div class="col-12">
            <!-- Descripción del producto -->
            {!!$product->es_description!!}
        </div>
        <div class="col-12">
            <hr>
        </div>
        <!--CARRUSEL-->
        <div class="col-12">
            <h3>Más productos de la marca</h3>
            <div class="swiper biosac-swiper2 pb-5">
                <div class="swiper-wrapper">
                    @foreach($productos as $productO)
                    <div class="swiper-slide">
                        <div class="list-product pb-0 shadow-sm rounded">
                            <div class="w-100" style="height: 75%">
                                <img src="{{ $productO->url_image }}" class="rounded-top" alt="" width="100%">
                            </div>
                            <div class="w-100" style="height: 25%;background:white;">
                                <p class="fw-bold ms-2 mt-2 mb-1">{{$productO->es_title}}</p>
                                <a href="{{ route('product_home', ['lang'=>"es" , 'product'=>$productO->url_seo]) }}" class="btn ms-2 btn-primary">Consultar</a>
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