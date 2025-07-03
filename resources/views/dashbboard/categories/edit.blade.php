@extends('layouts.app')
@section('style')
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        @if(Session::has('danger_message'))
        <div class="col-12 alert alert-danger" role="alert">
            {{Session::get('danger_message')}}
        </div>
        @endif
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h3 class="m-0 font-weight-bold text-primary">Actualizar categoria</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('categoria.update', ['category'=>$category->id]) }}" method="POST" enctype="multipart/form-data" novalidate>
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-12">
                                <h5 class="fw-bold"><u>Sección Español</u></h5>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">Titulo<span class="text-danger">*</span></label>
                                    <input type="text" name="es_title" id="" class="form-control" value="{{$category->es_title}}">
                                </div>
                            </div>
                            <div class="col-12">
                                <hr>
                            </div>
                            <div class="col-12">
                                <h5 class="fw-bold"><u>Sección Ingles</u></h5>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">Titulo </label>
                                    <input type="text" name="en_title" id="" class="form-control" value="{{$category->en_title}}">
                                </div>
                            </div>
                            <div class="col-12">
                                <hr>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">Estado<span class="text-danger">*</span></label>
                                    <select name="" id="">
                                        <option value="0" {{$category->status == 0 ? 'selected' : ''}}>Disponible</option>
                                        <option value="1" {{$category->status == 1 ? 'selected' : ''}}>No disponible</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-end">
                                <button class="btn btn-success" type="submit">Guardar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>

<script>
        CKEDITOR.replace('es_description');
        CKEDITOR.replace('en_description');

        setTimeout(() => {
            $('#cke_notifications_area_es_description').remove();
            $('#cke_notifications_area_en_description').remove();
        }, 200);

</script>
@endsection