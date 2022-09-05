@extends('template')

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1 fw-bold">INSCRIPCIÓN</h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <div class="live-preview">
                        <div class="table-responsive">
                            <table class="table align-middle table-nowrap mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th class="col-1">ID</th>
                                        <th >Alumno</th>
                                        <th >Sede</th>
                                        <th >Carrera</th>
                                        <th >Modalidad</th>
                                        <th >Turno</th>
                                        <th >Pago</th>
                                        <th>Estado</th>
                                        <th class="col-1">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $sumaPagos = 0;
                                    @endphp
                                    @foreach ($insc as $item)
                                        @php
                                            $pago = App\Models\Pago::where('id_inscripcion', $item->id_inscripcion)->get();
                                            foreach ($pago as $value) {
                                                $sumaPagos += $value->monto;
                                            }
                                        @endphp
                                        <tr>
                                            <td>{{$item->id_inscripcion}}</td>
                                            <td>
                                                <div class="d-flex gap-2 align-items-center">
                                                    <div class="flex-shrink-0">
                                                        <img src="assets/images/users/avatar-5.jpg" alt="" class="avatar-xs rounded-circle" />
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        {{$item->persona->nombres}} {{$item->persona->apellido_paterno}} {{$item->persona->apellido_materno}}
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{$item->SedeCarrera->sede->sede}}</td>
                                            <td>{{str_replace('CARRERA PROFESIONAL DE ','',$item->SedeCarrera->carrera->carrera)}}</td>
                                            <td>{{$item->SedeCarrera->modalidad->modalidad}}</td>
                                            <td>{{$item->turno}}</td>
                                            <td>S/. {{number_format($sumaPagos, 2)}}</td>
                                            <td>
                                                @if($item->estado == 1)
                                                    <span class="badge bg-success">Activo</span>
                                                @else
                                                    <span class="badge bg-danger">Inactivo</span>
                                                @endif
                                            </td>
                                            <td class="d-flex justify-content-star">
                                                <a href="#detalleModal" type="button" class="link-info fs-15" data-bs-toggle="modal" data-bs-target=""><i class="bx bx-info-circle bx-sm bx-burst-hover"></i></a>
                                                <a href="#editModal" type="button" class="link-success fs-15" data-bs-toggle="modal" data-bs-target=""><i class="bx bx-edit bx-sm bx-burst-hover ms-2"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @php
                                        $sumaPagos = 0;
                                    @endphp
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