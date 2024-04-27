@extends('layouts.app')

@section('content')
    <div style="margin: 20px">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="background: #0085FE; color:white">{{ __('Cronograma/Crear') }}</div>
                    <div class="card-body">
                        <div class="form-floating mb-3">
                            <select class="form-select" aria-label="Default select example">
                                <option selected disabled>Seleccionar un proceso de muestra</option>
                                <option value="1">F. de Cs. de la Computación y Telecomunicaciones - Ingeniería
                                    Informática - Santa Cruz</option>
                                <option value="2">F. de Cs. de la Computación y Telecomunicaciones - Ingeniería en
                                    Sistema - Santa Cruz</option>
                                <option value="3">F. de Cs. de la Computación y Telecomunicaciones - Ingeniería en
                                    Redes y Telecomunicaciones - Santa Cruz</option>
                            </select>
                            <label for="muestra" class="form-label">Proceso de muestra</label>
                        </div>
                        <div class="mb-3">
                            {{-- <div class="d-grid gap-2 d-md-block">
                                <button type="button" class="btn btn-dark">Autoridades</button>
                                <button type="button" class="btn btn-dark">Docentes</button>
                                <button type="button" class="btn btn-dark">Estudiantes</button>
                                <button type="button" class="btn btn-dark">Titulados</button>
                                <button type="button" class="btn btn-dark">Empleadores</button>
                            </div> --}}
                            <nav aria-label="...">
                                <ul class="pagination pagination-md">
                                    {{-- <li class="page-item active" aria-current="page">
                                        <button class="page-link">Autoridades</button>
                                    </li> --}}
                                    <li class="page-item active"><button type="button" class="page-link">Autoridades</a>
                                    </li>
                                    <li class="page-item"><button type="button" class="page-link">Docentes</a></li>
                                    <li class="page-item"><button type="button" class="page-link">Estudiantes</a></li>
                                    <li class="page-item"><button type="button" class="page-link">Titulados</a></li>
                                    <li class="page-item"><button type="button" class="page-link">Empleadores</a></li>
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
                                                        <input type="date" class="form-control" id="fecha_inicio">
                                                        <label for="fecha_inicio" class="form-label">Fecha inicio</label>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="date" class="form-control" id="fecha_fin">
                                                        <label for="fecha_fin" class="form-label">Fecha fin</label>
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
                                                        <input type="time" class="form-control" id="hora_inicio">
                                                        <label for="hora_inicio" class="form-label">Hora inicio</label>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="time" class="form-control" id="hora_fin">
                                                        <label for="hora_fin" class="form-label">Hora fin</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" aria-label="modalidad">
                                <option selected disabled>Seleccionar un proceso una modalidad</option>
                                <option value="1">Virtual</option>
                                <option value="2">Presencial</option>
                                <option value="3">Mixta</option>
                            </select>
                            <label for="modalidad">Modalidad</label>
                        </div>
                        <div class="mb-3">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button class="btn btn-danger me-md-2" type="button">Cancelar</button>
                                <button class="btn btn-primary" type="button">Añadir</button>
                            </div>
                        </div>
                        <br>
                        {{-- CRONOGRAMA --}}
                        <div class="mb-3" id="div-cronograma">
                            <div class="form-floating mb-3">
                                <select class="form-select" aria-label="responsable">
                                    <option selected disabled>Seleccionar un responsable</option>
                                    <option value="1">Ing. Christian Celso Mamani Soliz</option>
                                    <option value="2">Dra. Nadia Torrico León</option>
                                    <option value="3">Ing. Herberth Lázaro Flores</option>
                                    <option value="4">Dra. Madeleine Vásquez Ortuño</option>
                                </select>
                                <label for="responsable" class="form-label">Responsable</label>
                            </div>
                            <br>
                            <br>
                            <div id="contenido-cronograma">
                                <div id="titulo-contenido-cronograma" class="mb-6" style="text-align: center">
                                    <h5>CRONOGRAMA DE EJECUCIÓN DE ENCUESTA</h5>
                                    <h5>CARRERA: INGENIERÍA INFORMÁTICA</h5>
                                    <h5>GESTIÓN 1/2023</h5>
                                </div>
                                <br>
                                <div id="encargado-contenido-cronograma" class="lh-1">
                                    <p style="color:#333333">
                                        <span>Responsable: Christian Celso Mamani Soliz</span>
                                        <span>Email: christiancelsomamanisoliz0@gmail.com</span>
                                        <span>Celular: 77376902</span>
                                    </p>
                                </div>
                                <br>
                                <div id="div-table" class="table-responsive" style="font-size: 12px">
                                    <table class="table table-lg">
                                        <thead class="table-success">
                                            <tr>
                                                <th scope="col">Nro</th>
                                                <th scope="col">Fuente</th>
                                                <th scope="col">Cantidad</th>
                                                <th scope="col">Modalidad</th>
                                                <th scope="col" style="width: 20%">Horario</th>
                                                @for ($i = 0; $i < 30; $i++)
                                                    <th scope="col">{{ $i + 1 }}/1</th>
                                                @endfor
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @for ($i = 0; $i < 9; $i++)
                                                <tr>
                                                    <th scope="row">{{ $i + 1 }}</th>
                                                    <td>Autoridad</td>
                                                    <td>3</td>
                                                    <td>Virtual</td>
                                                    <td>08:00 - 18:00</td>
                                                    @for ($j = 0; $j < 30; $j++)
                                                        <td style="background: orange">x</td>
                                                    @endfor
                                                </tr>
                                            @endfor
                                        </tbody>
                                    </table>
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
    </style>
    </style>
    {{-- JS --}}
    <script>
        $(document).ready(function() {
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
        });
    </script>
@endsection
