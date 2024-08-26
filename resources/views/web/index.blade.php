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
        @include('web.en.about')
        @include('web.en.services')
        @include('web.en.form')
        @include('web.en.brands')
        @include('web.en.blog')
    @endif
@endsection
@section('script')
<script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
<script>
    
    @if($page_traduction == "ES")
        let texto = ['Fiabilidad y excelencia en cada uno de nuestros productos','Cada producto refleja nuestro compromiso con la calidad','Diseño robusto y precisión en cada detalle','Calidad inigualable que puedes confiar en cada uso']
    @else
        let texto = ['Reliability and excellence in each of our products', 'Each product reflects our commitment to quality', 'Robust design and precision in every detail', 'Unmatched quality that you can trust in every use']
    @endif

    var typed = new Typed('#element', {
      strings: texto,
      typeSpeed: 15,
      loop: true,
      loopCount: Infinity,
    });
</script>
@endsection