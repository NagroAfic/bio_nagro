<div class="container my-5">
    <div class="row">
        <div class="col-12 mt-5">
            <h2>{{$product->en_title}}</h2>
        </div>
        <div class="col-12 d-flex justify-content-center align-items-center">
            <!-- Imagen del producto solo 1 -->
            <div class="product-img-visualization">
                <img src="{{$product->url_image}}" alt="{{$product->en_title}}" title="{{$product->en_title}}">
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
        <div class="col-12-my-5">
            <h3 class="fw-bold">ALL OUR PRODUCTS INCLUDE</h3>
            <ul>
                <li>12-month warranty certificate against manufacturing defects</li>
                <li>Operation and maintenance manual</li>
                <li>Pore size verification certificate</li>
                <li>Durable fabric bag for proper transportation</li>
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
                                <p class="fw-bold ms-2 mt-2 mb-1 text-truncate-multiline">{{$product->en_title}}</p>
                                <a href="{{ route('product_home', ['lang'=>"es" , 'product'=>$product->url_seo]) }}" class="btn ms-2 btn-primary">Consult</a>
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