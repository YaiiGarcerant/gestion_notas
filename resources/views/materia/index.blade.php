@extends('layouts.app')

@section('content')
    <main class="container">
        <section class="mt-4">
            <article class="card rounded-4 shadow-sm">
                <div class="card-body p-4">
                    <h4 class="card-title color fw-semibold">Materia - Asignatura  </h4>


                    <hr class="mt-4 mb-4">

                    <div class="table-responsive">
                        <table class="table table-bordered tabled-hover table-striped nowrap shadow-sm table-datatable"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>Materia</th>
                                    <th>Docente</th>
                                    <th>Funciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($materias as $materia)
                                <tr>
                                    <td>{{ $materia->nombre }}</td>
                                    <td>{{$materia->profesor->user->name}}</td>
                                    <td>
                                    <button type="button" class="btn btn-sm btn-warning fw-semibold shadow-sm" data-bs-toggle="modal" data-bs-target="#modalEdit{{ $materia->id }}">Editar <i  class="bi bi-pencil-square"></i></button>
                                        <a type="button" class="btn btn-sm btn-danger fw-semibold shadow-sm" onclick="deleteMateria('{{$materia->id}}')" >Eliminar <i class="bi bi-trash3"></i></button>
                                    </td>
                                </tr>
                                @include('materia.edit')
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </article>
        </section>
    </main>

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
