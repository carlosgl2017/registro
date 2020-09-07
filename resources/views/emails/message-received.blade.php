<!DOCTYPE html>
<html>
<head>
   <title>Solicitud de Crédito</title>
</head>
<body>
<h3 style="text-align:center">SOLICITUD DE CRÉDITO</h3>
<table border="1">
      <thead>
      <tr><td colspan="6" style="text-align:center;background-color:#C4E14A"><strong>DATOS SOLICITANTE</strong></td></tr>
        <tr>
          <th>NOMBRE</th>
          <th>APELLIDO PARTERNO</th>
          <th>APELLIDO MATERNO</th>
          <th>CELULAR</th>
          <th>CI</th>
          <th>ESTADO CIVIL</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($msg as $pe)
        <tr>
          <td>{{$pe->nombre}}</td>
          <td>{{$pe->ap_paterno}}</td>
          <td>{{$pe->ap_materno}}</td>
          <td>{{$pe->celular}}</td>
          <td>{{$pe->ci}}</td>
          <td>{{$pe->estado_civil}}</td>
        </tr>
        @endforeach
      </tbody>

      @if($exist_conyugue>0)
      <thead>
      <tr><td colspan="6" style="text-align:center;background-color:#C4E14A"><strong> INFORMACIÓN DEL CONYUGUE</strong></td></tr>
        <tr>
          <th>NOMBRE</th>
          <th>APELLIDO PARTERNO</th>
          <th>APELLIDO MATERNO</th>
          <th>CELULAR</th>
          <th>CI</th>
          <th>ESTADO CIVIL</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($conyugues as $co)
        <tr>
          <td>{{$co->nombre}}</td>
          <td>{{$co->ap_paterno}}</td>
          <td>{{$co->ap_materno}}</td>
          <td>{{$co->celular}}</td>
          <td>{{$co->ci}}</td>
          <td>{{$co->estado_civil}}</td>
        </tr>
        @endforeach
      </tbody>
      @endif

<!--CREDITO-->
<thead>
      <tr><td colspan="6" style="text-align:center;background-color:#C4E14A"><strong>DATOS DEL CRÉDITO</strong></td></tr>
        <tr>
          <th colspan="2">MONTO SOLICITADO</th>
          <th colspan="2" >DESTINO DE CRÉDITO</th>
          <th colspan="2">TIPO DE CRÉDITO SOLICITADO</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($creditos as $cre)
        <tr>
          <td colspan="2">{{number_format($cre->monto,2,',', '.')}} Bs.</td>
          <td colspan="2">{{$cre->destino_credito}}</td>
          <td colspan="2">{{$cre->tipo_credito}}</td>
        </tr>
        @endforeach
      </tbody>


      <!--INGRESOS-->
      <thead>
      <tr><td colspan="6" style="text-align:center;background-color:#C4E14A"><strong>INFORMACIÓN DE INGRESOS</strong></td></tr>
        <tr>
          <th colspan="1">INGRESO MENSUAL</th>
          <th colspan="2" >TIEMPO DE TRABAJO</th>
          <th colspan="1">APORTA A AFP</th>
          <th colspan="1">TIPO_INGRESO</th>
          <th colspan="1">TIPO DE SALARIO</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($ingresos as $ing)
        <tr>
          <td colspan="1">{{number_format($ing->ingreso_mensual,2,',', '.')}} Bs.</td>
          <td colspan="2">{{$ing->tiempo_trabajo_anios}}años y {{$ing->tiempo_trabajo_meses}} meses</td>
          <td colspan="1">@if($ing->aporte_afp)
             SI
            @else
             NO
            @endif
          </td>
          <td colspan="1">{{$ing->tipo_ingreso}}</td>
          <td colspan="1">{{$ing->tipo_salario}}</td>
        </tr>
        @endforeach
      </tbody>

       <!--Prestamos-->
       @if($exist_prestamo>0)
      <thead>
      <tr><td colspan="6" style="text-align:center;background-color:#C4E14A"><strong>INFORMACIÓN DE PRESTAMOS</strong></td></tr>
        <tr>
          <th colspan="2" >CUOTA MENSUAL</th>
          <th colspan="2" >SALDO</th>
          <th colspan="2" >ENTIDAD</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($prestamos as $pres)
        <tr>
          <td colspan="2">{{number_format($pres->cuota_mensual,2,',', '.')}}</td>
          <td colspan="2">{{number_format($pres->saldo,2,',', '.')}}</td>
          <td colspan="2">{{$pres->nombre}}</td>
        </tr>
        @endforeach        
      </tbody>
      @endif
      
      @if($exist_bien>0)
      <thead>
      <tr><td colspan="6" style="text-align:center;background-color:#C4E14A"><strong>DECLARACIÓN DE BIENES</strong></td></tr>
        <tr>
          <th colspan="2" >DESCRIPCION</th>
          <th colspan="1" >MARCA</th>
          <th colspan="1" >SERIE</th>
          <th colspan="2" >VALOR</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($bienes as $bi)
        <tr>
          <td colspan="2">{{$bi->descripcion}}</td>
          <td colspan="1">{{$bi->marca}}</td>
          <td colspan="1">{{$bi->serie}}</td>
          <td colspan="2">{{number_format($bi->valor,2,',', '.')}} Bs.</td>
        </tr>
        @endforeach
        <tr>
        <td colspan="4">TOTAL</td>  <td colspan="2">{{number_format($total_bienes,2,',', '.')}} Bs.</td>
        </tr>
      </tbody>
      @endif
    </table>

</body>

</html>
