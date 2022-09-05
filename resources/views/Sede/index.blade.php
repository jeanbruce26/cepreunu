@extends('template')

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header align-items-center">
                    <div class=" d-flex justify-content-between">
                        <h4 class="card-title mb-0 flex-grow-1 fw-bold">SEDE</h4>
                        <a href="#newModal" type="button" class="btn btn-lg btn-primary pull-right d-flex justify-content-center align-items-center" data-bs-toggle="modal" data-bs-target="#newModal">Nuevo <i class="ri-add-circle-fill ms-1"></i></a>

                        @foreach ($sede as $item)
                        {{-- Modal Nuevo --}}
                        <div class="modal fade" id="newModal" tabindex="-1" aria-labelledby="newModal" aria-hidden="true">
                            <div class="modal-dialog modal-x1 modal-dialog-scrollable">
                                <div class="modal-content">
                                    @php
                                        $tipoConv = App\Models\TipoConvenio::where('id_tipo_convenio', $item->id_tipo_convenio)->get();
                                    @endphp
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Crear Sede</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('Sede.store') }}" method="POST">
                                        @csrf
                                        <div class="modal-body row g-3">
                                            <div class="mb-3 col-md-12">
                                                <label for="inputSede" class="form-label">Sede *</label>
                                                <input type="text" class="form-control" id="inputSede" name="sede" maxlength="200" onkeypress="return soloLetras(event)">
                                            </div>
                                            <div class="mb-3 col-md-12">
                                                <label>Tipo de Convenio *</label>
                                                <select class="form-select" name="id_tipo_convenio">
                                                    <option value="" selected>Seleccione</option>
                                                    @foreach ($tipoConv  as $tiCon)
                                                        <option value="{{$tiCon->id_tipo_convenio }}">{{$tiCon->tipo_convenio}}</option>
                                                    @endforeach
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
                        @endforeach

                    </div>
                </div><!-- end card header -->

                <div class="card-body">
                    <div class="live-preview">
                        <div class="table-responsive">
                            <table class="table align-middle table-nowrap mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th class="col-1">ID</th>
                                        <th >Sede</th>
                                        <th >Tipo de Convenio</th>
                                        <th class="col-1">Actiones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sede as $item)
                                        <tr>
                                            <td>{{$item->id_sede }}</td>
                                            <td>{{$item->sede}}</td>
                                            <td>{{$item->TipoConvenio->tipo_convenio }}</td>
                                            <td class="d-flex justify-content-star">
                                                <a href="#editModal" type="button" class="link-success fs-15" data-bs-toggle="modal" data-bs-target="#editModal{{$item->id_sede}}"><i class="bx bx-edit bx-sm bx-burst-hover ms-2"></i></a>

                                                {{-- Modal Update --}}
                                                <div class="modal fade" id="editModal{{$item->id_sede}}" tabindex="-1" aria-labelledby="editModal" aria-hidden="true">
                                                    <div class="modal-dialog  modal-x1 modal-dialog-scrollable">
                                                        <div class="modal-content">
                                                            @php
                                                                $tipoConv = App\Models\TipoConvenio::where('id_tipo_convenio', $item->id_tipo_convenio)->get();
                                                            @endphp
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="editModalLabel">Editar Sede</h5></h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form action="{{ route('Sede.update',$item->id_sede) }}" method="POST">
                                                            @csrf @method('PUT')
                                                                <div class="modal-body row g-3">
                                                                    <div class="mb-2 col-md-12">
                                                                        <label>Sede</label>
                                                                        <input class="form-control" type="text" id="inputSede" name="sede" value="{{ $item->sede }}" maxlength="200" onkeypress="return soloLetras(event)">
                                                                    </div>
                                                                    <div class="mb-2 col-md-12">
                                                                        <label>Tipo de Convenio</label>
                                                                        @foreach ($tipoConv as $tiCon)
                                                                            <select class="form-select" name="id_tipo_convenio">
                                                                                <option value="{{$tiCon->id_tipo_convenio}}" {{ $tiCon->id_tipo_convenio == $item->id_tipo_convenio ? 'selected' : '' }}>{{$tiCon->tipo_convenio}}</option>
                                                                            </select>
                                                                        @endforeach
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