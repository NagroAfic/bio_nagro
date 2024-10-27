<section class="blog" id="blog">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Blog</h2>
                <p>Find out the latest news we have on our blog</p>
            </div>
            <div class="col-12">
                <div class="swiper biosac-swiper2 pb-5">
                    <div class="swiper-wrapper">
                        @foreach($blogs as $blog)
                        <div class="swiper-slide">
                            <div class="list-product pb-0 shadow-sm rounded overflow-hidden">
                                <div class="w-100" style="height: 75%">
                                    <img src="{{ $blog->url_portada }}" class="rounded-top" alt="" width="100%">
                                </div>
                                <div class="w-100" style="height: 25%;background:white;">
                                    <p class="fw-bold ms-2 mt-2 mb-1">{{$blog->en_title}}</p>
                                    <a href="{{ route('blog_index', ['lang'=>"es" , 'product'=>$blog->url_seo]) }}" class="btn ms-2 btn-primary">Ver</a>
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
</section>