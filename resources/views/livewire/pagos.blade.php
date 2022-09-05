<div>
    <div class="card-body w-100">
        <h6 class="mb-3">A continuación, selecciona tu Modalidad de Pago y proporciona tu N° de Documento de Identidad: </h6>

        <form class="row" method="POST" wire:submit.prevent='buscarPago' novalidate>
            @csrf
            <div class="col-4">
                <label class="form-label">Modalidad de pago *</label>
                <select class="form-select @error('modalidad_pago2') is-invalid @enderror" wire:model="modalidad_pago2" aria-label="Default select example">
                    <option value="" selected>Seleccione</option>
                    @foreach ($modalidad_pago as $item)
                    <option value="{{$item->id_modalidad_pago}}" {{ old('modalidad_pago') == $item->id_modalidad_pago ? 'selected' : '' }}>{{$item->modalidad_pago}}</option>
                    @endforeach
                </select>
                {{-- @error('tipo_documento')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror --}}
            </div>
            <div class="col-3">
                <label class="form-label">Tipo de documento *</label>
                <select class="form-select @error('tipo_documento2') is-invalid @enderror" wire:model="tipo_documento2" aria-label="Default select example">
                    <option value="" selected>Seleccione</option>
                    @foreach ($tipo_documento as $item)
                    <option value="{{$item->id_tipo_documento}}" {{ old('tipo_documento') == $item->id_tipo_documento ? 'selected' : '' }}>{{$item->tipo_documento}}</option>
                    @endforeach
                </select>
                {{-- @error('tipo_documento')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror --}}
            </div>
            <div class="col-3">
                <label class="form-label">Documento *</label>
                <input type="text" id="documento" wire:model="documento" class="form-control @error('documento') is-invalid  @enderror" placeholder="Ingrese su documento">
                {{-- @error('documento')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror --}}
            </div>
            <div class="col-2 d-flex align-items-end">
                <button type="submit" class="btn btn-success w-100">Buscar</button>
            </div>
        </form>
        @if (session('mensaje-dni'))
            <div class="alert alert-danger mt-1 mb-1">{{ session('mensaje-dni') }}</div>
        @endif
    </div>

    <form class="row" method="POST" wire:submit.prevent='guardarPago' novalidate>
        @csrf
        <div class="card-body w-100">
            <div class="">
                <!-- Striped Rows -->
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col" class="col-1">Nro</th>
                            <th scope="col" class="col-3">Fecha</th>
                            <th scope="col" class="col-4">Número Operación</th>
                            <th scope="col" class="col-3">Importe</th>
                            <th scope="col" class="col-1">Seleccionar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($pago))
                        @php
                            $valor = 0;
                        @endphp
                        @foreach ($pago as $item)
                        <tr>
                            <th scope="row">{{$item->id_pago}}</th>
                            <td>{{$item->fecha_pago->format('d/m/Y')}}</td>
                            <td>{{$item->numero_operacion}}</td>
                            <td>{{$item->monto}}</td>
                            <td align="center">
                                <input type="checkbox" wire:model="seleccionar" value="{{$item->id_pago}}" wire:click="contarMonto({{$item->id_pago}},{{$valor}})">
                            </td>
                        </tr>
                        @php
                            $valor++;
                        @endphp
                        @endforeach
                        @else
                        <tr>
                            <th scope="row" colspan="5"></th>
                        </tr>
                        @endif
                    </tbody>
                </table>
                <div class="d-flex justify-content-end me-4">
                    <strong>Total: S/. {{$total}}</strong>
                    <input type="hidden" wire:model="total" value="{{$total}}">
                </div>
                @if (session('mensaje-seleccionar'))
                    <div class="alert alert-danger my-2">{{ session('mensaje-seleccionar') }}</div>
                @endif
            </div>
        </div>

        <input type="hidden" wire:model="id_inscripcion" id="">
        
        <div class="d-flex align-items-start gap-3">
            {{-- <a href="{{route('usuario-terminos-condiciones')}}" class="btn btn-link text-decoration-none btn-label"><i class="ri-arrow-left-line label-icon align-middle fs-16 me-2"></i>Anterior</a> --}}
            <button type="submit" class="btn btn-primary btn-label right ms-auto"><i class="ri-arrow-up-line label-icon align-middle fs-16 ms-2"></i>Guardar</button>
        </div>
    </form>
</div>

@push('js')
    <script>
        
    </script>
@endpush