@extends('layouts.app')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Lista de Categorias</h6>
                    <a class="btn btn-primary text-white" href="{{ route('categorias.create') }}">Crear Marca</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Categoria</th>
                                    <th width="180px">Disponibilidad</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody id="worker-table">
                                @foreach($brands as $key)
                                    <tr>
                                        <td>{{$key->es_title}}</td>
                                        <td>{{$key->status == 1 ? 'Disponible' : 'No disponible'}}</td>
                                        <td><a href="{{ route('categorias.edit', ['category'=>$key->id]) }}" class="btn btn-warning">Editar</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script>

    $('#dataTable').DataTable();
</script>
@endsection