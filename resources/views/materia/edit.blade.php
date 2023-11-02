<div class="modal fade" id="modalEdit{{$materia->id}}" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">Editar Materia</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('materias.update', $materia->id) }}" method="post" class="needs-validation" novalidate>
                        @csrf
                        <div class="modal-body mb-2">
                            <div class="container-fluid">
                                <div class="mb-3">
                                    <label for="nombre" class="form-label fw-semibold">Nombre De La Materia</label>
                                    <input type="text" class="form-control border-2 shadow-sm" id="nombre{{$materia->nombre}}" name="nombre" required value="{{$materia->nombre}}">
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

                                <div class="mb-3">
                                    <label for="nombre" class="form-label fw-semibold">Nombre Del Profesor</label>
                                    <select class="form-select border-2 shadow-sm" id="profesor_id" name="profesor_id" required>
                                        <option value="{{$materia->profesor_id}}">{{$materia->profesor->user->name}}</option>
                                        @foreach ($profesores as $profesor)
                                            @if ($profesor->id !== $materia->profesor_id)
                                            <option value="{{ $profesor->id }}">{{ $profesor->user->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @if ($errors->has('profesor_id'))
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




