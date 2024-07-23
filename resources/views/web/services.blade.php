@extends('layouts.web')
@section('content')
    @if($page_traduction == "ES")
        @include('web.es.servicios.top')
        @include('web.es.servicios.services')
    @else
        @include('web.en.top')
    @endif
@endsection