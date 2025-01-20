<section class="brands py-4" id="marcas">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-4">
                <h2 class=" wow animate__animated  animate__fadeInDown">Nuestras marcas</h2>
            </div>
            @foreach($marcas as $key)
            <div class="col-12">
                <div class="brands-boxing w-100">
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center">
                            <div class="shadow-sm">
                                <img src="{{ $key->url_image }}" alt="" width="@if($key->es_title == "BSCLAB") 140px @else 310px @endif ">
                            </div>
                        </div>
                        <div class="col-12 w-100 mt-5">
                            <div class="swiper @if($key->es_title == "BSCLAB") biosac-swiper @else avequipment-swiper @endif  pb-5">
                                <div class="swiper-wrapper">
                                    @foreach($productos as $product)
                                    @if($key->id == $product->brand_id)
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
                                    @endif
                                    @endforeach
                                </div>
                                <div class="swiper-pagination d-none"></div>
                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <a href="{{ route('listProducts', ['lang'=>"es" , 'brand'=>$key->url_seo]) }}" class="btn ms-2 btn-primary">Ver más productos</a>
                        </div>
                    </div>
                </div>
            </div>
            @if($key->es_title == "BSCLAB")
            <div class="col-12">
                <div class="division"></div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
</section>