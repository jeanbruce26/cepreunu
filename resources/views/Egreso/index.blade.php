@extends('template')

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header align-items-center">
                    <div class=" d-flex justify-content-between">
                        <h4 class="card-title mb-0 flex-grow-1 fw-bold">EGRESO</h4>
                        <a href="#newModal" type="button" class="btn btn-lg btn-primary pull-right d-flex justify-content-center align-items-center" data-bs-toggle="modal" data-bs-target="#newModal">Nuevo <i class="ri-add-circle-fill ms-1"></i></a>

                        {{-- Modal Nuevo --}}
                        <div class="modal fade" id="newModal" tabindex="-1" aria-labelledby="newModal" aria-hidden="true">
                            <div class="modal-dialog modal-x1 modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Crear Carrera</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('Egreso.store') }}" method="POST">
                                    @csrf
                                        <div class="modal-body row g-3">
                                            <div class="mb-3 col-md-12">
                                                <label for="inputEgreso" class="form-label">Egreso *</label>
                                                <input type="text" class="form-control" id="inputEgreso" name="egreso" maxlength="4" onkeypress="return soloNumeros(event)">
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
                                        <th >Egreso</th>
                                        <th class="col-1">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($egreso as $item)
                                        <tr>
                                            <td>{{$item->id_egreso}}</td>
                                            <td>{{$item->egreso}}</td>
                                            <td class="d-flex justify-content-star">
                                                <a href="#editModal" type="button" class="link-success fs-15" data-bs-toggle="modal" data-bs-target="#editModal{{$item->id_egreso}}"><i class="bx bx-edit bx-sm bx-burst-hover ms-2"></i></a>

                                                {{-- Modal Update --}}
                                                <div class="modal fade" id="editModal{{$item->id_egreso}}" tabindex="-1" aria-labelledby="editModal" aria-hidden="true">
                                                    <div class="modal-dialog  modal-x1 modal-dialog-scrollable">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="editModalLabel">Editar Egreso</h5></h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form action="{{ route('Egreso.update',$item->id_egreso) }}" method="POST">
                                                            @csrf @method('PUT')
                                                                <div class="modal-body row g-3">
                                                                    <div class="mb-2 col-md-12">
                                                                        <label>Carrera</label>
                                                                        <input class="form-control" type="text" id="inputEgreso" name="egreso" value="{{ $item->egreso }}" maxlength="4" onkeypress="return soloNumeros(event)">
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