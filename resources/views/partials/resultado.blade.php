@if (isset($monto))

    @php

        $mensualidad = 'Mensual';
        if($frecuencia==1){
            $mensualidad = 'Anual';
        }elseif ($frecuencia==6) {
            $mensualidad = 'Semestral';
        }


    @endphp

    <table class="table table-striped table-bordered table-hover text-center">
        <tr>
            <th colspan="2">Período </th>
            <td colspan="4">
                Monto       <strong>{{ number_format($monto,0,',','.') }}            </strong>|
                Frecuencia  <strong>{{ $mensualidad }}      </strong>|
                Meses gracia <strong>{{ $mesamor }}          </strong>|
                Cuotas      <strong>{{ $cuotas }}           </strong>|
                Plazo       <strong>{{ $cuotas+$mesamor }} Meses</strong>
            </td>
        </tr>
        <tr>
            <td>Mes</td>
            <td>Año</td>
            <td>Cuota</td>
            <td>Capital</td>
            <td>Interés</td>
            <td>Saldo</td>
        </tr>
        @php
            $mes            = 1;
            $ano            = 1;

            $auxiliar       = $monto;
            $interes        = $interes / 12;


            if($mesamor == 0){

                $cuota          = $monto * ((pow(1+$interes,$cuotas)*$interes)/(pow(1+$interes,$cuotas)-1));
                $pagoInteres    = $monto * $interes;
                $pagoCapital    = $cuota - $pagoInteres;
                $monto          = abs($monto - $pagoCapital);

            }else{

                $cuota          = 0;
                $pagoInteres    = 0;
                $pagoCapital    = 0;
                $monto          = 0;
            }


        @endphp

        @for ($i = 1; $i < $cuotas+1+$mesamor; $i++)

            <tr>
                <td>{{ $mes }}</td>
                <td>{{ $ano }}</td>
                <td>{{ number_format($cuota,2) }}</td>
                <td>{{ number_format($pagoCapital,2) }}</td>
                <th>{{ number_format($pagoInteres, 2) }}</th>
                <td>{{ number_format($monto, 2) }}</td>
            </tr>

        @php
            $mes++;

            if($mesamor == 0){

                $pagoInteres    = $monto * $interes;
                $pagoCapital    = $cuota - $pagoInteres;
                $monto          = abs($monto - $pagoCapital);

            }else{

                if(($mesamor == 6 AND $i == 6)){

                    $cuota          = $auxiliar * ((pow(1+$interes,$cuotas)*$interes)/(pow(1+$interes,$cuotas)-1));
                    $pagoInteres    = $auxiliar * $interes;
                    $pagoCapital    = $cuota - $pagoInteres;
                    $monto          = abs($auxiliar - $pagoCapital);

                }else{

                    $pagoInteres    = $monto * $interes;
                    $pagoCapital    = $cuota - $pagoInteres;
                    $monto          = abs($monto - $pagoCapital);

                }
            }



            if ($i%12 == 0){
                $mes = 1;
                $ano++;
            }

        @endphp

        @endfor

    </table>
@else
    Cargue los parámetros para el cálculo
@endif
