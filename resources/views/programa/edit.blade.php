<div class="modal fade" id="modalEdit{{$programa->id}}" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">Editar Programa</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('programas.update', $programa->id) }}" method="post" class="needs-validation" novalidate>
                        @csrf
                        <div class="modal-body mb-2">
                            <div class="container-fluid">
                                <label for="nombre" class="form-label fw-semibold">Nombre Del Programa</label>
                                <input type="text" class="form-control border-2 shadow-sm" id="nombre{{$programa->nombre}}" name="nombre" required value="{{$programa->nombre}}">
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
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
        </div>
    </div>
</div>




