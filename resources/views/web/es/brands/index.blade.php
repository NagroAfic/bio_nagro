<section class="w-100 h-auto">
    <!-- INFO MARCA -->
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <!-- LOGO DE LA MARCA -->
            </div>
            <div class="col-md-6">
                <!-- DESCRIPCIÓN DE LA MARCA -->
            </div>
        </div>
    </div>

    <!-- PRODUCTOS DE LA MARCA -->
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-2 col-xl-4">
                <div class="list-product pb-0 shadow-sm rounded overflow-hidden">
                    <div class="w-100" style="height: 75%">
                        <img src="{{ $productO->url_image }}" class="rounded-top" alt="" width="100%">
                    </div>
                    <div class="w-100" style="height: 25%;background:white;">
                        <p class="fw-bold ms-2 mt-2 mb-1">{{$productO->es_title}}</p>
                        <a href="{{ route('product_home', ['lang'=>"es" , 'product'=>$productO->url_seo]) }}" class="btn ms-2 btn-primary">Consultar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>