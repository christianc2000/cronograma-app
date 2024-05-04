<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Career;
use App\Models\Schedule;
use App\Models\SelfAssessment;
use App\Models\Source;
use Carbon\Carbon;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;

class CronogramaController extends Controller
{
    public function index()
    {
        $selfAssessments=SelfAssessment::all();
        return view('web.cronograma.index',compact('selfAssessments'));
    }
    public function create()
    {

        $procesos = SelfAssessment::all();
        // Obtener la fecha y hora actual
        $fechaActual = new DateTime('now');

        // Establecer la zona horaria a Bolivia
        $zonaHorariaBolivia = new DateTimeZone('America/La_Paz');
        $fechaActual->setTimezone($zonaHorariaBolivia);

        // Formatear la fecha según tus necesidades
        $fechaActual = $fechaActual->format('Y-m-d');
        // $cantidadDias=960;//Cantidad de días
        // $fechaActual = Carbon::now()->toDateString(); // Obtiene la fecha actual
        // $fechaFinal = Carbon::now()->addDays($cantidadDias-1)->toDateString(); // Obtiene la fecha actual + 30 días
        // $facultad="Ciencias de la Computación y telecomunicaciones";
        // $carrera="Ingeniería Informática";
        // $gestion="I";
        // $anio=2024;
        // $modalidadCarrera="S";//S=Semestrarl, A=Anual
        // $organizadores=[['nombre'=>'Ing. Celso Ortiz'],['nombre'=>'Dra. Margarita Flores'],['nombre'=>'Lic. Rodrigo Guzman']];
        return view('web.cronograma.create', compact('procesos', 'fechaActual'));
    }
    public function store(Request $request)
    {

        $request->validate([
            'procesoInput' => 'required|exists:self_assessments,id',
            'cmember' => 'required|exists:c_members,id',
            'cronogramaInput' => 'string'
        ]);

        $cronogramas = json_decode($request->cronogramaInput);
        // return $cronogramas;
        foreach ($cronogramas as $cronograma) {
            if ($cronograma->fuente == "Autoridades") {
                $source_id = Source::all()->where('name', 'Autoridades')->first()->id;
            } else if ($cronograma->fuente == "Docentes") {
                $source_id = Source::all()->where('name', 'Docentes')->first()->id;
            } else if ($cronograma->fuente == "Estudiantes") {
                $source_id = Source::all()->where('name', 'Estudiantes')->first()->id;
            } else if ($cronograma->fuente == "Titulos") {
                $source_id = Source::all()->where('name', 'Titulos')->first()->id;
            } else {
                $source_id = Source::all()->where('name', 'Empleadores')->first()->id;
            }
            Schedule::create([
                'start_date' => $cronograma->fechaI,
                'end_date' => $cronograma->fechaF,
                'start_time' => $cronograma->horarioInicio,
                'end_time' => $cronograma->horarioFin,
                'source_id' => $source_id,
                'self_assessment_id' => $request->procesoInput
            ]);
        }
        return redirect()->route('cronograma.index');
    }
}
