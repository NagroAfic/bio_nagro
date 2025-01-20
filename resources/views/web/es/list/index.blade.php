<div class="container-fluid my-5">
    <div class="row">
        <div class="col-12">
            <h2>Marca - {{$brand->es_title}}</h2>
        </div>
        @foreach($products as $product)
        <div class="col-sm-6 col-md-4 col-lg-3 my-4">
            <div class="list-product pb-0 shadow-sm rounded overflow-hidden">
                <div class="w-100" style="height: 75%">
                    <img src="{{ $product->url_image }}" class="rounded-top" alt="" width="100%">
                </div>
                <div class="w-100" style="height: 25%;background:white;">
                    <p class="fw-bold ms-2 mt-2 mb-1 text-truncate-multiline">{{$product->es_title}}</p>
                    <a href="{{ route('product_home', ['lang'=>" es" , 'product'=>$product->url_seo]) }}" class="btn
                        ms-2 btn-primary">Consult</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>