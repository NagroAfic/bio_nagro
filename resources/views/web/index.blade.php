@extends('layouts.web')
@section('content')
    @if($page_traduction == "ES")
        @include('web.es.top')
        @include('web.es.about')
        @include('web.es.services')
        @include('web.es.form')
        @include('web.es.brands')
        @include('web.es.blog')
    @else
        @include('web.en.top')
    @endif
@endsection
@section('script')
<script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
<script>
    var typed = new Typed('#element', {
      strings: ['Calidad y precisión entregada en cada producto'],
      typeSpeed: 30,
      loop: true,
      loopCount: Infinity,
    });
</script>
@endsection