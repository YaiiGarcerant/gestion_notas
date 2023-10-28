@extends('layouts.app')

@section('content')

<h4>Dashboard</h4>
<nav>
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
    <li class="breadcrumb-item active">Dashboard</li>
  </ol>
</nav>
</div><!-- End Page Title -->


    <main class="container">
        <section class="mt-4">
            <article class="card rounded-4 shadow-sm">
                <div class="card-body p-4">
                    <h4 class="card-title color fw-semibold" style="margin-top: -20px">Programas</h4>
                    <!-- Modal trigger button -->
                    <button type="button" class="btn sahdow-sm btn-general btn-sm" data-bs-toggle="modal" data-bs-target="#createprogramas">
                       Registrar<i class="bi bi-bookmark-plus"></i>
                    </button>

                    <hr class="mt-4 mb-4">

                    <div class="table-responsive">
                        <table class="table table-bordered tabled-hover table-striped nowrap shadow-sm table-datatable"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Funciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($programas as $programa)
                                <tr>
                                    <td>{{ $programa->nombre }}</td>
                                    <td>
                                    <button type="button" class="btn btn-sm btn-warning fw-semibold shadow-sm" data-bs-toggle="modal" data-bs-target="#modalEdit{{ $programa->id }}">Editar <i  class="bi bi-pencil-square"></i></button>
                                        <a type="button" class="btn btn-sm btn-danger fw-semibold shadow-sm" onclick="deletePrograma('{{$programa->id}}')" >Eliminar <i class="bi bi-trash3"></i></button>
                                    </td>  
                                </tr>
                                @include('programa.edit')
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </article>
        </section>
    </main>
@include('programa.create')


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
