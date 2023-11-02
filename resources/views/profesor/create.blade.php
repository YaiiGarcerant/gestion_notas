<div class="modal fade modal-lg" id="createProfesor" data-bs-backdrop="static" data-bs-keyboard="false"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fs-5 color fw-2 mt-2" id="modalTitleId">Registrar Profesor <i
                        class="bi bi-person"></i> </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" class="needs-validation" action="{{ route('profesor.create') }}" novalidate
                role="form">
                @csrf
                <div class="modal-body">
                    <div class="container-fluid row g-3">

                        <small class="text-muted fw-semibold mt-4">
                            Datos Del Profesor
                            <hr id="formularioProfesores">
                        </small>

                        <div class="col-12">
                            <label for="" class="form-label fw-semibold">Nombre: </label>
                            <input name="name" id="name" type="text" class="form-control border-2 shadow-sm" required onkeyup="mayuscula(this)">
                            @if ($errors->has('name'))
                                <small class="text-danger fw-semibold">
                                    <i class="bi bi-exclamation-circle"></i>
                                    Ingrese el nombre completo
                                </small>
                            @endif
                        </div>

                        <div class="col-md-6">
                            <label for="marca" class="form-label fw-semibold">Email: </label>
                            <input type="email" class="form-control border-2 shadow-sm"  id="email" name="email" required>
                            @if ($errors->has('email'))
                                <small class="text-danger fw-semibold">
                                    <i class="bi bi-exclamation-circle"></i>
                                </small>
                            @endif
                        </div>


                        <div class="col-md-6">
                            <label for="ubicacion" class="form-label fw-semibold">Documento: </label>
                            <input type="number" class="form-control border-2 shadow-sm" name="identificacion"
                                id="identificacion" required>
                            @if ($errors->has('identificacion'))
                                <small class="text-danger fw-semibold">
                                    <i class="bi bi-exclamation-circle"></i>
                                </small>
                            @endif
                        </div>



                        <div class="col-md-6">
                            <label for="modelo" class="form-label fw-semibold">Telefono: </label>
                            <input type="number" class="form-control border-2 shadow-sm" name="telefono"
                                required>
                            @if ($errors->has('telefono'))
                                <small class="text-danger fw-semibold">
                                    <i class="bi bi-exclamation-circle"></i>
                                </small>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <label for="placa" class="form-label fw-semibold">Direccion: </label>
                            <input type="text" class="form-control border-2 shadow-sm" name="direccion" id="direccion"
                                required>
                            @if ($errors->has('direccion'))
                                <small class="text-danger fw-semibold">
                                    <i class="bi bi-exclamation-circle"></i>
                                </small>
                            @endif
                        </div>


                        <small class="text-muted fw-semibold mt-4 mb-0">
                            Datos De La Materia <hr id="formularioProfesores">
                        </small>

                        <div class="col-12 mb-4" style="margin-top: 10px">
                            <label for="modelo" class="form-label fw-semibold">Materia</label>
                            <input type="text" class="form-control border-2 shadow-sm" name="nombre" id="nombre"  required>
                            @if ($errors->has('nombre'))
                                <small class="text-danger fw-semibold">
                                    <i class="bi bi-exclamation-circle"></i>
                                </small>
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer mt-3" style="margin-bottom: -20px">
                        <button type="button" class="btn btn-secondary btn-cancel fw-semibold"
                            data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary btn-btn-general fw-semibold">Guardar </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
