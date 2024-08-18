<section class="brands py-4">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-4">
                <h2>Nuestras marcas</h2>
            </div>
            @foreach($marcas as $key)
            <div class="col-12 col-lg-5">
                <div class="brands-boxing w-100">
                    <div class="row">
                            <div class="col-12 d-flex justify-content-center">
                                <div class="shadow-sm">
                                    <img src="{{ $key->url_image }}" alt="" width="@if($key->es_title == "BSCLAB") 140px @else 310px @endif ">
                                </div>
                            </div>
                            @foreach($productos as $product)
                            @if($key->id == $product->brand_id)
                            <div class="col-12 w-100 mt-5">
                                <div class="swiper @if($key->es_title == "BSCLAB") biosac-swiper @else avequipment-swiper @endif  pb-5">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <div class="list-product pb-2 shadow-sm rounded">
                                                <img src="{{ $product->url_image }}" class="rounded-top" alt="" width="100%">
                                                <p class="fw-bold ms-2 mt-2 mb-1">{{$product->es_title}}</p>
                                                <a href="#" class="btn ms-2 btn-primary">Consultar</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-pagination d-none"></div>
                                </div>
                            </div>
                            @endif
                            @endforeach
                    </div>
                </div>
            </div>
            @if($key->es_title == "BSCLAB")
            <div class="col-12 col-lg-2">
                <div class="division"></div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
</section>