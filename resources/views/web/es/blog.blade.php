<section class="blog">
    <div class="col-12">
        <h2>Blog</h2>
        <p>Enterate de las ultimas noticias que tenemos, en nuestro blog</p>
    </div>
    <div class="col-12">
        <div class="swiper biosac-swiper2 pb-5">
            <div class="swiper-wrapper">
                @foreach($blogs as $blog)
                <div class="swiper-slide">
                    <div class="list-product pb-0 shadow-sm rounded overflow-hidden">
                        <div class="w-100" style="height: 75%">
                            <img src="{{ $blog->url_image }}" class="rounded-top" alt="" width="100%">
                        </div>
                        <div class="w-100" style="height: 25%;background:white;">
                            <p class="fw-bold ms-2 mt-2 mb-1">{{$blog->es_title}}</p>
                            <a href="{{ route('product_home', ['lang'=>"es" , 'product'=>$blog->url_seo]) }}" class="btn ms-2 btn-primary">Ver</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="swiper-pagination d-none"></div>
        </div>
    </div>
</section>