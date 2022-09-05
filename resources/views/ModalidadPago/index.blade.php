@extends('template')

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header align-items-center">
                    <div class=" d-flex justify-content-between">
                        <h4 class="card-title mb-0 flex-grow-1 fw-bold">MODALIDAD DE PAGO</h4>
                        <a href="#newModal" type="button" class="btn btn-lg btn-primary pull-right d-flex justify-content-center align-items-center" data-bs-toggle="modal" data-bs-target="#newModal">Nuevo <i class="ri-add-circle-fill ms-1"></i></a>

                        {{-- Modal Nuevo --}}
                        <div class="modal fade" id="newModal" tabindex="-1" aria-labelledby="newModal" aria-hidden="true">
                            <div class="modal-dialog modal-x1 modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Crear Modalidad de Pago</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('ModalidadPago.store') }}" method="POST">
                                        @csrf
                                        <div class="modal-body row g-3">
                                            <div class="mb-3 col-md-12">
                                                <label for="inputModPago" class="form-label">Modalidad de Pago *</label>
                                                <input type="text" class="form-control" id="inputModPago" name="modalidad_pago" maxlength="200" onkeypress="return soloLetras(event)">
                                            </div>
                                            <div class="mb-3 col-md-12">
                                                <label for="inputMonto" class="form-label">Monto *</label>
                                                <input type="text" class="form-control" id="inputMonto" name="monto" maxlength="13" onkeypress="return soloNumeros(event)">
                                            </div>
                                            <div class="mb-3 col-md-12">
                                                <label for="inputEstado" class="form-label">Estado *</label>
                                                <select class="form-select" id="inputEstado" name="estado"> 
                                                    <option value="" selected>Seleccione</option>
                                                    <option value="1">Activo</option>
                                                    <option value="2">Inactivo</option>
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
                        {{-- Modal Nuevo --}}

                    </div>
                </div><!-- end card header -->

                <div class="card-body">
                    <div class="live-preview">
                        <div class="table-responsive">
                            <table class="table align-middle table-nowrap mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th class="col-1">ID</th>
                                        <th >Modalidad de Pago</th>
                                        <th >Monto</th>
                                        <th class="col-1">Estado</th>
                                        <th class="col-1">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($modPago as $item)
                                        <tr>
                                            <td>{{$item->id_modalidad_pago }}</td>
                                            <td>{{$item->modalidad_pago}}</td>
                                            <td>{{$item->monto}}</td>
                                            <td>
                                                @if($item->estado == 1)
                                                    <span class="badge bg-success">Activo</span>
                                                @else
                                                    <span class="badge bg-danger">Inactivo</span>
                                                @endif
                                            </td>
                                            <td class="d-flex justify-content-star">
                                                <a href="#editModal" type="button" class="link-success fs-15" data-bs-toggle="modal" data-bs-target="#editModal{{$item->id_modalidad_pago}}"><i class="bx bx-edit bx-sm bx-burst-hover ms-2"></i></a>

                                                {{-- Modal Update --}}
                                                <div class="modal fade" id="editModal{{$item->id_modalidad_pago}}" tabindex="-1" aria-labelledby="editModal" aria-hidden="true">
                                                    <div class="modal-dialog  modal-x1 modal-dialog-scrollable">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="editModalLabel">Editar Modalidad de Pago</h5></h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form action="{{ route('ModalidadPago.update',$item->id_modalidad_pago) }}" method="POST">
                                                            @csrf @method('PUT')
                                                                <div class="modal-body row g-3">
                                                                    <div class="mb-2 col-md-12">
                                                                        <label>Modalidad de Pago</label>
                                                                        <input class="form-control" type="text" id="inputModPago" name="modalidad_pago" value="{{ $item->modalidad_pago }}" maxlength="200" onkeypress="return soloLetras(event)">
                                                                    </div>
                                                                    <div class="mb-2 col-md-12">
                                                                        <label>Monto</label>
                                                                        <input class="form-control" type="text" id="inputMonto" name="monto" value="{{ $item->monto }}" maxlength="13" onkeypress="return soloNumeros(event)">
                                                                    </div>
                                                                    <div class="mb-2 col-md-12">
                                                                        <label>Estado</label>
                                                                        <select class="form-select" name="estado">
                                                                            <option selected>Seleccione</option>
                                                                            <option value="1" {{ '1' == $item->estado ? 'selected' : '' }}>Activo</option>
                                                                            <option value="2" {{ '2' == $item->estado ? 'selected' : '' }}>Incativo</option>
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
                                                {{-- Modal Update --}}
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