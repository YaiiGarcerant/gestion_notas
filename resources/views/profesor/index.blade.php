@extends('layouts.app')

@section('content')
    <main class="container">
        <section class="mt-4">
            <article class="card rounded-4 shadow-sm">
                <div class="card-body p-4">
                    <h4 class="card-title color fw-semibold">Profesores - Docentes  </h4>
                    <!-- Modal trigger button -->
                    <button type="button" class="btn sahdow-sm btn-general btn-sm" data-bs-toggle="modal" data-bs-target="#createProfesor">
                       Registrar<i class="bi bi-bookmark-plus"></i>
                    </button>

                    <hr class="mt-4 mb-4">

                    <div class="table-responsive">
                        <table class="table table-bordered tabled-hover table-striped nowrap shadow-sm table-datatable"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Identificación</th>
                                    <th>Correo</th>
                                    <th>Funciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($profesores as $profesor)
                                <tr>
                                    <td>{{ $profesor->user->name }}</td>
                                    <td>{{ $profesor->identificacion}}</td>
                                    <td>{{ $profesor->user->email }}</td>
                                    <td>
                                    <button type="button" class="btn btn-sm btn-warning fw-semibold shadow-sm" data-bs-toggle="modal" data-bs-target="#modalEdit{{ $profesor->id }}">Editar <i  class="bi bi-pencil-square"></i></button>
                                        <a type="button" class="btn btn-sm btn-danger fw-semibold shadow-sm" onclick="deleteProfesor('{{$profesor->user->id}}')" >Eliminar <i class="bi bi-trash3"></i></button>
                                    </td>  
                                </tr>
                                @include('profesor.edit')
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </article>
        </section>
        @include('profesor.create')
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
