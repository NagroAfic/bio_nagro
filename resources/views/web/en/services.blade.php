<section class="services">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="wow animate__animated animate__fadeInDown">Services</h2>
                <p class="wow animate__animated animate__fadeInDown">Explore our services that we provide</p>
            </div>
            @foreach ($servicios as $servicio)
            <div class="col-md-6 col-xxl-4 my-2">
                <div class="w-100">
                    <div class="box-services d-flex flex-wrap shadow-sm">
                        <div class="img-box w-25">
                            <img src="{{ $servicio->url_portada }}" width="100%" alt="">
                        </div>
                        <div class="w-75 d-flex justify-content-between align-items-center px-2">
                            <p class="mb-0 text-truncate">{{$servicio->en_title}}</p>
                            <a href="{{ route('service.index', ['lang'=>$page_traduction , 'service' =>$servicio->id]) }}" class="rounded-btn shadow-sm d-flex justify-content-center align-items-center">
                                <svg width="32px" height="32px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M4 12H6.5M20 12L14 6M20 12L14 18M20 12H9.5" stroke="#adff2f" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="service_algas_rigth">
        <img src="{{ asset('images/algas.png') }}" width="100%" alt="">
    </div>
    <div class="service_algas_left">
        <img src="{{ asset('images/algas.png') }}" width="100%" alt="">
    </div>
</section>