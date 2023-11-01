<div class="modal fade" id="editarCurso{{ $curso->id }}" tabindex="-1" role="dialog" aria-labelledby="modalTitleId"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">Editar Curso</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('cursos.update', $curso->id) }}" method="post" class="needs-validation" novalidate>
                @csrf
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="mb-3">
                            <label for="" class="form-label">Nombre Del Curso</label>
                            <input type="text" class="form-control form-control-sm border-2 shadow-sm"
                                name="nombre" id="nombre"
                                value="{{$curso->nombre}}">
                            <div class="invalid-feedback fw-medium" class="">
                                <i class="bi bi-exclamation-circle"></i> Este campo es obligatorio!
                            </div>
                            @if ($errors->has('nombre{{ $curso->id }}'))
                                <div class="text-danger fw-medium small">
                                    <i class="bi bi-exclamation-circle"></i>
                                    Este campo es obligatorio!
                                </div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Profesor Encargado</label>
                            <select class="form-select border-2 shadow-sm" id="profesor_id" name="profesor_id" required>
                                <option value="{{ $curso->profesor_id }}">{{ $curso->profesor->user->name }}</option>
                                @foreach ($profesores as $profesor)
                                    @if ($profesor->id !== $curso->profesor_id)
                                        <option value="{{ $profesor->id }}">{{ $profesor->name }}</option>
                                    @endif
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

                        <div class="mb-3">
                            <label for="" class="form-label">Programa Del Curso</label>
                            <select class="form-select border-2 shadow-sm" id="programa_id" name="programa_id" required>
                                <option value="{{ $curso->programa_id }}">{{ $curso->programas->nombre }}</option>
                                @foreach ($programas as $programa)
                                    @if ($programa->id !== $curso->programa_id)
                                        <option value="{{ $programa->id }}">{{ $programa->nombre }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <div class="invalid-feedback fw-medium">
                                <i class="bi bi-exclamation-circle"></i> Este campo es obligatorio!
                            </div>
                            @if ($errors->has('programa_id'))
                                <div class="text-danger fw-medium">
                                    <i class="bi bi-exclamation-circle"></i>
                                    Este campo es obligatorio!
                                </div>
                            @endif
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
