@extends('layouts.app')

@section('content')
    <div style="margin: 20px">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    {{-- <div class="card-header" style="background: #0085FE; color:white">
                        {{ __('Cronograma|Lista') }}
                        
                        <a class="btn btn-success" href="{{route('cronograma.create')}}">Crear</a>
                    </div> --}}
                    <div class="card-header d-flex justify-content-between" style="background: #0085FE; color:white">
                        <span>{{ __('Cronograma|Lista') }}</span>
                        <div class="d-flex">
                            <a class="btn btn-success" href="{{ route('cronograma.create') }}">Crear</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <table class="table table-striped" id="table" style="width:100%">
                            <thead>
                                <th>CÓDIGO</th>
                                <th>DESCRIPCION</th>
                                <th>DETALLE</th>
                                <th>ACCIONES</th>
                            </thead>
                            <tbody>
                                @foreach ($selfAssessments as $selfAssessment)
                                    @if (count($selfAssessment->schedules) > 0)
                                        <tr>
                                            <td>{{ $selfAssessment->id }}</td>
                                            <td>{{ $selfAssessment->description }}</td>
                                            <td class="lh-1">
                                                <p class="lh-1 mb-1" style="color:#333333">
                                                    <span><strong>Facultad:</strong> {{ $selfAssessment->faculty->nombre }}</span>
                                                </p>
                                                <p class="lh-1 mb-1" style="color:#333333">
                                                    <span><strong>Carrera:</strong> {{ $selfAssessment->career->nombre }}</span>
                                                </p>
                                                <p class="lh-1 mb-1" style="color:#333333">
                                                    <span><strong>Lugar:</strong> {{ $selfAssessment->place->nombre }}</span>
                                                </p>
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-secondary dropdown-toggle" type="button"
                                                        id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        Opciones
                                                    </button>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                        <li><a class="dropdown-item" href='#'><i
                                                                    class="fa fa-edit"></i> Editar</a></li>
                                                        <li><a class="dropdown-item" href="#"><i
                                                                    class="fa fa-layer-group"></i> Parentesco</a></li>
                                                        <li><a class="dropdown-item" href='#'><i
                                                                    class="fa fa-trash"></i> Eliminar</a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- css --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <!-- js -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"></script> <!-- Agrega el archivo de traducción en español -->

    <script>
        $(document).ready(function() {
            $('#table').DataTable({
                language: {
                    url: "https://cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json" // Carga el archivo de traducción en español
                },
                order: []
            });
        });
    </script>
@endsection
