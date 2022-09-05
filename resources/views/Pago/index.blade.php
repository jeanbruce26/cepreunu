@extends('template')

@section('content')
    
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header align-items-center">
                    <div class=" d-flex justify-content-between">
                        <h4 class="card-title mb-0 flex-grow-1 fw-bold">PAGO</h4>
                        <a href="#newModal" type="button" class="btn btn-lg btn-primary pull-right d-flex justify-content-center align-items-center" data-bs-toggle="modal" data-bs-target="#newModal">Nuevo <i class="ri-add-circle-fill ms-1"></i></a>
                    </div>

                    @foreach ($pago as $item)
                        {{-- Modal Nuevo --}}
                        <div class="modal fade" id="newModal" tabindex="-1" aria-labelledby="newModal" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                <div class="modal-content">
                                    @php
                                        $modPago = App\Models\ModalidadPago::where('id_modalidad_pago', $item->id_modalidad_pago)->get();
                                    @endphp
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Crear Pago</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('Pago.store') }}" method="POST">
                                    @csrf
                                        <div class="modal-body row g-3">
                                            <div class="mb-3 col-md-4">
                                                <label for="inputDNI" class="form-label">DNI *</label>
                                                <input type="text" class="form-control" id="inputDNI" name="dni" maxlength="9" onkeypress="return soloNumeros(event)" required>
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label for="inputNumOpe" class="form-label">Número de Operación *</label>
                                                <input type="text" class="form-control" id="inputNumOpe" name="numero_operacion" onkeypress="return soloNumeros(event)">
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label for="inputMonto" class="form-label">Monto *</label>
                                                <input type="text" class="form-control" id="inputMonto" name="monto" onkeypress="return soloNumeros(event)">
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label for="inputFechaPago" class="form-label">Fecha de Pago *</label>
                                                <input type="date" class="form-control" id="inputFechaPago" name="fecha_pago"> 
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label for="inputModalidadPago" class="form-label">Modalidad de Pago *</label>
                                                <select class="form-select" name="id_modalidad_pago">
                                                    <option value="" selected>Seleccione</option>
                                                    @foreach ($modPago  as $mod)
                                                        <option value="{{$mod->id_modalidad_pago }}">{{$mod->modalidad_pago}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer col-12 d-flex justify-content-between">
                                            <a type="button" class="btn btn-secondary d-flex justify-content-center align-items-center btn-lg" data-bs-dismiss="modal"><i class="bx bx-chevron-left me-1 bx-1x"></i>Cancelar</a>
                                            <button type="submit" class="btn btn-primary d-flex justify-content-center align-items-center btn-lg">Guardar <i class="bx bx-edit ms-1 ri-1x"></i></button>
                                        </div>
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                
                                            </div>
                                        @endif
                                    </form>
                                </div>
                            </div>
                        </div>
                        {{-- Modal Nuevo --}}
                    @endforeach
                </div><!-- end card header -->

                <div class="card-body">
                    <div class="live-preview">
                        <div class="table-responsive">
                            <table class="table align-middle table-nowrap mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th class="col-1">ID</th>
                                        <th>Documento</th>
                                        <th>Número de Operación</th>
                                        <th>Monto</th>
                                        <th>Fecha de Pago</th>
                                        <th>Modalidad de Pago</th>
                                        <th class="col-1">Estado</th>
                                        <th> </th>
                                        <th class="col-1">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pago as $item)
                                        <tr>
                                            <td>{{$item->id_pago}}</td>
                                            <td>{{$item->dni}}</td>
                                            <td>{{$item->numero_operacion}}</td>
                                            <td>S/. {{$item->monto}}</td>
                                            <td>{{$item->fecha_pago}}</td>
                                            <td>{{$item->ModalidadPago->modalidad_pago}}</td>
                                            <td>
                                                @if($item->estado == 1)
                                                    <div class="progress progress-sm">
                                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                @else
                                                    @if ($item->estado == 2)
                                                        <div class="progress progress-sm">
                                                            <div class="progress-bar bg-secondary" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    @else
                                                        <div class="progress progress-sm">
                                                            <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    @endif
                                                    
                                                @endif
                                            </td>
                                            <td>
                                                @if($item->estado == 1)
                                                    <span class="badge bg-warning">Pagado</span>
                                                @else
                                                    @if ($item->estado == 2)
                                                        <span class="badge bg-secondary">Verificado</span>
                                                    @else
                                                        <span class="badge bg-success">Inscripto</span>
                                                    @endif
                                                    
                                                @endif
                                            </td>
                                            <td class="d-flex justify-content-star">
                                                <a href="#editModal" type="button" class="link-success fs-15" data-bs-toggle="modal" data-bs-target="#editModal{{$item->id_pago}}"><i class="bx bx-edit bx-sm bx-burst-hover"></i></a>

                                                {{-- Modal Editar --}}
                                                <div class="modal fade" id="editModal{{$item->id_pago}}" tabindex="-1" aria-labelledby="editModal" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                                        <div class="modal-content">
                                                            @php
                                                                $modPago = App\Models\ModalidadPago::where('id_modalidad_pago', $item->id_modalidad_pago)->get();
                                                            @endphp
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Editar Pago</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form action="{{ route('Pago.update',$item->id_pago) }}" method="POST">
                                                            @csrf @method('PUT')
                                                                <div class="modal-body row g-3">
                                                                    <div class="mb-3 col-md-4">
                                                                        <label for="inputDNI" class="form-label">DNI *</label>
                                                                        <input type="text" class="form-control" id="inputDNI" name="dni" value="{{ $item->dni }}" maxlength="9" onkeypress="return soloNumeros(event)">
                                                                    </div>
                                                                    <div class="mb-3 col-md-4">
                                                                        <label for="inputNumOpe" class="form-label">Número de Operación *</label>
                                                                        <input type="text" class="form-control" id="inputNumOpe" name="numero_operacion" value="{{ $item->numero_operacion }}" onkeypress="return soloNumeros(event)">
                                                                    </div>
                                                                    <div class="mb-3 col-md-4">
                                                                        <label for="inputMonto" class="form-label">Monto *</label>
                                                                        <input type="text" class="form-control" id="inputMonto" name="monto" value="{{ $item->monto }}" onkeypress="return soloNumeros(event)">
                                                                    </div>
                                                                    <div class="mb-3 col-md-4">
                                                                        <label for="inputFechaPago" class="form-label">Fecha de Pago *</label>
                                                                        <input type="date" class="form-control" id="inputFechaPago" name="fecha_pago" value="{{ $item->fecha_pago }}"> 
                                                                    </div>
                                                                    <div class="mb-3 col-md-4">
                                                                        <label for="inputModalidadPago" class="form-label">Modalidad de Pago *</label>
                                                                        <select class="form-select" name="inputModalidadPago">
                                                                            <option value="" selected>Seleccione</option>
                                                                            @foreach ($modPago  as $mod)
                                                                                <option value="{{$mod->id_modalidad_pago   }}" {{ $mod->id_modalidad_pago  == $item->id_modalidad_pago  ? 'selected' : '' }}>{{$mod->modalidad_pago}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="mb-3 col-md-4">
                                                                        <label for="inputEstado" class="form-label">Estado *</label>
                                                                        <select class="form-select" name="estado">
                                                                            <option value="" selected>Seleccione</option>
                                                                            <option value="1" {{ '1' == $item->estado ? 'selected' : '' }}>Activo</option>
                                                                            <option value="2" {{ '2' == $item->estado ? 'selected' : '' }}>Inactivo</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer col-12 d-flex justify-content-between">
                                                                    <a type="button" class="btn btn-secondary d-flex justify-content-center align-items-center btn-lg" data-bs-dismiss="modal"><i class="bx bx-chevron-left me-1 bx-1x"></i>Cancelar</a>
                                                                    <button type="submit" class="btn btn-primary d-flex justify-content-center align-items-center btn-lg">Guardar <i class="bx bx-edit ms-1 ri-1x"></i></button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- Modal Editar --}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="d-none code-view">
                        <pre class="language-markup" style="height: 275px;"><code>&lt;table class=&quot;table table-nowrap&quot;&gt;
                    </div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
    </div>
    <!-- end row -->

@endsection