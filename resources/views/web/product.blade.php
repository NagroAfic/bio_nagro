@extends('layouts.web')
@section('content')
    @if($page_traduction == "ES")
        @include('web.es.products.index')
        @include('web.es.form')
    @else
        @include('web.en.product.index')
    @endif
@endsection