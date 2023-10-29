@extends('layouts.app')
@section('content')
<main class="container">
    <section class="mt-4">
        <article class="card rounded-4 shadow-sm">
            <div class="card-body p-4">
                <h4 class="card-title color ">Cursos</h4>
                <form action="{{ route('cursos.create') }}" method="post" class="row needs-validation" novalidate>
                    @csrf
                    <div class="col-md-4 mb-3">
                        <label for="name" class="form-label fw-semibold">Nombre:</label>
                        <input type="text" class="form-control border-2 shadow-sm" id="nombre" name="nombre" placeholder="Ingrese el nombre del Curso" required>
                        <div class="invalid-feedback fw-medium" class="">
                            <i class="bi bi-exclamation-circle"></i> Este campo es obligatorio!
                        </div>
                        @if ($errors->has('nombre'))
                            <div class="text-danger fw-medium small">
                                <i class="bi bi-exclamation-circle"></i>
                                Este campo es obligatorio!
                            </div>
                        @endif
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="identificacion" class="form-label fw-semibold">Profesor Encargado:</label>
                        <select class="form-select border-2 shadow-sm" id="profesor_id" name="profesor_id" required>
                            <option selected disabled value="">Seleccionar Opción...</option>
                            @foreach ($profesores as $profesor)
                                    <option value="{{ $profesor->id }}">{{ $profesor->name }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback fw-medium">
                            <i class="bi bi-exclamation-circle"></i> Este campo es obligatorio!
                        </div>
                        @if ($errors->has('profesor_id'))
                            <div class="text-danger fw-medium">
                                <i class="bi bi-exclamation-circle"></i>
                                Este campo es obligatorio!
                            </div>
                        @endif
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="rol" class="form-label fw-semibold">Programa Del Curso:</label>
                        <select class="form-select border-2 shadow-sm" id="programa_id" name="programa_id" required>
                            <option selected disabled value="">Seleccionar Opción...</option>
                            @foreach ($programas as $programa)
                                    <option class="border-2 shadow-sm " value="{{ $programa->id }}">{{ $programa->nombre }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback fw-medium">
                            <i class="bi bi-exclamation-circle"></i> Este campo es obligatorio!
                        </div>
                        @if ($errors->has('programa_id'))
                            <div class="text-danger fw-medium">
                                <i class="bi bi-exclamation-circle"></i>
                                Debe seleccionar una opción!
                            </div>
                        @endif
                    </div>

                    <div class="text-center mb-2">
                        <button type="submit" class="btn btn-general fw-medium sahdow-sm ">Registrar Curso</button>
                    </div>
                </form>

                <hr class="mt-4 mb-4">

                <div class="table-responsive">
                    <table class="table table-bordered tabled-hover table-striped nowrap shadow-sm table-datatable"
                        style="width:100%">
                        <thead>
                            <tr>
                                <th >Nombre</th>
                                <th >Programa</th>
                                <th >Docente</th>
                                <th >Funciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cursos as $curso)
                                <tr>
                                    <td>{{ $curso->nombre }}</td>
                                    <td>{{ $curso->programas->nombre }}</td>
                                    <td>{{ $curso->profesor->user->name }}</td>
                                    <td>
                                        <button type="button" class="btn btn-warning btn-sm fw-semibold"
                                            data-bs-toggle="modal" data-bs-target="#editarCurso{{ $curso->id }}">
                                            Editar <i class="bi bi-pencil-square"></i>
                                        </button>

                                        <a href="#" class="btn btn-danger btn-sm fw-semibold"
                                            onclick="deleteCurso('{{ $curso->id }}')">Eliminar <i
                                                class="bi bi-trash3"></i></a>
                                    </td>
                                </tr>
                                @include('curso.edit')
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

