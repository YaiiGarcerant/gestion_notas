@extends('layouts.app')

@section('content')
    <main class="container">
        <section class="mt-4">
            <article class="card rounded-4 shadow-sm">
                <div class="card-body p-4">
                    <h4 class="card-title color fw-semibold">Estudiantes   <i class="bi bi-mortarboard-fill"></i>  </h4>
                    <button type="button" class="btn sahdow-sm btn-general btn-sm" data-bs-toggle="modal" data-bs-target="#createEstudiante">
                       Registrar <i class="bi bi-cursor"></i>
                    </button>

                    <hr class="mt-4 mb-4">

                    <div class="table-responsive">
                        <table class="table table-bordered tabled-hover table-striped nowrap shadow-sm table-datatable"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Correo</th>
                                    <th>Curso</th>
                                    <th>Funciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($estudiantes as $estudiante)
                                <tr>
                                    <td>{{ $estudiante->user->name }}</td>
                                    <td>{{ $estudiante->user->email }}</td>
                                    <td>{{ $estudiante->curso->nombre}}</td>
                                    <td>
                                    <button type="button" class="btn btn-sm btn-warning fw-semibold shadow-sm" data-bs-toggle="modal" data-bs-target="#modalEdit{{ $estudiante->id }}">Editar <i  class="bi bi-pencil-square"></i></button>
                                        <a type="button" class="btn btn-sm btn-danger fw-semibold shadow-sm" onclick="deleteEstudiante('{{$estudiante->user->id}}')" >Eliminar <i class="bi bi-trash3"></i></button>
                                    </td>
                                </tr>
                                @include('estudiante.edit')
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </article>
        </section>
        @include('estudiante.create')
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
