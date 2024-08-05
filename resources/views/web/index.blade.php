@extends('layouts.web')
@section('content')
    @if($page_traduction == "ES")
        @include('web.es.top')
        @include('web.es.about')
        @include('web.es.services')
        @include('web.es.form')
        @include('web.es.brands')
    @else
        @include('web.en.top')
    @endif
@endsection