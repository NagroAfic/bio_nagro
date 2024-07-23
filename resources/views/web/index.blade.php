@extends('layouts.web')
@section('content')
    @if($page_traduction == "ES")
        @include('web.es.top')
        @include('web.es.about')
        @include('web.es.services')
        @include('web.es.brands')
        @include('web.es.form')
    @else
        @include('web.en.top')
    @endif
@endsection