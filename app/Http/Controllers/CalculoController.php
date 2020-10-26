<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Credito;
use App\Ingreso;
use App\Persona;
use DB;

class CalculoController extends Controller {
    
    //calculo de ingreso del solicitante
    public function total_ingreso()
    {
        $id_user=auth()->user()->id;
        $id_persona=Persona::where('id_persona',$id_user)->firstOrFail()->id_persona;        
        $total_efectivo = DB::table('ingresos')->where('id_persona', $id_persona)->sum('ingreso_mensual');
        return $total_efectivo;
    }
    public function tiempo()
    {
        $id_user=auth()->user()->id;
        $id_persona=Persona::where('id_persona',$id_user)->firstOrFail()->id_persona; 
        $plazo_meses=Credito::where('id_persona',$id_persona)->firstOrFail()->plazo_meses;
        return $plazo_meses;
    }
    
    public function sistema_frances($n,$i,$capital) {
         $t = $n;
         $j = $i/12;
         $cuota = ($capital*$j*pow(( 1+$j ),$t))/(pow( (1+$j ), $t )-1);
        return $cuota;
    }
    public function monto_solicitado()
    {
        $id_user=auth()->user()->id;
        $id_persona=Persona::where('id_persona',$id_user)->firstOrFail()->id_persona; 
        $monto=Credito::where('id_persona',$id_persona)->firstOrFail()->monto;
        return $monto;
    }
    public function calculo() {
        $calculo_sistemaf=$this->sistema_frances($this->tiempo(),$this->tasa(),$this->monto_solicitado());
        $porcentaje = 0.25*$this->total_ingreso();
        if ( $porcentaje >= $calculo_sistemaf ) {
            return 1;
        } else {
            return 0;
        }
    }
        public function tasa() {
            $id_user=auth()->user()->id;
            $id_persona=Persona::where('id_persona',$id_user)->firstOrFail()->id_persona; 
            $id_tipo_credito = Credito::where( 'id_persona', $id_persona )->firstOrFail()->id_tipo_credito;
            switch($id_tipo_credito) {
                case 1:
                return 0.24;
                //Credito de consumo
                break;
                case 2:
                return 0.24;
                //Microcredito
                break;
                case 3:
                return 0.17;
                //Hipotecario
                break;
                default:
                return 0.24;
                break;
            }

        }
        
}