<div>
    <form class="row" method="post" wire:submit.prevent='sedes' novalidate>
        @csrf
        <div class="tab-content">
            <div class="tab-pane fade show active">
                <h5 class="card-header fw-bold">Escoge tu Sede y Proceso Académico</h5>

                <div class="card-body row">
                    <h6 class="mb-3">Escoge tu Sede y Proceso Académico con mucho cuidado, ya que estos no podran ser modificados posteriormente: </h6>

                    <div class="mb-3 col-6">
                        <label class="form-label">Sede *</label>
                        <select class="form-select @error('sede') is-invalid @enderror" wire:model="sede" aria-label="Default select example">
                            <option value="" selected>Seleccione</option>
                            @foreach($sedee as $item)
                            <option value="{{$item->sede}}" {{ old('sede') == $item->id_sede ? 'selected' : '' }}>{{$item->sede}} @if ($item->id_tipo_convenio == null)  @else {{'(CONVENIO)'}} @endif</option>
                            @endforeach
                        </select>
                        @error('sede')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3 col-6">
                        <label class="form-label">Proceso *</label>
                        <input type="hidden" wire:model.defer="proceso" value="">
                        <input type="hidden" wire:model.defer="pago_id" value="">
                        <input type="text" class="form-control" value="PROCESO {{$procesoo->año}} - {{$procesoo->numero_proceso}}" disabled>
                    </div>
                </div>
                
                <div class="d-flex align-items-start gap-3 mt-4">
                    {{-- <a href="{{route('usuario-terminos-condiciones')}}" class="btn btn-link text-decoration-none btn-label"><i class="ri-arrow-left-line label-icon align-middle fs-16 me-2"></i>Anterior</a> --}}
                    <button type="submit" class="btn btn-success btn-label right ms-auto"><i class="ri-arrow-right-line label-icon align-middle fs-16 ms-2"></i>Siguiente</button>
                </div>
            </div>
            <!-- end tab pane -->
        </div>
        <!-- end tab content -->
    </form>
</div>
