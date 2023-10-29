<div class="modal fade modal-lg" id="modalEdit{{$profesor->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fs-5 color fw-2 mt-2" id="modalTitleId">Editar Profesor <i
                        class="bi bi-person"></i> </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" class="needs-validation" action="{{ route('profesor.update', $profesor->user->id) }}" novalidate
                role="form">
                @csrf
                <div class="modal-body">
                    <div class="container-fluid row g-3">

                        <div class="col-12">
                            <label for="name" class="form-label fw-semibold">Nombre: </label>
                            <input type="text" class="form-control border-2 shadow-sm" name="name" id="name"
                                required value="{{$profesor->user->name}}" >
                            @if ($errors->has('name'))
                                <small class="text-danger fw-semibold">
                                    <i class="bi bi-exclamation-circle"></i>
                                </small>
                            @endif
                        </div>

                        <div class="col-md-6">
                            <label for="marca" class="form-label fw-semibold">Email: </label>
                            <input type="email" class="form-control border-2 shadow-sm" name="email" id="email"
                              required value="{{$profesor->user->email}}">
                            @if ($errors->has('email'))
                                <small class="text-danger fw-semibold">
                                    <i class="bi bi-exclamation-circle"></i>
                                </small>
                            @endif
                        </div>

                        <div class="col-md-6">
                            <label for="ubicacion" class="form-label fw-semibold">Documento: </label>
                            <input type="number" class="form-control border-2 shadow-sm" name="identificacion"
                                id="identificacion" required value="{{$profesor->identificacion}}">
                            @if ($errors->has('identificacion'))
                                <small class="text-danger fw-semibold">
                                    <i class="bi bi-exclamation-circle"></i>
                                </small>
                            @endif
                        </div>

                        <div class="col-md-6">
                            <label for="modelo" class="form-label fw-semibold">Telefono: </label>
                            <input type="number" class="form-control border-2 shadow-sm" name="telefono"
                                required value="{{$profesor->telefono}}">
                            @if ($errors->has('telefono'))
                                <small class="text-danger fw-semibold">
                                    <i class="bi bi-exclamation-circle"></i>
                                </small>
                            @endif
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="placa" class="form-label fw-semibold">Direccion: </label>
                            <input type="text" class="form-control border-2 shadow-sm" name="direccion"
                                required value="{{$profesor->direccion}}">
                            @if ($errors->has('direccion'))
                                <small class="text-danger fw-semibold">
                                    <i class="bi bi-exclamation-circle"></i>
                                </small>
                            @endif
                        </div>
                    </div>

                    <div class="modal-footer mt-4" style="margin-bottom: -20px">
                        <button type="button" class="btn btn-secondary btn-cancel fw-semibold"
                            data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary btn-btn-general fw-semibold">Guardar </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
