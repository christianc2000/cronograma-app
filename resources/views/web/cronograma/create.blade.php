@extends('layouts.app')

@section('content')
    <div style="margin: 20px">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="background: #0085FE; color:white">{{ __('Cronograma/Crear') }}</div>
                    <div class="card-body">
                        <div class="form-floating mb-3">
                            <select class="form-select" aria-label="Default select example" id="proceso_id">
                                <option selected disabled>Seleccionar un proceso de muestra</option>
                                @foreach ($procesos as $proceso)
                                    <option value="{{ $proceso->id }}">
                                        {{ $proceso->faculty->nombre . ' - ' . $proceso->career->nombre . ' - ' . $proceso->place->nombre }}
                                    </option>
                                @endforeach
                                {{-- <option value="1">F. de Cs. de la Computación y Telecomunicaciones - Ingeniería
                                    Informática - Santa Cruz</option>
                                <option value="2">F. de Cs. de la Computación y Telecomunicaciones - Ingeniería en
                                    Sistema - Santa Cruz</option>
                                <option value="3">F. de Cs. de la Computación y Telecomunicaciones - Ingeniería en
                                    Redes y Telecomunicaciones - Santa Cruz</option> --}}
                            </select>
                            <label for="muestra" class="form-label">Proceso de muestra</label>
                        </div>
                        <div class="mb-3">
                            <nav aria-label="...">
                                <ul class="pagination pagination-md">
                                    {{-- <li class="page-item active" aria-current="page">
                                        <button class="page-link">Autoridades</button>
                                    </li> --}}
                                    <li class="page-item active"><button type="button" class="page-link"
                                            id="btnAutoridades">Autoridades</button></li>
                                    <li class="page-item"><button type="button" class="page-link"
                                            id="btnDocentes">Docentes</button></li>
                                    <li class="page-item"><button type="button" class="page-link"
                                            id="btnEstudiantes">Estudiantes</button></li>
                                    <li class="page-item"><button type="button" class="page-link"
                                            id="btnTitulados">Titulados</button></li>
                                    <li class="page-item"><button type="button" class="page-link"
                                            id="btnEmpleadores">Empleadores</button></li>
                                </ul>
                            </nav>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="card">
                                        <div class="card-header"
                                            style="text-align: center; background:#4AB0B5; color:white">
                                            RANGO DE FECHA
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="date" class="form-control" id="fecha_inicio"
                                                            name="fecha_inicio" required>
                                                        <label for="fecha_inicio" class="form-label">Fecha inicio</label>
                                                        <span id="errorFechaInicio" style="color: red; display: none;">Por
                                                            favor completa este campo</span>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="date" class="form-control" id="fecha_fin"
                                                            name="fecha_fin" required>
                                                        <label for="fecha_fin" class="form-label">Fecha fin</label>
                                                        <span id="errorFechaFin" style="color: red; display: none;">Por
                                                            favor completa este campo</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="card">
                                        <div class="card-header"
                                            style="text-align: center; background:#4AB0B5; color:white">
                                            RANGO DE HORA
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="time" class="form-control" id="hora_inicio"
                                                            required>
                                                        <label for="hora_inicio" class="form-label">Hora inicio</label>
                                                        <span id="errorHoraInicio" style="color: red; display: none;">Por
                                                            favor completa este campo</span>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="time" class="form-control" id="hora_fin" required>
                                                        <label for="hora_fin" class="form-label">Hora fin</label>
                                                        <span id="errorHoraFin" style="color: red; display: none;">Por favor
                                                            completa este campo</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" aria-label="modalidad" id="modalidad">
                                <option selected disabled>Seleccionar un proceso una modalidad</option>
                                <option value="1">Virtual</option>
                                <option value="2">Presencial</option>
                                <option value="3">Mixta</option>
                            </select>
                            <label for="modalidad">Modalidad</label>
                            <span id="errorModalidad" style="color: red; display: none;">Por favor completa este
                                campo</span>
                        </div>
                        <div class="mb-3">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button class="btn btn-danger me-md-2" type="button" id="btnCancelar">Cancelar</button>
                                <button class="btn btn-primary" type="button" id="btnAdd">Añadir</button>
                            </div>
                        </div>
                        <br>
                        {{-- CRONOGRAMA --}}
                        <div class="mb-3" id="div-cronograma"> {{-- style="display: none"> --}}
                            <div class="form-floating mb-3">
                                <select class="form-select" aria-label="responsable" id="comission_id">
                                    <option selected disabled>Seleccionar un responsable</option>
                                </select>
                                <label for="responsable" class="form-label">Responsable</label>
                                <span id="errorResponsable" style="color: red; display: none;">Por
                                    favor completa este campo</span>
                            </div>
                            <br>
                            <br>
                            <div id="contenido-cronograma">
                                <div id="titulo-contenido-cronograma" class="mb-6" style="text-align: center">
                                    <h5>CRONOGRAMA DE EJECUCIÓN DE ENCUESTA</h5>
                                    <h5 id="h5-carrera">CARRERA:</h5>
                                    <h5 id="h5-gestion">GESTIÓN </h5>
                                </div>
                                <br>
                                <div id="encargado-contenido-cronograma" class="lh-1">
                                    <p style="color:#333333">
                                        <span id="span-responsable">Responsable: </span>
                                        <span id="span-email">Correo: </span>
                                        <span id="span-celular">Celular: </span>
                                    </p>
                                </div>
                                <br>
                                <div id="div-table" class="table-responsive" style="font-size: 12px">
                                    <table class="table table-sm" id="tableCronograma">
                                        <thead class="table-success">
                                            {{-- <tr>
                                                <th scope="col"
                                                    style="min-width: 150px;width: 150px;border-right: 2px solid white;">
                                                    Fuente</th>
                                                <th scope="col" style="border-right: 2px solid white;">Cantidad</th>
                                                <th scope="col" style="border-right: 2px solid white;">Modalidad</th>
                                                <th scope="col"
                                                    style="min-width: 150px;width: 150px; border-right: 2px solid white;">
                                                    Horario</th>
                                                @for ($i = 0; $i < $cantidadDias; $i++)
                                                    <th style="border-right: 2px solid white; background:#DADADA">
                                                        {{ date('d/m', strtotime($fechaActual . ' + ' . $i . ' days')) }}
                                                    </th>
                                                @endfor
                                            </tr> --}}
                                        </thead>
                                        <tbody>
                                            {{-- <tr id="trA" style="display: none">
                                                <td style="border-right: 2px solid white;">Autoridades</td>
                                                <td style="border-right: 2px solid white;">3</td>
                                                <td style="border-right: 2px solid white;">-</td>
                                                <td style="border-right: 2px solid white;">-</td>
                                                @for ($i = 0; $i < $cantidadDias; $i++)
                                                    <td style="border-right: 2px solid white;"></td>
                                                @endfor
                                            </tr>
                                            <tr id="trD" style="display: none">
                                                <td style="border-right: 2px solid white;">Docentes</td>
                                                <td style="border-right: 2px solid white;">15</td>
                                                <td style="border-right: 2px solid white;">-</td>
                                                <td style="border-right: 2px solid white;">-</td>
                                                @for ($i = 0; $i < $cantidadDias; $i++)
                                                    <td style="border-right: 2px solid white;"></td>
                                                @endfor
                                            </tr>
                                            @if ($modalidadCarrera == 'A')
                                                <tr id="trEA1" style="display: none">
                                                    <td style="border-right: 2px solid white;">Estudiantes Nivel 1</td>
                                                    <td style="border-right: 2px solid white;">15</td>
                                                    <td style="border-right: 2px solid white;">-</td>
                                                    <td style="border-right: 2px solid white;">-</td>
                                                    @for ($i = 0; $i < $cantidadDias; $i++)
                                                        <td style="border-right: 2px solid white;"></td>
                                                    @endfor
                                                </tr>
                                                <tr id="trEA2" style="display: none">
                                                    <td style="border-right: 2px solid white;">Estudiantes Nivel 2</td>
                                                    <td style="border-right: 2px solid white;">11</td>
                                                    <td style="border-right: 2px solid white;">-</td>
                                                    <td style="border-right: 2px solid white;">-</td>
                                                    @for ($i = 0; $i < $cantidadDias; $i++)
                                                        <td style="border-right: 2px solid white;"></td>
                                                    @endfor
                                                </tr>
                                                <tr id="trEA3" style="display: none">
                                                    <td style="border-right: 2px solid white;">Estudiantes Nivel 3</td>
                                                    <td style="border-right: 2px solid white;">18</td>
                                                    <td style="border-right: 2px solid white;">-</td>
                                                    <td style="border-right: 2px solid white;">-</td>
                                                    @for ($i = 0; $i < $cantidadDias; $i++)
                                                        <td style="border-right: 2px solid white;"></td>
                                                    @endfor
                                                </tr>
                                                <tr id="trEA4" style="display: none">
                                                    <td style="border-right: 2px solid white;">Estudiantes Nivel 4</td>
                                                    <td style="border-right: 2px solid white;">25</td>
                                                    <td style="border-right: 2px solid white;">-</td>
                                                    <td style="border-right: 2px solid white;">-</td>
                                                    @for ($i = 0; $i < $cantidadDias; $i++)
                                                        <td style="border-right: 2px solid white;"></td>
                                                    @endfor
                                                </tr>
                                                <tr id="trEA5" style="display: none">
                                                    <td style="border-right: 2px solid white;">Estudiantes Nivel 5</td>
                                                    <td style="border-right: 2px solid white;">15</td>
                                                    <td style="border-right: 2px solid white;">-</td>
                                                    <td style="border-right: 2px solid white;">-</td>
                                                    @for ($i = 0; $i < $cantidadDias; $i++)
                                                        <td style="border-right: 2px solid white;"></td>
                                                    @endfor
                                                </tr>
                                            @else
                                                <tr id="trES1" style="display: none">
                                                    <td style="border-right: 2px solid white;">Estudiantes Nivel 1</td>
                                                    <td style="border-right: 2px solid white;">15</td>
                                                    <td style="border-right: 2px solid white;">-</td>
                                                    <td style="border-right: 2px solid white;">-</td>
                                                    @for ($i = 0; $i < $cantidadDias; $i++)
                                                        <td style="border-right: 2px solid white;"></td>
                                                    @endfor
                                                </tr>
                                                <tr id="trES2" style="display: none">
                                                    <td style="border-right: 2px solid white;">Estudiantes Nivel 2</td>
                                                    <td style="border-right: 2px solid white;">11</td>
                                                    <td style="border-right: 2px solid white;">-</td>
                                                    <td style="border-right: 2px solid white;">-</td>
                                                    @for ($i = 0; $i < $cantidadDias; $i++)
                                                        <td style="border-right: 2px solid white;"></td>
                                                    @endfor
                                                </tr>
                                                <tr id="trES3" style="display: none">
                                                    <td style="border-right: 2px solid white;">Estudiantes Nivel 3</td>
                                                    <td style="border-right: 2px solid white;">18</td>
                                                    <td style="border-right: 2px solid white;">-</td>
                                                    <td style="border-right: 2px solid white;">-</td>
                                                    @for ($i = 0; $i < $cantidadDias; $i++)
                                                        <td style="border-right: 2px solid white;"></td>
                                                    @endfor
                                                </tr>
                                                <tr id="trES4" style="display: none">
                                                    <td style="border-right: 2px solid white;">Estudiantes Nivel 4</td>
                                                    <td style="border-right: 2px solid white;">25</td>
                                                    <td style="border-right: 2px solid white;">-</td>
                                                    <td style="border-right: 2px solid white;">-</td>
                                                    @for ($i = 0; $i < $cantidadDias; $i++)
                                                        <td style="border-right: 2px solid white;"></td>
                                                    @endfor
                                                </tr>
                                                <tr id="trES5" style="display: none">
                                                    <td style="border-right: 2px solid white;">Estudiantes Nivel 5</td>
                                                    <td style="border-right: 2px solid white;">15</td>
                                                    <td style="border-right: 2px solid white;">-</td>
                                                    <td style="border-right: 2px solid white;">-</td>
                                                    @for ($i = 0; $i < $cantidadDias; $i++)
                                                        <td style="border-right: 2px solid white;"></td>
                                                    @endfor
                                                </tr>
                                                <tr id="trES6" style="display: none">
                                                    <td style="border-right: 2px solid white;">Estudiantes Nivel 6</td>
                                                    <td style="border-right: 2px solid white;">15</td>
                                                    <td style="border-right: 2px solid white;">-</td>
                                                    <td style="border-right: 2px solid white;">-</td>
                                                    @for ($i = 0; $i < $cantidadDias; $i++)
                                                        <td style="border-right: 2px solid white;"></td>
                                                    @endfor
                                                </tr>
                                                <tr id="trES7" style="display: none">
                                                    <td style="border-right: 2px solid white;">Estudiantes Nivel 7</td>
                                                    <td style="border-right: 2px solid white;">11</td>
                                                    <td style="border-right: 2px solid white;">-</td>
                                                    <td style="border-right: 2px solid white;">-</td>
                                                    @for ($i = 0; $i < $cantidadDias; $i++)
                                                        <td style="border-right: 2px solid white;"></td>
                                                    @endfor
                                                </tr>
                                                <tr id="trES8" style="display: none">
                                                    <td style="border-right: 2px solid white;">Estudiantes Nivel 8</td>
                                                    <td style="border-right: 2px solid white;">18</td>
                                                    <td style="border-right: 2px solid white;">-</td>
                                                    <td style="border-right: 2px solid white;">-</td>
                                                    @for ($i = 0; $i < $cantidadDias; $i++)
                                                        <td style="border-right: 2px solid white;"></td>
                                                    @endfor
                                                </tr>
                                                <tr id="trES9" style="display: none">
                                                    <td style="border-right: 2px solid white;">Estudiantes Nivel 9</td>
                                                    <td style="border-right: 2px solid white;">25</td>
                                                    <td style="border-right: 2px solid white;">-</td>
                                                    <td style="border-right: 2px solid white;">-</td>
                                                    @for ($i = 0; $i < $cantidadDias; $i++)
                                                        <td style="border-right: 2px solid white;"></td>
                                                    @endfor
                                                </tr>
                                                <tr id="trES10" style="display: none">
                                                    <td style="border-right: 2px solid white;">Estudiantes Nivel 10</td>
                                                    <td style="border-right: 2px solid white;">15</td>
                                                    <td style="border-right: 2px solid white;">-</td>
                                                    <td style="border-right: 2px solid white;">-</td>
                                                    @for ($i = 0; $i < $cantidadDias; $i++)
                                                        <td style="border-right: 2px solid white;"></td>
                                                    @endfor
                                                </tr>
                                            @endif
                                            <tr id="trT" style="display: none">
                                                <td style="border-right: 2px solid white;">Titulados</td>
                                                <td style="border-right: 2px solid white;">15</td>
                                                <td style="border-right: 2px solid white;">-</td>
                                                <td style="border-right: 2px solid white;">-</td>
                                                @for ($i = 0; $i < $cantidadDias; $i++)
                                                    <td style="border-right: 2px solid white;"></td>
                                                @endfor
                                            </tr>
                                            <tr id="trEm" style="display: none">
                                                <td style="border-right: 2px solid white;">Empleadores</td>
                                                <td style="border-right: 2px solid white;">15</td>
                                                <td style="border-right: 2px solid white;">-</td>
                                                <td style="border-right: 2px solid white;">-</td>
                                                @for ($i = 0; $i < $cantidadDias; $i++)
                                                    <td style="border-right: 2px solid white;"></td>
                                                @endfor
                                            </tr> --}}
                                        </tbody>
                                    </table>
                                </div>
                                <div class="mb-3">
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                        <button class="btn btn-danger me-md-2" type="button"
                                            id="btnCancelar">Cancelar</button>
                                        <form action="{{ route('cronograma.store') }}" method="POST"
                                            id="formCronograma">
                                            @csrf
                                            <input type="hidden" id="procesoInput" name="procesoInput">
                                            <input type="hidden" id="cmember" name="cmember">
                                            <input type="hidden" id="cronogramaInput" name="cronogramaInput">
                                            <button class="btn btn-primary" type="submit"
                                                id="btnSave">Guardar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- CSS --}}
    <style>
        #encargado-contenido-cronograma p {
            margin-bottom: 5px;
            /* Ajusta el espacio vertical entre los párrafos */
        }

        #encargado-contenido-cronograma p span {
            display: block;
            /* Hace que cada elemento de texto sea un bloque */
            margin-bottom: 3px;
            /* Ajusta el espacio vertical entre los elementos de texto */
        }

        th.horario {
            width: 500px;
            /* Ajusta el valor según tus necesidades */
        }

        .backgroundTd {
            background: green
        }

        .resaltado {
            background-color: yellow;
            min-width: 100%;
            min-height: 100%;
            /* por ejemplo */
        }
    </style>
    </style>
    {{-- JS --}}
    <script>
        $(document).ready(function() {


            function limpiarTH() {
                // Eliminar todos los th dentro de la cabecera de la tabla
                // $('#tableCronograma thead th').remove();
                $('#tableCronograma thead').empty();
                console.log("th limpios");
            }

            function llenarTH(cantidadDias, fechaInicio) {
                // Crear nuevos th y agregarlos a la cabecera de la tabla
                var fechaActual = new Date(
                    fechaInicio); // Esto es un ejemplo, reemplázalo por la fecha actual o la fecha deseada
                fechaActual.setDate(fechaActual.getDate() + 1);
                // Agregar los th según tus especificaciones
                $('#tableCronograma thead').append('<tr>' +
                    '<th scope="col" style="min-width: 150px;width: 150px;border-right: 2px solid white;">Fuente</th>' +
                    '<th scope="col" style="border-right: 2px solid white;">Cantidad</th>' +
                    '<th scope="col" style="border-right: 2px solid white;">Modalidad</th>' +
                    '<th scope="col" style="min-width: 150px;width: 150px; border-right: 2px solid white;">Horario</th>'
                );

                // Agregar th para cada día
                for (var i = 0; i < cantidadDias; i++) {
                    var fecha = new Date(fechaActual.getTime() + i * 24 * 60 * 60 * 1000);
                    var fechaFormateada = fecha.getDate() + '/' + (fecha.getMonth() + 1);

                    $('#tableCronograma thead tr').append(
                        '<th style="border-right: 2px solid white; background:#DADADA; min-width:50px; text-align:center">' +
                        fechaFormateada + '</th>');
                }
            }

            function iniciarCronogramaAnual() {
                var cronograma = [{
                        id: "trA",
                        fechaI: null,
                        fechaF: null,
                        fuente: "Autoridades",
                        modalidad: null,
                        horarioInicio: null,
                        horarioFin: null,
                    },
                    {
                        id: "trD",
                        fechaI: null,
                        fechaF: null,
                        fuente: "Docentes",
                        modalidad: null,
                        horarioInicio: null,
                        horarioFin: null,
                    },
                    {
                        id: "trEA1",
                        fechaI: null,
                        fechaF: null,
                        fuente: "Estudiantes",
                        modalidad: null,
                        horarioInicio: null,
                        horarioFin: null,
                    },
                    {
                        id: "trEA2",
                        fechaI: null,
                        fechaF: null,
                        fuente: "Estudiantes",
                        modalidad: null,
                        horarioInicio: null,
                        horarioFin: null,
                    },
                    {
                        id: "trEA3",
                        fechaI: null,
                        fechaF: null,
                        fuente: "Estudiantes",
                        modalidad: null,
                        horarioInicio: null,
                        horarioFin: null,
                    },
                    {
                        id: "trEA4",
                        fechaI: null,
                        fechaF: null,
                        fuente: "Estudiantes",
                        modalidad: null,
                        horarioInicio: null,
                        horarioFin: null,
                    },
                    {
                        id: "trEA5",
                        fechaI: null,
                        fechaF: null,
                        fuente: "Estudiantes",
                        modalidad: null,
                        horarioInicio: null,
                        horarioFin: null,
                    },
                    {
                        id: "trT",
                        fechaI: null,
                        fechaF: null,
                        fuente: "Titulados",
                        modalidad: null,
                        horarioInicio: null,
                        horarioFin: null,
                    },
                    {
                        id: "trEm",
                        fechaI: null,
                        fechaF: null,
                        fuente: "Empleadores",
                        modalidad: null,
                        horarioInicio: null,
                        horarioFin: null,
                    }
                ];
                return cronograma;
            }

            function iniciarCronogramaSemestral() {
                var cronograma = [{
                        id: "trA",
                        fechaI: null,
                        fechaF: null,
                        fuente: "Autoridades",
                        modalidad: null,
                        horarioInicio: null,
                        horarioFin: null,
                    },
                    {
                        id: "trD",
                        fechaI: null,
                        fechaF: null,
                        fuente: "Docentes",
                        modalidad: null,
                        horarioInicio: null,
                        horarioFin: null,
                    },
                    {
                        id: "trES1",
                        fechaI: null,
                        fechaF: null,
                        fuente: "Estudiantes",
                        modalidad: null,
                        horarioInicio: null,
                        horarioFin: null,
                    },
                    {
                        id: "trES2",
                        fechaI: null,
                        fechaF: null,
                        fuente: "Estudiantes",
                        modalidad: null,
                        horarioInicio: null,
                        horarioFin: null,
                    },
                    {
                        id: "trES3",
                        fechaI: null,
                        fechaF: null,
                        fuente: "Estudiantes",
                        modalidad: null,
                        horarioInicio: null,
                        horarioFin: null,
                    },
                    {
                        id: "trES4",
                        fechaI: null,
                        fechaF: null,
                        fuente: "Estudiantes",
                        modalidad: null,
                        horarioInicio: null,
                        horarioFin: null,
                    },
                    {
                        id: "trES5",
                        fechaI: null,
                        fechaF: null,
                        fuente: "Estudiantes",
                        modalidad: null,
                        horarioInicio: null,
                        horarioFin: null,
                    },
                    {
                        id: "trES6",
                        fechaI: null,
                        fechaF: null,
                        fuente: "Estudiantes",
                        modalidad: null,
                        horarioInicio: null,
                        horarioFin: null,
                    },
                    {
                        id: "trES7",
                        fechaI: null,
                        fechaF: null,
                        fuente: "Estudiantes",
                        modalidad: null,
                        horarioInicio: null,
                        horarioFin: null,
                    },
                    {
                        id: "trES8",
                        fechaI: null,
                        fechaF: null,
                        fuente: "Estudiantes",
                        modalidad: null,
                        horarioInicio: null,
                        horarioFin: null,
                    },
                    {
                        id: "trES9",
                        fechaI: null,
                        fechaF: null,
                        fuente: "Estudiantes",
                        modalidad: null,
                        horarioInicio: null,
                        horarioFin: null,
                    },
                    {
                        id: "trES10",
                        fechaI: null,
                        fechaF: null,
                        fuente: "Estudiantes",
                        modalidad: null,
                        horarioInicio: null,
                        horarioFin: null,
                    },
                    {
                        id: "trT",
                        fechaI: null,
                        fechaF: null,
                        fuente: "Titulados",
                        modalidad: null,
                        horarioInicio: null,
                        horarioFin: null,
                    },
                    {
                        id: "trEm",
                        fechaI: null,
                        fechaF: null,
                        fuente: "Empleadores",
                        modalidad: null,
                        horarioInicio: null,
                    }
                ];
                return cronograma;
            }

            let cronograma = [];

            function iniciarTablaSemestral(cantidadDias) {
                // Selecciona el tbody del table
                var tbody = $('#tableCronograma tbody');

                // Elimina cualquier contenido existente en el tbody
                tbody.empty();

                // Definir los datos para las filas
                var filasData = [{
                        id: 'A',
                        fuente: 'Autoridades',
                        cantidad: '3'
                    },
                    {
                        id: 'D',
                        fuente: 'Docentes',
                        cantidad: '15'
                    },
                    {
                        id: 'ES1',
                        fuente: 'Estudiantes Nivel 1',
                        cantidad: '15'
                    },
                    {
                        id: 'ES2',
                        fuente: 'Estudiantes Nivel 2',
                        cantidad: '11'
                    },
                    {
                        id: 'ES3',
                        fuente: 'Estudiantes Nivel 3',
                        cantidad: '18'
                    },
                    {
                        id: 'ES4',
                        fuente: 'Estudiantes Nivel 4',
                        cantidad: '25'
                    },
                    {
                        id: 'ES5',
                        fuente: 'Estudiantes Nivel 5',
                        cantidad: '15'
                    },
                    {
                        id: 'ES6',
                        fuente: 'Estudiantes Nivel 6',
                        cantidad: '15'
                    },
                    {
                        id: 'ES7',
                        fuente: 'Estudiantes Nivel 7',
                        cantidad: '11'
                    },
                    {
                        id: 'ES8',
                        fuente: 'Estudiantes Nivel 8',
                        cantidad: '18'
                    },
                    {
                        id: 'ES9',
                        fuente: 'Estudiantes Nivel 9',
                        cantidad: '25'
                    },
                    {
                        id: 'ES10',
                        fuente: 'Estudiantes Nivel 10',
                        cantidad: '15'
                    },
                    {
                        id: 'T',
                        fuente: 'Titulados',
                        cantidad: '15'
                    },
                    {
                        id: 'Em',
                        fuente: 'Empleadores',
                        cantidad: '15'
                    }
                ];

                // Iterar sobre los datos y agregar filas al tbody
                filasData.forEach(function(filaData) {
                    var nuevaFila = '<tr id="tr' + filaData.id + '" style="display: none">' +
                        '<td style="border-right: 2px solid white;">' + filaData.fuente + '</td>' +
                        '<td style="border-right: 2px solid white;">' + filaData.cantidad + '</td>' +
                        '<td style="border-right: 2px solid white;">-</td>' +
                        '<td style="border-right: 2px solid white;">-</td>';

                    // Agrega las celdas correspondientes a los días
                    for (var j = 0; j < cantidadDias; j++) {
                        nuevaFila += '<td style="border-right: 2px solid white;"></td>';
                    }

                    // Cierra la etiqueta de la fila
                    nuevaFila += '</tr>';

                    // Agrega la nueva fila al tbody
                    tbody.append(nuevaFila);
                });
            }


            function iniciarTablaAnual(cantidadDias) {
                var tbody = $('#tableCronograma tbody');

                // Elimina cualquier contenido existente en el tbody
                tbody.empty();

                // Definir los datos para las filas
                var filasData = [{
                        id: 'A',
                        fuente: 'Autoridades',
                        cantidad: '3'
                    },
                    {
                        id: 'D',
                        fuente: 'Docentes',
                        cantidad: '15'
                    },
                    {
                        id: 'EA1',
                        fuente: 'Estudiantes Nivel 1',
                        cantidad: '15'
                    },
                    {
                        id: 'EA2',
                        fuente: 'Estudiantes Nivel 2',
                        cantidad: '11'
                    },
                    {
                        id: 'EA3',
                        fuente: 'Estudiantes Nivel 3',
                        cantidad: '18'
                    },
                    {
                        id: 'EA4',
                        fuente: 'Estudiantes Nivel 4',
                        cantidad: '25'
                    },
                    {
                        id: 'EA5',
                        fuente: 'Estudiantes Nivel 5',
                        cantidad: '15'
                    },
                    {
                        id: 'T',
                        fuente: 'Titulados',
                        cantidad: '15'
                    },
                    {
                        id: 'Em',
                        fuente: 'Empleadores',
                        cantidad: '15'
                    }
                ];

                // Iterar sobre los datos y agregar filas al tbody
                filasData.forEach(function(filaData) {
                    var nuevaFila = '<tr id="tr' + filaData.id + '" style="display: none">' +
                        '<td style="border-right: 2px solid white;">' + filaData.fuente + '</td>' +
                        '<td style="border-right: 2px solid white;">' + filaData.cantidad + '</td>' +
                        '<td style="border-right: 2px solid white;">-</td>' +
                        '<td style="border-right: 2px solid white;">-</td>';

                    // Agrega las celdas correspondientes a los días
                    for (var j = 0; j < cantidadDias; j++) {
                        nuevaFila += '<td style="border-right: 2px solid white;"></td>';
                    }

                    // Cierra la etiqueta de la fila
                    nuevaFila += '</tr>';

                    // Agrega la nueva fila al tbody
                    tbody.append(nuevaFila);
                });
            }
            let proceso = null;
            var cantidadDias = null;
            let cmember = null;

            function establecerFechas(fechaActual) {


                // Convertir fechas a objetos Date para comparar
                var fechaInicio = new Date(proceso.start_date);
                fechaInicio.setDate(fechaInicio.getDate() + 1);
                var fechaFin = new Date(proceso.end_date);
                fechaFin.setDate(fechaFin.getDate() + 1);
                var fechaActualObj = new Date(fechaActual);
                console.log("fechaInicio: ", fechaInicio);
                console.log("fechaFin: ", fechaFin);
                console.log("fechaActualObj: ", fechaActualObj);
                console.log("fechaActual", fechaActual);
                // Verificar si la fecha actual está dentro del rango proporcionado
                if (fechaActualObj > fechaFin) {
                    // Si la fecha actual está fuera del rango, deshabilitar los inputs
                    $('#fecha_inicio').prop('disabled', true);
                    $('#fecha_fin').prop('disabled', true);
                } else {
                    // Si la fecha actual está dentro del rango, habilitar los inputs
                    $('#fecha_inicio').prop('disabled', false);
                    $('#fecha_fin').prop('disabled', false);
                    $('#fecha_inicio').attr('min', fechaActual);
                    $('#fecha_inicio').attr('max', proceso.end_date);
                    $('#fecha_fin').attr('min', fechaActual);
                    $('#fecha_fin').attr('max', proceso.end_date);
                    $('#fecha_inicio').val(fechaActual);
                    $('#fecha_fin').val(fechaActual);
                }
                // if(fechaActualObj>=fechaInicio)
                // $('#fecha_inicio').attr('min', proceso.start_date);
                // $('#fecha_inicio').attr('max', proceso.end_date);
                // $('#fecha_fin').attr('min', proceso.start_date);
                // $('#fecha_fin').attr('max', proceso.end_date);
                // // Establecer el valor de los inputs
                // $('#fecha_inicio').val(fechaActual);
                // $('#fecha_fin').val(fechaActual);

            }
            $('#comission_id').change(function() {
                var comissionSeleccionado = $(this).val();
                $.ajax({
                    url: '/api/miembro/' + comissionSeleccionado,
                    type: 'GET',
                    success: function(response) {
                        console.log("miembro: ", response.data);
                        cmember = response.data;
                        $('#span-responsable').text('Responsable: ' + response.data.nombre);
                        $('#span-email').text('Correo: ' + response.data.correo);
                        $('#span-celular').text('Celular: ' + response.data.celular);

                    },
                    error: function(xhr, status, error) {
                        // Manejar el error aquí
                        console.error(error);
                        alert('Hubo un error al obtener el cronograma.');
                    }
                });
            });

            function verificaFuentes() {
                // Iterar sobre cada elemento del array cronograma
                for (var i = 0; i < cronograma.length; i++) {
                    // Verificar si el atributo fechaI no es null
                    if (cronograma[i].fechaI == null) {
                        // Si al menos uno no es null, retornar false
                        return false;
                    }
                }
                // Si todos son null, retornar true
                return true;
            }
            $('#proceso_id').change(function() {
                // Obtener el valor seleccionado del select
                var procesoSeleccionado = $(this).val();
                // Realizar la solicitud AJAX
                $.ajax({
                    url: '/api/cronograma/' + procesoSeleccionado,
                    type: 'GET',
                    success: function(response) {
                        // Manejar la respuesta exitosa aquí
                        console.log("PROCESO\n");
                        console.log(response.data.proceso);
                        console.log("CANTIDAD\n");
                        console.log(response.data.cantidadDias);
                        proceso = response.data.proceso;
                        cantidadDias = response.data.cantidadDias;
                        // // Crear una nueva instancia de Date
                        // var fechaActual = new Date();

                        // // Establecer la zona horaria de Bolivia (GMT-4)
                        // fechaActual.setHours(fechaActual.getHours() - 4);

                        // // Obtener los componentes de la fecha
                        // var año = fechaActual.getFullYear();
                        // var mes = ('0' + (fechaActual.getMonth() + 1)).slice(-
                        //     2); // Agregar 1 al mes porque enero es 0
                        // var dia = ('0' + fechaActual.getDate()).slice(-2);

                        // Formatear la fecha en formato "aaaa-mm-dd"
                        var fechaActualBolivia = {!! json_encode($fechaActual) !!};

                        console.log(fechaActualBolivia);
                        // var fechaActual = new Date().toISOString().split('T')[0];
                        establecerFechas(fechaActualBolivia);
                        // Por ejemplo, actualizar los atributos min y max de los inputs de fecha
                        // $('#fecha_inicio').attr('min', proceso.start_date);
                        // $('#fecha_inicio').attr('max', proceso.end_date);
                        // $('#fecha_inicio').val(fechaActual);
                        // $('#fecha_fin').attr('min', proceso.start_date);
                        // $('#fecha_fin').attr('max', proceso.end_date);
                        // $('#fecha_inicio').val(fechaActual);

                        // Llenar el select con las opciones de comissions
                        $('#comission_id')
                            .empty(); // Limpiar el select antes de agregar nuevas opciones
                        // Agregar el primer option seleccionable
                        $('#comission_id').append($('<option>', {
                            value: '', // Valor vacío
                            text: 'Seleccionar un responsable', // Texto del option
                            selected: 'selected', // Establecer como seleccionado
                            disabled: 'disabled' // Desactivar el option
                        }));
                        $.each(proceso.comissions, function(index, comission) {
                            $('#comission_id').append($('<option>', {
                                value: comission.cmember.id,
                                text: comission.cmember
                                    .nombre // Suponiendo que el objeto comission tiene una propiedad nombre
                            }));
                        });

                        $("#h5-carrera").text("CARRERA: " + proceso.career.nombre
                            .toUpperCase());
                        $("#h5-gestion").text("GESTION " + proceso.period + "-" + proceso.year);
                        limpiarTH();
                        llenarTH(cantidadDias, proceso.start_date);
                        if (proceso.modality.nombre == "Anual") {
                            iniciarTablaAnual(cantidadDias);
                            cronograma = iniciarCronogramaAnual();
                            console.log(cronograma);
                        } else {
                            iniciarTablaSemestral(cantidadDias);
                            cronograma = iniciarCronogramaSemestral();
                            console.log(cronograma);
                        }
                    },
                    error: function(xhr, status, error) {
                        // Manejar el error aquí
                        console.error(error);
                        alert('Hubo un error al obtener el cronograma.');
                    }
                });
            });


            $('.pagination li').click(function() {
                // Remover la clase 'active' de todos los elementos
                $('.pagination li').removeClass('active');

                // Agregar la clase 'active' al elemento seleccionado
                $(this).addClass('active');

                // Remover el span dentro del elemento que no está seleccionado
                $('.pagination li').not(this).find('span').remove();

                // Agregar el span al elemento seleccionado si no está presente
                if (!$(this).hasClass('page-item active')) {
                    $(this).append('<span class="page-link">Autoridades</span>');
                }
            });
            //Click button añadir
            function ocultarErrores() {
                $("#errorFechaInicio").css("display", "none");
                $("#errorFechaFin").css("display", "none");
                $("#errorHoraInicio").css("display", "none");
                $("#errorHoraFin").css("display", "none");
                $("#errorModalidad").css("display", "none");
            }

            function calcularDias(fechaInicio, fecha) {
                var diffDays = Math.ceil((new Date(fecha) - new Date(fechaInicio)) / (1000 * 60 * 60 * 24));
                return diffDays;
            }

            function limpiarBackground(tdElements) {
                // Iterar sobre cada <td>
                tdElements.each(function(index, tdElement) {
                    $(tdElement).css("background", ""); // Eliminar el estilo de fondo
                });
            }

            function addTr(fechaInicio, fechaFin, fechaI, fechaF, idTr, modalidad, horaInicio, horaFin, color) {

                var trElement = $("#" + idTr);

                var fechaInicioObj = new Date(fechaInicio);
                var fechaFinObj = new Date(fechaFin);
                var fechaActualObj = new Date(fechaInicio);
                var fechaActualInicioObj = new Date(fechaI);
                var fechaActualFinObj = new Date(fechaF);
                var b = true
                // Iterar sobre cada <td> dentro del <tr>
                trElement.find('td').each(function(index, tdElement) {
                    // Verificar si el índice está dentro del rango de fechas
                    // console.log("index: ", index);
                    if (index == 2) { //modalidad
                        $(tdElement).text(modalidad)
                    }
                    if (index == 3) { //horario
                        $(tdElement).text(horaInicio + " - " + horaFin)
                    }
                    if (index >= 4) {
                        if (fechaActualObj >= fechaActualInicioObj && fechaActualObj <= fechaActualFinObj) {
                            $(tdElement).css("background", color);
                        } else {
                            $(tdElement).css("background", "");
                        }
                        // if (fechaActualObj >= fechaInicioObj && fechaActualObj >= fechaActualInicioObj &&
                        //     fechaActualObj <= fechaFinObj && fechaActualObj <= fechaActualFinObj) {
                        //     $(tdElement).css("background", color);

                        // }
                        // Avanzar al siguiente día
                        fechaActualObj.setDate(fechaActualObj.getDate() + 1);
                    }
                });
                trElement.show();
            }

            function addCronograma(fechaInicio, fechaFin, idTr, modalidad, horaInicio, horaFin) {
                // Iterar sobre el array de cronograma
                for (var i = 0; i < cronograma.length; i++) {
                    // Verificar si el id coincide
                    if (cronograma[i].id === idTr) {
                        // Actualizar los valores correspondientes en el objeto del cronograma
                        cronograma[i].fechaI = fechaInicio;
                        cronograma[i].fechaF = fechaFin;
                        cronograma[i].modalidad = modalidad;
                        cronograma[i].horarioInicio = horaInicio;
                        cronograma[i].horarioFin = horaFin;

                        // Actualizar los valores en el elemento <tr> correspondiente
                        // var trElement = $("#" + idTr);
                        // trElement.show(); // Mostrar el elemento si estaba oculto
                        // trElement.find('td:eq(3)').text(modalidad); // Actualizar modalidad
                        // trElement.find('td:eq(4)').text(horaInicio + " - " + horaFin); // Actualizar horario
                        // Aquí puedes continuar actualizando otros valores si es necesario

                        // Salir del bucle ya que encontramos el objeto correspondiente
                        break;
                    }
                }
            }

            function validar(fechaInicio, fechaFin, horaInicio, horaFin, modalidad) {
                var cantidadFallas = 0;
                if (fechaInicio === "") {
                    $("#errorFechaInicio").show();
                    cantidadFallas++;
                }
                if (fechaFin === "") {
                    $("#errorFechaFin").show();
                    cantidadFallas++;
                }
                if (horaInicio === "") {
                    $("#errorHoraInicio").show();
                    cantidadFallas++;
                }
                if (horaFin === "") {
                    $("#errorHoraFin").show();
                    cantidadFallas++;
                }
                if (modalidad == null) {
                    $("#errorModalidad").show();
                    cantidadFallas++;
                }
                return cantidadFallas;
            }
            // GUARDAR CRONOGRAMA
            $('#btnSave').click(function(e) {
                e.preventDefault(); // Evitar el comportamiento por defecto del botón
                console.log(cronograma);
                responsable=$("#comission_id");
                $("#errorResponsable").css("display", "none");
                // Obtener el array cronograma y convertirlo a JSON
                var cronogramaJSON = JSON.stringify(cronograma);
                console.log(cronogramaJSON);
                // Asignar el JSON al valor del input oculto
                $('#procesoInput').val(proceso.id);
                $('#cronogramaInput').val(cronogramaJSON);
                if (cmember === null) {
                    $("#errorResponsable").show();
                    return false;
                }
                $('#cmember').val(cmember.id);
                // Enviar el formulario
                var b = verificaFuentes();
                if (b) {
                    $('#formCronograma').submit();
                } else {
                    alert("Debe completar con todas las fuentes del cronograma");
                }

            });
            $("#btnAdd").click(function() {
                var activeButtonId = $(".page-item.active button").attr("id");
                console.log("El botón activo es: " + activeButtonId);
                ocultarErrores();
                var fechaInicio = $("#fecha_inicio").val();
                var fechaFin = $("#fecha_fin").val();
                var horaInicio = $("#hora_inicio").val();
                var horaFin = $("#hora_fin").val();
                var modalidad = $("#modalidad").val();
                // Validación de campos
                var cantidadFallas = validar(fechaInicio, fechaFin, horaInicio, horaFin, modalidad);
                if (cantidadFallas > 0)
                    return false;
                // Resto de validaciones de campos
                modalidadText = $("#modalidad option:selected").text();
                var table = $("#div-cronograma");
                table.css("display", "block");
                switch (activeButtonId) {
                    case "btnAutoridades":
                        var idTr = "trA";
                        addTr(proceso.start_date, proceso.end_date, fechaInicio, fechaFin, idTr,
                            modalidadText, horaInicio, horaFin, "#04CB00")
                        addCronograma(fechaInicio, fechaFin, idTr, modalidad, horaInicio, horaFin);
                        console.log("cronograma: \n");
                        console.log(cronograma);
                        break;
                    case "btnDocentes":
                        var idTr = "trD";
                        addTr(proceso.start_date, proceso.end_date, fechaInicio, fechaFin, idTr,
                            modalidadText, horaInicio, horaFin, "#0183FF")
                        addCronograma(fechaInicio, fechaFin, idTr, modalidad, horaInicio, horaFin);
                        console.log("cronograma: \n");
                        console.log(cronograma);
                        break;
                    case "btnEstudiantes":
                        if (proceso.modality.nombre == "Anual") {
                            for (let index = 1; index <= 10; index++) {
                                var idTr = "trEA" + index;
                                addTr(proceso.start_date, proceso.end_date, fechaInicio, fechaFin, idTr,
                                    modalidadText, horaInicio, horaFin, "#CA1C1A")
                                addCronograma(fechaInicio, fechaFin, idTr, modalidad, horaInicio, horaFin);
                                console.log("cronograma: \n");
                                console.log(cronograma);
                            }
                        } else {
                            for (let index = 1; index <= 10; index++) {
                                var idTr = "trES" + index;
                                addTr(proceso.start_date, proceso.end_date, fechaInicio, fechaFin, idTr,
                                    modalidadText, horaInicio, horaFin, "#CA1C1A")
                                addCronograma(fechaInicio, fechaFin, idTr, modalidad, horaInicio, horaFin);
                                console.log("cronograma: \n");
                                console.log(cronograma);
                            }
                        }
                        break;
                    case "btnTitulados":
                        var idTr = "trT";
                        addTr(proceso.start_date, proceso.end_date, fechaInicio, fechaFin, idTr,
                            modalidadText, horaInicio, horaFin, "#BB09B4")
                        addCronograma(fechaInicio, fechaFin, idTr, modalidad, horaInicio, horaFin);
                        console.log("cronograma: \n");
                        console.log(cronograma);
                        break;
                    case "btnEmpleadores":
                        var idTr = "trEm";
                        addTr(proceso.start_date, proceso.end_date, fechaInicio, fechaFin, idTr,
                            modalidadText, horaInicio, horaFin, "#FFF500")
                        addCronograma(fechaInicio, fechaFin, idTr, modalidad, horaInicio, horaFin);
                        console.log("cronograma: \n");
                        console.log(cronograma);
                        break;
                    default:
                        break;
                }
            });
        });
    </script>
@endsection
