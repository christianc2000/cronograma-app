<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Comission;
use App\Models\SelfAssessment;
use DateTime;
use Illuminate\Http\Request;

class CronogramaController extends Controller
{
    public function getResponsable($id)
    {
        $comision = Comission::find($id);
        if (isset($comision)) {
            $miembro=$comision->cmember;
            return response()->json(['message' => 'Miembro encontrado', 'data' => $miembro], 200);
        } else {
            return response()->json(['error' => 'No se encontró el proceso con el ID proporcionado'], 404);
        }
    }
    public function extraerCronograma($id)
    {
        function calcularDiferenciaDias($fechaInicial, $fechaFinal)
        {
            // Crear objetos DateTime para las fechas
            $fechaInicio = new DateTime($fechaInicial);
            $fechaFin = new DateTime($fechaFinal);

            // Calcular la diferencia en días
            $diferencia = $fechaInicio->diff($fechaFin);

            // Obtener el número de días de la diferencia
            return $diferencia->days;
        }
        $proceso = SelfAssessment::find($id);
        if (isset($proceso)) {
            $proceso->load('comissions.cmember');
            $proceso->load('career');
            $proceso->load('modality');
            $diferenciaDias = calcularDiferenciaDias($proceso->start_date, $proceso->end_date)+1;
            return response()->json(['message' => 'Proceso encontrado', 'data' => ['proceso' => $proceso, 'cantidadDias' => $diferenciaDias]], 200);
        } else {
            return response()->json(['error' => 'No se encontró el proceso con el ID proporcionado'], 404);
        }
    }
}
