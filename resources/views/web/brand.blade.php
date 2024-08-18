@extends('layouts.web')
@section('content')
    @if($page_traduction == "ES")
        @include('web.es.brands.index')
    @else
        @include('web.en.product.index')
    @endif
@endsection