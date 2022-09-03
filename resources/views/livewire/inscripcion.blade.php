<div class="p-2">

    <form class="row" method="POST" wire:submit.prevent='inscripcion' enctype="multipart/form-data" novalidate>

        @csrf

        {{-- paso 1 --}}
        @if ($pasoactual == 1)
        <div>
            <h4 class="text-center bg-success  text-white p-2 rounded-pill">Paso 1 / 3</h4>
            <h5 class="card-header fw-bold">Información personal</h5>

            <div class="card-body w-100">
                <h6 class="mb-1">Es momento de poner tu información personal, recuerda que en esta sección SOLO DEBE PROPORCIONAR TU INFORMACIÓN, NO LA DE TUS FAMILIARES.</h6>
                <div class="row g-3 col-10 m-auto">
                    <div class="col-4">
                        <label class="form-label">Primer Apellido *</label>
                        <input type="text" wire:model="apellido_paterno" onkeyup="mayus(this);" class="form-control @error('apellido_paterno') is-invalid  @enderror" placeholder="Ingrese su apellido paterno">
                    </div>
                    
                    <div class="col-4">
                        <label class="form-label">Segundo Apellido *</label>
                        <input type="text" wire:model="apellido_materno" onkeyup="mayus(this);" class="form-control @error('apellido_materno') is-invalid  @enderror" placeholder="Ingrese su apellido materno">
                    </div>
                    
                    <div class="col-4">
                        <label class="form-label">Nombres *</label>
                        <input type="text" wire:model="nombres" onkeyup="mayus(this);" class="form-control @error('nombres') is-invalid  @enderror" placeholder="Ingrese sus nombres">
                    </div>

                    <div class="col-4">
                        <label class="form-label">Fecha de nacimiento *</label>
                        <input type="date" wire:model="fecha_nacimiento" class="form-control @error('fecha_nacimiento') is-invalid  @enderror">
                    </div>

                    <div class="col-8" wire:ignore>
                        <label class="form-label">Ubigeo de documento de identidad *</label>
                        <select class="form-select ubigeo-select2 @error('ubigeo') is-invalid  @enderror" wire:model="ubigeo">
                            <option value="" selected>Seleccione</option>
                            @foreach ($ubigeos as $item)
                            <option value="{{$item->id_ubigeo}}" {{ $item->id_ubigeo == old('ubigeo') ? 'selected' : '' }}>@if (strlen($item->ubigeo) == 5) 0{{$item->ubigeo}} @else {{$item->ubigeo}} @endif / {{$item->distrito}} / {{$item->provincia}} / {{$item->departamento}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-4">
                        <label class="form-label">Genero *</label>
                        <select class="form-select @error('genero') is-invalid  @enderror" aria-label="Default select example" wire:model="genero">
                            <option value="" selected>Seleccione</option>
                            <option value="MASCULINO">MASCULINO</option>
                            <option value="FEMENINO">FEMENINO</option>
                        </select>
                    </div>

                    <div class="col-4">
                        <label class="form-label">Lengua Materna *</label>
                        <select class="form-select @error('lengua_materna') is-invalid  @enderror" aria-label="Default select example" wire:model="lengua_materna">
                            <option value="" selected>Seleccione</option>
                            @foreach ($lengua as $item)
                            <option value="{{$item->id_lengua_materna}}" {{ $item->id_lengua_materna == old('lengua_materna') ? 'selected' : '' }}>{{$item->lengua_materna}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-4">
                        <label class="form-label">Estado Civil *</label>
                        <select class="form-select @error('estado_civil') is-invalid  @enderror" aria-label="Default select example" wire:model="estado_civil">
                            <option value="" selected>Seleccione</option>
                            @foreach ($estado_ci as $item)
                            <option value="{{$item->id_estado_civil}}" {{ $item->id_estado_civil == old('estado_civil') ? 'selected' : '' }}>{{$item->estado_civil}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-4">
                        <label class="form-label">Etnia *</label>
                        <select class="form-select @error('etnia') is-invalid  @enderror" aria-label="Default select example" wire:model="etnia">
                            <option value="" selected>Seleccione</option>
                            @foreach ($etni as $item)
                            <option value="{{$item->id_etnia}}" {{ $item->id_etnia == old('etnia') ? 'selected' : '' }}>{{$item->etnia}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-8">
                        <label class="form-label">Discapacidad *</label>
                        <select class="form-select @error('discapacidad') is-invalid  @enderror" aria-label="Default select example" wire:model="discapacidad">
                            <option value="" selected>Seleccione</option>
                            @foreach ($disca as $item)
                            <option value="{{$item->id_discapacidad}}" {{ $item->id_discapacidad == old('discapacidad') ? 'selected' : '' }}>{{$item->discapacidad}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <h5 class="card-header mt-3 fw-bold">Información de contacto</h5>

            <div class="card-body w-100">
                <h6 class="mb-1">En esta sección corresponde SOLO A TU INFORMACION DE CONTACTO.</h6>

                <div class="row g-3 col-10 m-auto">
                    <div class="col-4">
                        <label class="form-label">Domicilio *</label>
                        <input type="text" wire:model="direccion" onkeyup="mayus(this);" class="form-control @error('direccion') is-invalid  @enderror" placeholder="Ingrese su dirección">
                    </div>
                    
                    <div class="col-4">
                        <label class="form-label">Correo Electrónico *</label>
                        <input type="text" wire:model="correo" class="form-control @error('correo') is-invalid  @enderror" placeholder="Ingrese su correo electronico">
                    </div>
                    
                    <div class="col-4">
                        <label class="form-label">Celular *</label>
                        <input type="text" wire:model="celular" class="form-control @error('celular') is-invalid  @enderror" placeholder="Ingrese su número de celular">
                    </div>
                </div>

                <h6 class="mt-5 mb-1">En esta sección corresponde a la información de tu apoderado y/o contacto de emergencia.</h6>

                <div class="row g-3 col-10 m-auto">
                    <div class="col-8">
                        <label class="form-label">Apoderado y/o contacto de emergencia *</label>
                        <input type="text" wire:model="nombre_apoderado" onkeyup="mayus(this);" class="form-control @error('nombre_apoderado') is-invalid  @enderror" placeholder="Ingrese su nombre y apellido de su apoderado">
                    </div>
                    
                    <div class="col-4">
                        <label class="form-label">Celular de apoderado *</label>
                        <input type="text" wire:model="celular_apoderado" class="form-control @error('celular_apoderado') is-invalid  @enderror" placeholder="Ingrese su numero de celular">
                    </div>
                </div>
            </div>
        </div>
        @endif
        

        {{-- paso 2 --}}
        @if ($pasoactual == 2)
        <div class="">
            <h4 class="text-center bg-success  text-white p-2 rounded-pill">Paso 2 / 3</h4>
            <h5 class="card-header fw-bold">Subir mi foto</h5>

            <div class="card-body w-100">
                <h6 class="mb-3">Por favor, sigue los siguientes creiterios antes de seleccionar tu foto.</h6>
                <p class="mb-1 ms-4">- <strong>FOTO ESTILO PASAPORTE (sin sonrisas ni muecas), fondo blanco, sin lentes (u otro tipo de accesorios) y cabello recogido hacia atras.</strong></p>
                <p class="mb-1 ms-4">- <strong>NO SELFIES.</strong></p>
                <p class="mb-1 ms-4">- Dimensiones de la Imagen (240 x 288).</p>
                <p class="mb-1 ms-4">- Extenciones permitidas (PNG Y JNG).</p>
                <p class="mb-1 ms-4">- Peso de la imagen no mas de 1 MB.</p>
                <div class="row g-3 col-10 m-auto">
                    <div class="text-center">
                        <div class="profile-user position-relative d-inline-block mx-auto mb-2">
                            <h6 class="fs-14 mb-3">Selecciona tu foto</h6>
                            @if ($foto)
                            <img src="{{$foto->temporaryUrl()}}" class="avatar-lg img-thumbnail user-profile-image" alt="user-profile-image">
                            @else
                            <img src="{{asset('assets/images/user-dummy-img.jpg')}}" class="avatar-lg img-thumbnail user-profile-image" alt="user-profile-image">
                            @endif
                            <input type="file" wire:model="foto" class="form-control mt-3 @error('foto') is-invalid  @enderror" accept="image/png,jpg">
                            @error('foto')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <p class="my-3"><strong>Nota:</strong> Se cuidadoso al seleccionar la foto, ya que, esta es la que figurará en los documentos generados por el sistema.</p>
                
                <div class="row">
                    <div class="col-6">
                        <p class="my-3"><strong>Ejemplo de como debe ser la fotografía</strong></p>
                        <div class="d-flex justify-content-around">
                            <img src="{{asset('assets/images/carnet/carnet-bien01.jpeg')}}" alt="imagen 01" width="130px" height="180px" class="border border-dark">
                            <img src="{{asset('assets/images/carnet/carnet-bien02.jpeg')}}" alt="imagen 01" width="130px" height="180px" class="border border-dark">
                            <img src="{{asset('assets/images/carnet/carnet-bien03.jpeg')}}" alt="imagen 01" width="130px" height="180px" class="border border-dark">
                        </div>
                    </div>
                    <div class="col-6">
                        <p class="my-3"><strong>Ejemplo de como NO debe ser la fotografía</strong></p>
                        <div class="d-flex justify-content-around">
                            <img src="{{asset('assets/images/carnet/carnet-mal01.jpg')}}" alt="imagen 01" width="130px" height="180px" class="border border-dark">
                            <img src="{{asset('assets/images/carnet/carnet-mal01.jpg')}}" alt="imagen 01" width="130px" height="180px" class="border border-dark">
                            <img src="{{asset('assets/images/carnet/carnet-mal01.jpg')}}" alt="imagen 01" width="130px" height="180px" class="border border-dark">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        {{-- paso 3 --}}
        @if ($pasoactual == 3)
        <div>
            <h4 class="text-center bg-success  text-white p-2 rounded-pill">Paso 3 / 3</h4>
            <h5 class="card-header fw-bold">Información CEPREUNU</h5>

            <div class="card-body w-100">
                <h6 class="mb-1">Selecciona el Año en que terminaste o terminaras la secundaria y automaticamente se completara su Modalidad.</h6>
                <div class="row g-3 col-10 m-auto">
                    <div class="col-6">
                        <label class="form-label">Año de egreso *</label>
                        <select class="form-select  @error('año_egreso') is-invalid  @enderror" aria-label="Default select example" wire:model="año_egreso">
                            <option value="" selected>Seleccione</option>
                            @foreach ($anio as $item)
                            <option value="{{$item->egreso}}" {{ $item->egreso == old('año_egreso') ? 'selected' : '' }}>{{$item->egreso}}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="col-6">
                        <label class="form-label">Modalidad *</label>
                        <input type="text" @if ($año_egreso) wire:model="modalidad" @endif class="form-control @error('modalidad') is-invalid  @enderror" disabled>
                        <input type="hidden" wire:model="id_modalidad">
                        <input type="hidden" wire:model="id_anio">
                    </div>
                </div>

                <h6 class="mt-4 mb-1">Selecciona el Departamento de su Colegio, y acontinuación buscalo escribiendo su nombre.</h6>

                <div class="row g-3 col-10 m-auto">
                    <div class="col-6" wire:ignore>
                        <label class="form-label">Departamento *</label>
                        <select class="depart form-select @error('departamento') is-invalid  @enderror" wire:model="departamento">
                            <option value="" selected>Seleccione</option>
                            @foreach ($depart as $item)
                            <option value="{{$item->departamento}}">{{$item->departamento}}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="col-6">
                        <label class="form-label">Colegio *</label>
                        <select class="cole form-select @error('colegio') is-invalid  @enderror" wire:model="colegio">
                            <option value="" selected>Seleccione</option>
                            @if ($cole)
                            @foreach ($cole as $item)
                            <option value="{{$item->id_modular}}">{{$item->distrito }} / Cod Modular: {{$item->codigo_modular}} / {{$item->colegio}}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                </div>

                <h6 class="mt-4 mb-1">Selecciona el Turno y la Carrera Profesional que desea estudiar.</h6>

                <div class="row g-3 col-10 m-auto">
                    <div class="col-6">
                        <label class="form-label">Turno *</label>
                        <select class="form-select @error('turno') is-invalid  @enderror" aria-label="Default select example" wire:model="turno">
                            <option value="" selected>Seleccione</option>
                            @foreach ($turn as $item)
                            <option value="{{$item->id_turno_sede}}">{{$item->turno->turno}}</option>
                            @endforeach
                        </select>
                        <input type="hidden" wire:model="turno_nombre">
                    </div>
                    
                    <div class="col-6">
                        <label class="form-label">Carrera Profesional *</label>
                        <select class="js-example-basic-single form-select @error('carrera') is-invalid  @enderror" wire:model="carrera">
                            <option value="" selected>Seleccione</option>
                            @foreach ($carre as $item)
                            <option value="{{$item->id_sede_carrera}}">{{$item->carrera->carrera}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <div class="card-body w-100">
            
            <div class="d-flex align-items-start justify-content-between gap-3 mt-4">
                @if ($pasoactual == 1)
                <div></div>
                @endif
                
                @if ($pasoactual == 2 || $pasoactual == 3)
                <button type="button" class="btn btn-secondary text-decoration-none btn-label" wire:click="disminuirPaso()"><i class="ri-arrow-left-line label-icon align-middle fs-16 me-2"></i>Anterior</button>
                @endif

                @if ($pasoactual == 1 || $pasoactual == 2)
                <button type="button" class="btn btn-success btn-label right" wire:click="aumentarPaso()"><i class="ri-arrow-right-line label-icon align-middle fs-16 ms-2"></i>Siguiente</button>
                @endif
                
                @if ($pasoactual == 3)
                <button type="submit" class="btn btn-primary btn-label right"><i class="ri-arrow-up-line label-icon align-middle fs-16 ms-2"></i>Guardar</button>
                @endif
            </div>
        </div>
    </form>
</div>

@push('js')
    <script>
        document.addEventListener('livewire:load', function(){
            $('.ubigeo-select2').select2();
            $('.ubigeo-select2').on('change', function(){
                @this.set('ubigeo', this.value)
            })
        })

        $(document).ready(function() {
            $('.depart').select2();
            $('.depart').on('change', function(){
                @this.set('departamento', this.value);
            })

            $('.cole').select2();
            $('.cole').on('change', function(){
                @this.set('colegio', this.value);
            })
        })

        function mayus(e) {
            e.value = e.value.toUpperCase();
        }
    </script>
@endpush