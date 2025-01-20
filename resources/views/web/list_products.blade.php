@extends('layouts.web')
@section('SEO')
<meta name="description" content="Nuestros productos son de la calidad esperada, revisa nuestro catalogo">
@endsection
@section('content')
    @if($page_traduction == "ES")
        @include('web.es.list.index')
    @else
        @include('web.en.list.index')
    @endif
@endsection