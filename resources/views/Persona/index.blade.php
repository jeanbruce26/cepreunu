@extends('template')

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1 fw-bold">PERSONA</h4>
                    <div class="col-sm">
                        <div class="d-flex justify-content-sm-end">
                            <div class="search-box ms-2">
                                <input type="text" class="form-control search" placeholder="Buscar...">
                                <i class="ri-search-line search-icon"></i>
                            </div>
                        </div>
                    </div>
                </div><!-- end card header -->

                <div class="card-body">
                    <div class="live-preview">
                        <div class="table-responsive">
                            <table class="table align-middle table-nowrap mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th class="col-1">ID</th>
                                        <th>Documento</th>
                                        <th>Nombre Completo</th>
                                        <th>Fecha de Nacimiento</th>
                                        <th>Sexo</th>
                                        <th>Celular</th>
                                        <th class="col-1">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($perso as $item)
                                        <tr>
                                            <td>{{$item->id_persona}}</td>
                                            <td>{{$item->numero_documento}}</td>
                                            <td>{{$item->nombres}} {{$item->apellido_paterno}} {{$item->apellido_materno}}</td>
                                            <td>{{date('d-m-Y', strtotime($item->fecha_nacimiento))}}</td>
                                            <td>{{$item->sexo}}</td>
                                            <td>{{$item->celular}}</td>
                                            <td class="d-flex justify-content-star">
                                                <a href="#detalleModal" type="button" class="link-info fs-15" data-bs-toggle="modal" data-bs-target="#showModal{{$item->id_persona}}"><i class="bx bx-info-circle bx-sm bx-burst-hover"></i></a>

                                                {{-- Modal Show --}}
                                                <div class="modal fade" id="showModal{{$item->id_persona}}" tabindex="-1" aria-labelledby="showModal" aria-hidden="true">
                                                    <div class="modal-dialog  modal-lg modal-dialog-scrollable">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="showModalLabel">Detalles de Alumno</h5></h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body row g-3">
                                                                <div class="mb-2 col-md-4">
                                                                    <label for="inputDNI" class="form-label">
                                                                        @if (strlen($item->numero_documento) > 8)
                                                                            Canet de Extrangería
                                                                        @else
                                                                            DNI
                                                                        @endif
                                                                    </label>
                                                                    <input class="form-control" type="text" value="{{ $item->numero_documento }}" disabled>
                                                                </div>
                                                                <div class="mb-2 col-md-4">
                                                                    <label>Nombres</label>
                                                                    <input class="form-control" type="text" value="{{ $item->nombres }}" disabled>
                                                                </div>
                                                                <div class="mb-2 col-md-4">
                                                                    <label>Apellidos</label>
                                                                    <input class="form-control" type="text" value="{{ $item->apellido_paterno }} {{ $item->apellido_materno }}" disabled>
                                                                </div>
                                                                <div class="mb-2 col-md-4">
                                                                    <label>Fecha de Nacimiento</label>
                                                                    <input class="form-control" type="text" value="{{ date('d-m-Y', strtotime($item->fecha_nacimiento)) }}" disabled>
                                                                </div>
                                                                <div class="mb-2 col-md-4">
                                                                    <label>Dirección</label>
                                                                    <input class="form-control" type="text" value="{{ $item->direccion }}" disabled>
                                                                </div>
                                                                <div class="mb-2 col-md-4">
                                                                    <label>Celular</label>
                                                                    <input class="form-control" type="text" value="{{ $item->celular }}" disabled>
                                                                </div>
                                                                <div class="mb-2 col-md-4">
                                                                    <label>Sexo</label>
                                                                    <input class="form-control" type="text" value="{{ $item->sexo }}" disabled>
                                                                </div>
                                                                <div class="mb-2 col-md-4">
                                                                    <label>Email</label>
                                                                    <input class="form-control" type="text" value="{{ $item->email }}" disabled>
                                                                </div>
                                                                <div class="mb-2 col-md-4">
                                                                    <label>Año de egreso</label>
                                                                    <input class="form-control" type="text" value="{{ $item->año_egreso }}" disabled>
                                                                </div>
                                                                <div class="mb-2 col-md-4">
                                                                    <label>Estado civil</label>
                                                                    <input class="form-control" type="text" value="{{ $item->EstadoCivil->estado_civil }}" disabled>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <label>Ubigeo</label>
                                                                    <input class="form-control" type="text" value="{{ $item->ubigeo->ubigeo }} / {{ $item->ubigeo->distrito }} / {{ $item->ubigeo->provincia }} / {{ $item->ubigeo->departamento }}" disabled>
                                                                </div>
                                                                <div class="mb-2 col-md-4">
                                                                    <label>Nombre de Apoderado</label>
                                                                    <input class="form-control" type="text" value="{{ $item->nombre_apoderado }}" disabled>
                                                                </div>
                                                                <div class="mb-2 col-md-4">
                                                                    <label>Celular de Apoderado</label>
                                                                    <input class="form-control" type="text" value="{{ $item->celular_apoderado }}" disabled>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label>Lengua Materna</label>
                                                                    <input class="form-control" type="text" value="{{ $item->LenguaMaterna->lengua_materna }}" disabled>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label>Discapacidad</label>
                                                                    <input class="form-control" type="text" value="{{$item->discapacidad->discapacidad}}"disabled> 
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <a type="button" class="btn btn-secondary d-flex justify-content-center align-items-center" data-bs-dismiss="modal"><i class=" ri-close-line me-1 ri-lg"></i>Cerrar</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- Modal Show --}}

                                                <a href="#editModal" type="button" class="link-success fs-15" data-bs-toggle="modal" data-bs-target="#editModal{{$item->id_persona}}"><i class="bx bx-edit bx-sm bx-burst-hover ms-2"></i></a>

                                                {{-- Modal Update --}}
                                                <div class="modal fade" id="editModal{{$item->id_persona}}" tabindex="-1" aria-labelledby="editModal" aria-hidden="true">
                                                    <div class="modal-dialog  modal-lg modal-dialog-scrollable">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="editModalLabel">Editar Alumno</h5></h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form action="{{ route('Persona.update',$item->id_persona) }}" method="POST">
                                                            @csrf @method('PUT')
                                                                <div class="modal-body row g-3">
                                                                    <div class="mb-2 col-md-4">
                                                                        <label for="inputNumDoc" class="form-label">
                                                                            @if (strlen($item->numero_documento) > 8)
                                                                                Canet de Extrangería
                                                                            @else
                                                                                DNI
                                                                            @endif
                                                                        </label>
                                                                        <input class="form-control" type="text" id="inputNumDoc" name="numero_documento" value="{{ $item->numero_documento }}" maxlength="9" onkeypress="return soloNumeros(event)">
                                                                    </div>
                                                                    <div class="mb-2 col-md-4">
                                                                        <label>Nombres</label>
                                                                        <input class="form-control" type="text" id="inputNombres" name="nombres" value="{{ $item->nombres }}" maxlength="200" onkeypress="return soloLetras(event)">
                                                                    </div>
                                                                    <div class="mb-2 col-md-4">
                                                                        <label>Apellido Paterno</label>
                                                                        <input class="form-control" type="text" id="inputApePater" name="apellido_paterno" value="{{ $item->apellido_paterno }}" maxlength="200" onkeypress="return soloLetras(event)">
                                                                    </div>
                                                                    <div class="mb-2 col-md-4">
                                                                        <label>Apellido Materno</label>
                                                                        <input class="form-control" type="text" id="inputApeMater" name="apellido_materno" value="{{ $item->apellido_materno }}" maxlength="200" onkeypress="return soloLetras(event)">
                                                                    </div>
                                                                    <div class="mb-2 col-md-4">
                                                                        <label>Fecha de Nacimiento</label>
                                                                        <input class="form-control" type="date" id="inputFechaNac" name="fecha_nacimiento" value="{{ $item->fecha_nacimiento }}">
                                                                    </div>
                                                                    <div class="mb-2 col-md-4">
                                                                        <label>Dirección</label>
                                                                        <input class="form-control" type="text" id="inputDireccion" name="direccion" value="{{ $item->direccion }}" maxlength="200">
                                                                    </div>
                                                                    <div class="mb-2 col-md-4">
                                                                        <label>Celular</label>
                                                                        <input class="form-control" type="text" id="inputCelular" name="celular" value="{{ $item->celular }}" maxlength="9" onkeypress="return soloNumeros(event)">
                                                                    </div>
                                                                    <div class="mb-2 col-md-4">
                                                                        <label>Sexo</label>
                                                                        <select id="inputSexo" class="form-select" name="estado">
                                                                            <option value="" selected>Seleccione</option>
                                                                            <option value="Activo" {{ $item->sexo == "MASCULINO" ? 'selected' : '' }}> MASCULINO</option>
                                                                            <option value="Inactivo" {{ $item->sexo == "FEMENINO" ? 'selected' : '' }}> FEMENINO</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="mb-2 col-md-4">
                                                                        <label>Email</label>
                                                                        <input class="form-control" type="email" id="inputEmail" name="email" value="{{ $item->email }}" maxlength="200">
                                                                    </div>
                                                                    <div class="mb-2 col-md-4">
                                                                        <label>Año de egreso</label>
                                                                        <select class="form-select" name="id_egreso">
                                                                            <option value="" selected>Seleccione...</option>
                                                                            @foreach ($egreso as $eg)
                                                                                <option value="{{$eg->id_egreso}}" {{ $eg->id_egreso  == $item->id_egreso ? 'selected' : '' }}>{{$eg->egreso}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <label>Ubigeo</label>
                                                                        <input class="form-control" type="text" value="{{ $item->ubigeo->ubigeo }} / {{ $item->ubigeo->distrito }} / {{ $item->ubigeo->provincia }} / {{ $item->ubigeo->departamento }}" disabled>
                                                                    </div>
                                                                    <div class="mb-2 col-md-4">
                                                                        <label>Estado civil</label>
                                                                        <select class="form-select" name="id_estado_civil">
                                                                            <option value="" selected>Seleccione</option>
                                                                            @foreach ($estadoCivil  as $estCiv)
                                                                                <option value="{{$estCiv->id_estado_civil   }}" {{ $estCiv->id_estado_civil  == $item->id_estado_civil  ? 'selected' : '' }}>{{$estCiv->estado_civil}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="mb-2 col-md-4">
                                                                        <label>Nombre de Apoderado</label>
                                                                        <input class="form-control" type="text" id="inputNombreApode" name="nombre_apoderado" value="{{ $item->nombre_apoderado }}" maxlength="200" onkeypress="return soloLetras(event)">
                                                                    </div>
                                                                    <div class="mb-2 col-md-4">
                                                                        <label>Celular de Apoderado</label>
                                                                        <input class="form-control" type="text" id="inputCelularApode" name="celular_apoderado" value="{{ $item->celular_apoderado }}" maxlength="9" onkeypress="return soloNumeros(event)">
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <label>Lengua Materna</label> 
                                                                        <select class="form-select" name="id_lengua_materna">
                                                                            <option value="" selected>Seleccione...</option>
                                                                            @foreach ($lengMater as $legMa)
                                                                                <option value="{{$legMa->id_lengua_materna }}" {{ $legMa->id_lengua_materna  == $item->id_lengua_materna ? 'selected' : '' }}>{{$legMa->lengua_materna}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <label>Discapacidad</label>
                                                                        <select class="form-select" name="discapacidad">
                                                                            <option value="" selected>Seleccione...</option>
                                                                            @foreach ($disca as $ite)
                                                                                <option value="{{$ite->id_discapacidad }}" {{ $ite->id_discapacidad  == $item->id_discapacidad ? 'selected' : '' }}>{{$ite->discapacidad}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer col-12 d-flex justify-content-between">
                                                                    <a type="button" class="btn btn-secondary d-flex justify-content-center align-items-center" data-bs-dismiss="modal"><i class="bx bx-chevron-left me-1 bx-sm"></i>Cancelar</a>
                                                                    <button type="submit" class="btn btn-primary d-flex justify-content-center align-items-center">Guardar <i class="bx bx-edit ms-1 bx-xs"></i></button>
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