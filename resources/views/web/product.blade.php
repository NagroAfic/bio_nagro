@extends('layouts.web')
@section('SEO')
<meta name="description" content="{{$product->description_seo}}">
@endsection
@section('content')
    @if($page_traduction == "ES")
        @include('web.es.products.index')
        @include('web.es.form')
    @else
        @include('web.en.product.index')
    @endif
@endsection