<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            list-style: none;
            text-decoration: none;
            border: none;
            outline: none;
        }
        body{
            font-family: Arial, Helvetica, sans-serif;
        }
    </style>
</head>
<body style="padding: 2rem">
    <div>
        <table style="width: 100%;">
            <tbody>
                <tr>
                    <td style="text-align: center;" width="17%">
                        <img src="{{ storage_path('app/public/asset-pdf/unu.png') }}" alt="logo unu" width="60">
                    </td>
                    <td style="text-align: center;" width="66%">
                        <div style="font-weight: bold; font-size: 1.3rem;">
                            UNIVERSIDAD NACIONAL DE UCAYALI
                        </div>
                        <div style="font-weight: bold; font-size: 1.15rem; margin-top: .7rem; margin-bottom: .7rem;">
                            CENTRO PRE UNIVERSITARIO
                        </div>
                        <div style="font-weight: bold; font-size: .9rem;" width="17%">
                            FICHA DE MATRICULA : PROCESO {{$inscripcion->proceso->año}} - {{$inscripcion->proceso->numero_proceso}}
                        </div>
                    </td>
                    <td style="text-align: center;">
                        <img src="{{ storage_path('app/public/Inscripcion/'.$inscripcion->foto) }}" alt="foto inscripcion" width="80" height="100" style="border: 2px solid black;">
                    </td>
                </tr>
            </tbody>
        </table>
        <table style="width: 100%; margin-top: .7rem;">
            <tbody>
                <tr>
                    <td style="text-align: left;" width="50%">
                        <div style="font-weight: bold; font-size: .8rem;">
                            SEDE: {{$inscripcion->sede}}
                        </div>
                    </td>
                    <td style="text-align: right;" width="50%">
                        <div style="font-weight: bold; font-size: 1rem;">
                            Nro. Registro: {{$inscripcion->id_inscripcion}}
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <table style="width: 100%;">
            <tbody>
                <tr>
                    <td style="text-align: left;">
                        <div style="width: 100%; border-bottom: 1px solid black;"></div>
                    </td>
                </tr>
            </tbody>
        </table>
        <table style="width: 100%; margin-top: .7rem;">
            <tbody>
                <tr>
                    <td style="text-align: left;" width="46%">
                        <div style="height: 150px;">
                            <table style="width: 100%;">
                                <tbody>
                                    <tr>
                                        <td style="text-align: left;">
                                            <div style="font-weight: bold; font-size: .8rem;">
                                                INFORMACIÓN CEPREUNU
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table style="width: 100%;">
                                <tbody>
                                    <tr>
                                        <td style="text-align: left;">
                                            <div style="width: 100%; border-bottom: 1px solid black;"></div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table style="border-collapse: separate; border-spacing: 0px 7px;">
                                <tbody>
                                    <tr>
                                        <td style="text-align: left; width: 30%;">
                                            <div style="font-weight: bold; font-size: .65rem;">
                                                Fecha de inscripción
                                            </div>
                                        </td>
                                        <td style="text-align: left; width: 2%;">
                                            <div style="font-weight: bold; font-size: .65rem; margin-right: 5px;">
                                                :
                                            </div>
                                        </td>
                                        <td style="text-align: initial; width: 68%;">
                                            <div style="font-size: .65rem;">
                                                {{$registro->format('d/m/Y h:i:s A')}}
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left; width: 30%;">
                                            <div style="font-weight: bold; font-size: .65rem;">
                                                Modalidad
                                            </div>
                                        </td>
                                        <td style="text-align: left;">
                                            <div style="font-weight: bold; font-size: .65rem;">
                                                :
                                            </div>
                                        </td>
                                        <td style="text-align: initial;">
                                            <div style="font-size: .65rem;">
                                                {{$inscripcion->SedeCarrera->modalidad->modalidad}}
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left; width: 30%;">
                                            <div style="font-weight: bold; font-size: .65rem;">
                                                Turno
                                            </div>
                                        </td>
                                        <td style="text-align: left;">
                                            <div style="font-weight: bold; font-size: .65rem;">
                                                :
                                            </div>
                                        </td>
                                        <td style="text-align: initial;">
                                            <div style="font-size: .65rem;">
                                                {{$inscripcion->turno}}
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left; width: 30%;">
                                            <div style="font-weight: bold; font-size: .65rem;">
                                                Carrera
                                            </div>
                                        </td>
                                        <td style="text-align: left;">
                                            <div style="font-weight: bold; font-size: .65rem;">
                                                :
                                            </div>
                                        </td>
                                        <td style="text-align: initial;">
                                            <div style="font-size: .65rem;">
                                                {{$inscripcion->SedeCarrera->carrera->carrera}}
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left; width: 30%;">
                                            <div style="font-weight: bold; font-size: .65rem;">
                                                Veces CEPREUNU
                                            </div>
                                        </td>
                                        <td style="text-align: left;">
                                            <div style="font-weight: bold; font-size: .65rem;">
                                                :
                                            </div>
                                        </td>
                                        <td style="text-align: initial;">
                                            <div style="font-size: .65rem;">
                                                {{$veces}}
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </td>
                    <td width="1.65%">
                        <div style="height: 150px; border-right: 1px solid black;"></div>
                    </td>
                    <td width="1.35%">
                        <div></div>
                    </td>
                    <td style="text-align: left;" width="46%">
                        <div style="height: 150px;">
                            <table style="width: 100%;">
                                <tbody>
                                    <tr>
                                        <td style="text-align: left;">
                                            <div style="font-weight: bold; font-size: .8rem;">
                                                INFORMACIÓN ACADÉMICA
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table style="width: 100%;">
                                <tbody>
                                    <tr>
                                        <td style="text-align: left;">
                                            <div style="width: 100%; border-bottom: 1px solid black;"></div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table style="border-collapse: separate; border-spacing: 0px 7px;">
                                <tbody>
                                    <tr>
                                        <td style="text-align: left; width: 30%;">
                                            <div style="font-weight: bold; font-size: .65rem;">
                                                Nombre de la I.E.
                                            </div>
                                        </td>
                                        <td style="text-align: left; width: 2%;">
                                            <div style="font-weight: bold; font-size: .65rem; margin-right: 5px;">
                                                :
                                            </div>
                                        </td>
                                        <td style="text-align: left; width: 68%;">
                                            <div style="font-size: .65rem;">
                                                {{$persona->modular->colegio}}
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left; width: 30%;">
                                            <div style="font-weight: bold; font-size: .65rem;">
                                                Tipo de gestión
                                            </div>
                                        </td>
                                        <td style="text-align: left;">
                                            <div style="font-weight: bold; font-size: .65rem;">
                                                :
                                            </div>
                                        </td>
                                        <td style="text-align: left;">
                                            <div style="font-size: .65rem;">
                                                {{$persona->modular->gestion}} 
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left; width: 30%;">
                                            <div style="font-weight: bold; font-size: .65rem;">
                                                Ubicación
                                            </div>
                                        </td>
                                        <td style="text-align: left;">
                                            <div style="font-weight: bold; font-size: .65rem;">
                                                :
                                            </div>
                                        </td>
                                        <td style="text-align: left;">
                                            <div style="font-size: .65rem;">
                                                {{$persona->modular->departamento}} | {{$persona->modular->provincia}} | {{$persona->modular->distrito}}
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left; width: 30%;">
                                            <div style="font-weight: bold; font-size: .65rem;">
                                                Año de egreso
                                            </div>
                                        </td>
                                        <td style="text-align: left;">
                                            <div style="font-weight: bold; font-size: .65rem;">
                                                :
                                            </div>
                                        </td>
                                        <td style="text-align: left;">
                                            <div style="font-size: .65rem;">
                                                {{$persona->año_egreso}}
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <table style="width: 100%; margin-top: .7rem;">
            <tbody>
                <tr>
                    <td style="text-align: left;" width="46%">
                        <div style="height: 200px;">
                            <table style="width: 100%;">
                                <tbody>
                                    <tr>
                                        <td style="text-align: left;">
                                            <div style="font-weight: bold; font-size: .8rem;">
                                                INFORMACIÓN PERSONA
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table style="width: 100%;">
                                <tbody>
                                    <tr>
                                        <td style="text-align: left;">
                                            <div style="width: 100%; border-bottom: 1px solid black;"></div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table style="border-collapse: separate; border-spacing: 0px 7px;">
                                <tbody>
                                    <tr>
                                        <td style="text-align: left; width: 30%;">
                                            <div style="font-weight: bold; font-size: .65rem;">
                                                Doc. de Identidad
                                            </div>
                                        </td>
                                        <td style="text-align: left; width: 2%;">
                                            <div style="font-weight: bold; font-size: .65rem; margin-right: 5px;">
                                                :
                                            </div>
                                        </td>
                                        <td style="text-align: left; width: 68%;">
                                            <div style="font-size: .65rem;">
                                                {{$persona->numero_documento}}
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left; width: 30%;">
                                            <div style="font-weight: bold; font-size: .65rem;">
                                                Apellidos
                                            </div>
                                        </td>
                                        <td style="text-align: left;">
                                            <div style="font-weight: bold; font-size: .65rem;">
                                                :
                                            </div>
                                        </td>
                                        <td style="text-align: left;">
                                            <div style="font-size: .65rem;">
                                                {{$persona->apellido_paterno}} {{$persona->apellido_materno}}
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left; width: 30%;">
                                            <div style="font-weight: bold; font-size: .65rem;">
                                                Nombres
                                            </div>
                                        </td>
                                        <td style="text-align: left;">
                                            <div style="font-weight: bold; font-size: .65rem;">
                                                :
                                            </div>
                                        </td>
                                        <td style="text-align: left;">
                                            <div style="font-size: .65rem;">
                                                {{$persona->nombres}}
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left; width: 30%;">
                                            <div style="font-weight: bold; font-size: .65rem;">
                                                Fecha de nacimiento
                                            </div>
                                        </td>
                                        <td style="text-align: left;">
                                            <div style="font-weight: bold; font-size: .65rem;">
                                                :
                                            </div>
                                        </td>
                                        <td style="text-align: left;">
                                            <div style="font-size: .65rem;">
                                                {{$persona->fecha_nacimiento->format('d/m/Y')}}
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left; width: 30%;">
                                            <div style="font-weight: bold; font-size: .65rem;">
                                                Sexo
                                            </div>
                                        </td>
                                        <td style="text-align: left;">
                                            <div style="font-weight: bold; font-size: .65rem;">
                                                :
                                            </div>
                                        </td>
                                        <td style="text-align: left;">
                                            <div style="font-size: .65rem;">
                                                {{$persona->sexo}}
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left; width: 30%;">
                                            <div style="font-weight: bold; font-size: .65rem;">
                                                Estado civil
                                            </div>
                                        </td>
                                        <td style="text-align: left;">
                                            <div style="font-weight: bold; font-size: .65rem;">
                                                :
                                            </div>
                                        </td>
                                        <td style="text-align: left;">
                                            <div style="font-size: .65rem;">
                                                {{$persona->EstadoCivil->estado_civil}}
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left; width: 30%;">
                                            <div style="font-weight: bold; font-size: .65rem;">
                                                Lengua materna
                                            </div>
                                        </td>
                                        <td style="text-align: left;">
                                            <div style="font-weight: bold; font-size: .65rem;">
                                                :
                                            </div>
                                        </td>
                                        <td style="text-align: left;">
                                            <div style="font-size: .65rem;">
                                                {{$persona->LenguaMaterna->lengua_materna}}
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left; width: 30%;">
                                            <div style="font-weight: bold; font-size: .65rem;">
                                                Lugar de nacimiento
                                            </div>
                                        </td>
                                        <td style="text-align: left;">
                                            <div style="font-weight: bold; font-size: .65rem;">
                                                :
                                            </div>
                                        </td>
                                        <td style="text-align: left;">
                                            <div style="font-size: .65rem;">
                                                {{$persona->Ubigeo->departamento}} | {{$persona->Ubigeo->provincia}} | {{$persona->Ubigeo->distrito}}
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </td>
                    <td width="1.65%">
                        <div style="height: 200px; border-right: 1px solid black;"></div>
                    </td>
                    <td width="1.35%">
                        <div></div>
                    </td>
                    <td style="text-align: left;" width="46%">
                        <div style="height: 200px;">
                            <table style="width: 100%;">
                                <tbody>
                                    <tr>
                                        <td style="text-align: left;">
                                            <div style="font-weight: bold; font-size: .8rem;">
                                                INFORMACIÓN DE CONTACTO
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table style="width: 100%;">
                                <tbody>
                                    <tr>
                                        <td style="text-align: left;">
                                            <div style="width: 100%; border-bottom: 1px solid black;"></div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table style="border-collapse: separate; border-spacing: 0px 7px;">
                                <tbody>
                                    <tr>
                                        <td style="text-align: left; width: 30%;">
                                            <div style="font-weight: bold; font-size: .65rem;">
                                                Domicilio
                                            </div>
                                        </td>
                                        <td style="text-align: left; width: 2%;">
                                            <div style="font-weight: bold; font-size: .65rem; margin-right: 5px;">
                                                :
                                            </div>
                                        </td>
                                        <td style="text-align: left; width: 68%;">
                                            <div style="font-size: .65rem;">
                                                {{$persona->direccion}}
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left; width: 30%;">
                                            <div style="font-weight: bold; font-size: .65rem;">
                                                Correo electronico
                                            </div>
                                        </td>
                                        <td style="text-align: left;">
                                            <div style="font-weight: bold; font-size: .65rem;">
                                                :
                                            </div>
                                        </td>
                                        <td style="text-align: left;">
                                            <div style="font-size: .65rem;">
                                                {{$persona->email}}
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left; width: 30%;">
                                            <div style="font-weight: bold; font-size: .65rem;">
                                                Celular estudiante
                                            </div>
                                        </td>
                                        <td style="text-align: left;">
                                            <div style="font-weight: bold; font-size: .65rem;">
                                                :
                                            </div>
                                        </td>
                                        <td style="text-align: left;">
                                            <div style="font-size: .65rem;">
                                                {{$persona->celular}}
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left; width: 30%;">
                                            <div style="font-weight: bold; font-size: .65rem;">
                                                Contacto emergencia
                                            </div>
                                        </td>
                                        <td style="text-align: left;">
                                            <div style="font-weight: bold; font-size: .65rem;">
                                                :
                                            </div>
                                        </td>
                                        <td style="text-align: left;">
                                            <div style="font-size: .65rem;">
                                                {{$persona->nombre_apoderado}}
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left; width: 30%;">
                                            <div style="font-weight: bold; font-size: .65rem;">
                                                Celular contacto
                                            </div>
                                        </td>
                                        <td style="text-align: left;">
                                            <div style="font-weight: bold; font-size: .65rem;">
                                                :
                                            </div>
                                        </td>
                                        <td style="text-align: left;">
                                            <div style="font-size: .65rem;">
                                                {{$persona->celular_apoderado}}
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <table style="width: 100%; margin-top: .7rem;">
            <tbody>
                <tr>
                    <td style="text-align: left;">
                        <div style="font-weight: bold; font-size: .8rem;">
                            INFORMACIÓN DE PAGO
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <table style="width: 100%;">
            <tbody>
                <tr>
                    <td style="text-align: left;">
                        <div style="width: 100%; border-bottom: 1px solid black;"></div>
                    </td>
                </tr>
            </tbody>
        </table>
        <table style="border-collapse: separate; border-spacing: 0px 7px;">
            <tbody>
                <tr>
                    <td style="text-align: left;">
                        <div style="font-weight: bold; font-size: .65rem;">
                            Modalidad pago
                        </div>
                    </td>
                    <td style="text-align: left;">
                        <div style="font-weight: bold; font-size: .65rem; margin-right: 5px;">
                            :
                        </div>
                    </td>
                    <td style="text-align: left;">
                        <div style="font-size: .65rem;">
                            {{$modalidad}}
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: left;">
                        <div style="font-weight: bold; font-size: .65rem;">
                            Importe mínimo
                        </div>
                    </td>
                    <td style="text-align: left;">
                        <div style="font-weight: bold; font-size: .65rem; margin-right: 5px;">
                            :
                        </div>
                    </td>
                    <td style="text-align: left;">
                        <div style="font-size: .65rem;">
                            S/. {{$minimo}}
                        </div>
                    </td>
                    <td style="text-align: left;">
                        <div style="font-weight: bold; font-size: .65rem;">
                            Importe total
                        </div>
                    </td>
                    <td style="text-align: left;">
                        <div style="font-weight: bold; font-size: .65rem; margin-right: 5px;">
                            :
                        </div>
                    </td>
                    <td style="text-align: left;">
                        <div style="font-size: .65rem;">
                            S/. {{$total}}
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <table width="100%" style="border-collapse: collapse; border-spacing: 0px 5px; margin-top: .5rem;">
            <thead>
                <tr>
                    <th style="padding: 7px; border-top: 1px solid black; border-right: 1px solid black; border-left: 1px solid black;" width="5%">
                        <div style="font-weight: bold; font-size: .8rem;">
                            Nro.
                        </div>
                    </th>
                    <th style="padding: 7px; border-top: 1px solid black;" width="15%">
                        <div style="font-weight: bold; font-size: .8rem;">
                            Fecha
                        </div>
                    </th>
                    <th style="padding: 7px; border-top: 1px solid black; border-right: 1px solid black; border-left: 1px solid black;" width="35%">
                        <div style="font-weight: bold; font-size: .8rem;">
                            Ubicación
                        </div>
                    </th>
                    <th style="padding: 7px; border-top: 1px solid black;" width="30%">
                        <div style="font-weight: bold; font-size: .8rem;">
                            Nro. Operación
                        </div>
                    </th>
                    <th style="padding: 7px; border-top: 1px solid black; border-right: 1px solid black; border-left: 1px solid black;" width="15%">
                        <div style="font-weight: bold; font-size: .8rem;">
                            Importe
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody>
                @php
                    $num = 0;
                @endphp
                @foreach ($pago as $item)
                <tr>
                    <td style="padding: 7px; border-top: 1px solid black; border-bottom: 1px solid black; border-right: 1px solid black; border-left: 1px solid black;"><div style="font-size: .65rem; text-align: center;">{{$num++}}</div></td>
                    <td style="padding: 7px; border-top: 1px solid black; border-bottom: 1px solid black;"><div style="font-size: .65rem; text-align: center">{{$item->fecha_pago->format('d/m/Y')}}</div></td>
                    <td style="padding: 7px; border-top: 1px solid black; border-bottom: 1px solid black; border-right: 1px solid black; border-left: 1px solid black;"><div style="font-size: .65rem; text-align: center">BBVA</div></td>
                    <td style="padding: 7px; border-top: 1px solid black;"><div style="font-size: .65rem; text-align: center">{{$item->numero_operacion}}</div></td>
                    <td style="padding: 7px; border-top: 1px solid black; border-right: 1px solid black; border-left: 1px solid black;"><div style="font-size: .65rem; text-align: center">{{$item->monto}}</div></td>
                </tr>
                @endforeach
                @php
                    $num = 0;
                @endphp
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="padding: 7px; border: 1px solid black;"><div style="font-weight: bold; font-size: .7rem; text-align: center">Total : S/.</div></td>
                    <td style="padding: 7px; border-bottom: 1px solid black; border-top: 1px solid black; border-right: 1px solid black;"><div style="font-weight: bold; font-size: .7rem; text-align: center">{{$total}}</div></td>
                </tr>
            </tbody>
        </table>
    </div>
    <br>
    <br>
    <br>
    <div>
        <table style="width: 100%;">
            <tbody>
                <tr>
                    <td style="text-align: left;" width="50%">
                        <div style="font-weight: bold; font-size: .8rem;">
                            PARENTESCO UNU O N° RESOLUCIÓN:-
                        </div>
                    </td>
                    <td style="text-align: right;" width="50%">
                        <div style="font-weight: bold; font-size: .8rem;">
                            ESTADO : MATRICULADO
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <table style="width: 100%; margin-top: .2rem;">
            <tbody>
                <tr>
                    <td style="text-align: left;" width="50%">
                        <div style="font-weight: bold; font-size: .7rem;">
                            OBSERVACIÓN : 
                        </div>
                    </td>
                    <td style="text-align: right;" width="50%">
                        <div style="font-weight: bold; font-size: .8rem;">
                            CONDICIÓN : APTO
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <table style="width: 100%;">
            <tbody>
                <tr>
                    <td style="text-align: left;">
                        <div style="width: 100%; border-bottom: 1px solid black;"></div>
                    </td>
                </tr>
            </tbody>
        </table>
        <table style="width: 100%; margin-top: .2rem;">
            <tbody>
                <tr>
                    <td style="text-align: center;" width="50%">
                        <div style="font-style: italic; font-size: .5rem;">
                            ** DECLARO BAJO JURAMENTO QUE LOS DOCUMENTOS PRESENTADOS Y LOS DATOS EN LA PRESENTE FICHA SON REALES **
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <br>
    <br>
    <br>
    <br>
    <div>
        <table style="width: 100%;">
            <tbody>
                <tr>
                    <td style="text-align: center;" width="50%">
                        <div style="font-weight: bold; font-size: .5rem;">
                            _________________________________________________
                        </div>
                    </td>
                    <td style="text-align: center;" width="50%">
                        <div style="font-weight: bold; font-size: .5rem;">
                            _________________________________________________
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;" width="50%">
                        <div style="font-weight: bold; font-size: .5rem;">
                            {{$persona->apellido_paterno}} {{$persona->apellido_materno}}, {{$persona->nombres}}
                        </div>
                    </td>
                    <td style="text-align: center;" width="50%">
                        <div style="font-weight: bold; font-size: .5rem;">
                            APODERADO (EN CASO DE SER MENOR DE EDAD)
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>