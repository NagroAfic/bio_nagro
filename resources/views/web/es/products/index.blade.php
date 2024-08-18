<div class="container">
    <div class="row">
        <div class="col-12 d-flex justify-content-center align-items-center">
            <!-- Imagen del producto solo 1 -->
            <div class="product-img-visualization">
                <img src="{{$product->url_image}}" alt="">
            </div>
        </div>
        <div class="col-12">
            <hr>
        </div>
        <div class="col-12">
            <!-- Descripción del producto -->
            {!!$product->es_description!!}
        </div>
    </div>
</div>