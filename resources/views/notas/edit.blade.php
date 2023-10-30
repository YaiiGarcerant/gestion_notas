<div class="modal fade modal-lg" id="modalEdit{{$nota->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fs-5 color fw-2 mt-2" id="modalTitleId">Calificar Estudiante <i class="bi bi-check2-circle"></i> </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" class="needs-validation" action="{{ route('notas.update', $nota->id) }}" novalidate
                role="form">
                @csrf
                <div class="modal-body">
                    <div class="container-fluid row g-3">

                        <small class="text-muted fw-semibold mt-4">
                            Datos Del Estudiante
                                <hr style="margin-top: -10px; margin-left: 25%;">
                        </small>

                        @foreach ($materias as $materia)
                         <input type="hidden" name="materia_id" value="{{$materia->id}}">
                        @endforeach

                        <div class="col-12">
                            <label for="name" class="form-label fw-semibold">Estudiante: </label>
                            <select class="form-select border-2 shadow-sm" id="estudiante_id" name="estudiante_id" required>
                                <option value="{{$nota->estudiante_id}}">{{$nota->estudiante}}</option>
                                @foreach ($estudiantes as $estudiante)
                                    @if ($estudiante->id !== $nota->estudiante_id)
                                    <option value="{{ $estudiante->id }}">{{ $estudiante->estudiante}}</option>
                                    @endif
                                @endforeach
                            </select>
                            @if ($errors->has('estudiante_id'))
                                <div class="text-danger fw-medium">
                                    <i class="bi bi-exclamation-circle"></i>
                                    Este campo es obligatorio!
                                </div>
                            @endif
                        </div>

                        <small class="text-muted fw-semibold mt-4">
                            Datos De La Calificacion
                                <hr style="margin-top: -10px; margin-left: 25%;">
                        </small>

                        <div class="col-md-4">
                            <label for="marca" class="form-label fw-semibold">Primera Nota: </label>
                            <input type="number" class="form-control border-2 shadow-sm" name="primera_nota" id="primera_nota"
                              required value="{{$nota->primera_nota}}">
                            @if ($errors->has('primera_nota'))
                                <small class="text-danger fw-semibold">
                                    <i class="bi bi-exclamation-circle"></i>
                                </small>
                            @endif
                        </div>

                        <div class="col-md-4">
                            <label for="ubicacion" class="form-label fw-semibold">Segunda Nota: </label>
                            <input type="number" class="form-control border-2 shadow-sm" name="segunda_nota"
                                id="segunda_nota" required value="{{$nota->segunda_nota}}">
                            @if ($errors->has('segunda_nota'))
                                <small class="text-danger fw-semibold">
                                    <i class="bi bi-exclamation-circle"></i>
                                </small>
                            @endif
                        </div>

                        <div class="col-md-4">
                            <label for="modelo" class="form-label fw-semibold">Tercera Nota: </label>
                            <input type="number" class="form-control border-2 shadow-sm" name="tercera_nota"
                                required value="{{$nota->tercera_nota}}">
                            @if ($errors->has('tercera_nota'))
                                <small class="text-danger fw-semibold">
                                    <i class="bi bi-exclamation-circle"></i>
                                </small>
                            @endif
                        </div>

                        <div class="col-md-12">
                            <label for="placa" class="form-label fw-semibold">Observaciones: </label>
                            <input class="form-control border-2 shadow-sm" name="observaciones" id="observaciones" rows="2" value="{{$nota->observaciones}}">
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
