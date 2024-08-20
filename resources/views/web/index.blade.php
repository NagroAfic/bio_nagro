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
@section('script')
<script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
<script>
    var typed = new Typed('#element', {
      strings: ['<i>First</i> sentence.', '&amp; a second sentence.'],
      typeSpeed: 50,
    });
</script>
@endsection