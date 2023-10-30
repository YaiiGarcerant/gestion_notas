@extends('layouts.app')

@section('content')
@if (Auth::user()->hasRole('PROFESOR'))
<main class="container">
    <section class="mt-4">
        <article class="card rounded-4 shadow-sm">
            <div class="card-body p-4">
                <h4 class="card-title color fw-semibold">Notas - Promedios  <i class="bi bi-journals"></i> </h4>

                <button type="button" class="btn sahdow-sm btn-general btn-sm" data-bs-toggle="modal" data-bs-target="#createNota">
              Registrar Calificacion <i class="bi bi-check2-all"></i>
                 </button>

                <hr class="mt-4 mb-4">

                <div class="table-responsive">
                    <table class="table table-bordered tabled-hover table-striped nowrap shadow-sm table-datatable"
                        style="width:100%">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Primera Nota</th>
                                <th>Segunda Nota</th>
                                <th>Tercera Nota</th>
                                <th>Funciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($notas as $nota)
                            <tr>
                                <td>{{ $nota->estudiante }}</td>
                                <td>{{ $nota->primera_nota}}</td>
                                <td>{{ $nota->segunda_nota}}</td>
                                <td>{{ $nota->tercera_nota }}</td>
                                <td>

                                <button type="button" class="btn btn-sm btn-warning fw-semibold shadow-sm" data-bs-toggle="modal" data-bs-target="#modalEdit{{ $nota->id }}">Editar <i  class="bi bi-pencil-square"></i></button>
                                    <a type="button" class="btn btn-sm btn-danger fw-semibold shadow-sm" onclick="deleteNota('{{$nota->id}}')" >Eliminar <i class="bi bi-trash3"></i></button>
                                </td>
                            </tr>
                            @include('notas.edit')
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </article>
    </section>
    @include('notas.create')
</main>
@else
<main class="container">
    <section class="mt-4">
        <article class="card rounded-4 shadow-sm">
            <div class="card-body p-4">
                <h4 class="card-title color fw-semibold">Notas - Promedios  <i class="bi bi-journals"></i> </h4>

                <button type="button" class="btn sahdow-sm btn-general btn-sm" data-bs-toggle="modal" data-bs-target="#createNota">
              Registrar Calificacion <i class="bi bi-check2-all"></i>
                 </button>

                <hr class="mt-4 mb-4">

                <div class="table-responsive">
                    <table class="table table-bordered tabled-hover table-striped nowrap shadow-sm table-datatable"
                        style="width:100%">
                        <thead>
                            <tr>
                                <th>Primera Nota</th>
                                <th>Segunda Nota</th>
                                <th>Tercera Nota</th>
                                <th>Definitiva</th>
                                <th>Observaciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($notas as $nota)
                            <tr>
                                <td>{{ $nota->primera_nota}}</td>
                                <td>{{ $nota->segunda_nota }}</td>
                                <td>{{ $nota->tercera_nota}}</td>
                                <td>{{ $nota->definitiva}}</td>
                                <td>{{ $nota->observaciones}}</td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </article>
    </section>
</main>
@endif


@if ($message = Session::get('success'))
<script>
    Swal.fire('Proceso finalizado correctamente!')
</script>
@elseif ($message = Session::get('error'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Error al registrar',
        text: '{{$message}}',
    });
</script>
@endif


@endsection
