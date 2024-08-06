@extends('layouts.web')
@section('content')
    <header class="header-servicios px-4 d-flex justify-content-center align-items-center" style="background-image: url({{$service->url_portada}})">
        <h1 class="text-center text-white">
            {{$service->es_title}}
        </h1>
    </header>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-7">
                <div class="row">
                    <div class="col-12">
                        {!!$service->es_description!!}
                    </div>
                    @if ($service->embed_video != null)
                    <div class="col-12">
                        <p>Video relacionado</p>
                    </div>
                    @endif
                </div>
            </div>
            <div class="col-12 col-md-5">
                <div class="row services">
                    @foreach ($servicios as $servicio)
                    <div class="col-md-6 col-xxl-4 my-2">
                        <div class="w-100">
                            <div class="box-services d-flex flex-wrap shadow-sm">
                                <div class="img-box w-25">
                                    <img src="{{$service->url_portada}}" width="100%" alt="">
                                </div>
                                <div class="w-75 d-flex justify-content-between align-items-center px-2">
                                    <p class="mb-0 text-truncate">{{$servicio->es_title}}</p>
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
        </div>
    </div>
@endsection