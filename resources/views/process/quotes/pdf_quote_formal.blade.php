<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Cotización de servicio</title>
        <style>
            body {font-family: "Trebuchet MS", Verdana, Arial, Helvetica, sans-serif; }
            p { font-size: 10px;}

            h1 { font-size: 16px;}

        </style>
    </head>
    <body>
        <table width="100%">
            <tr>
                <td> <img src="{{ asset('dist/img/LogoTusTareasHorizontal_Op.png') }}" height="100" style="opacity: .8"></td>
                <td style="text-align: right">
                    <h1>TUS TAREAS</h1>
                    <p> Nit: 98762114-7<br>
                        www.tustareas.com.co<br>
                        tustareasinternacional@gmail.com<br>
                        Marca registrada <br>
                    </p> 
                </td>
            </tr>
        </table>
        <br>
        <table id="table1" width="100%" style=" border: 1px solid black; border-collapse: collapse;">
            <tr style="background-color: #dcd9d9;">
                <th style="text-align: center; font-size:14px">Cotización #</th>
                <th style="text-align: center; font-size:14px">Servicio</th>
                <th style="text-align: center; font-size:14px">Fecha cotización</th>
                <th style="text-align: center; font-size:14px">Valido hasta</th>
                <th style="text-align: center; font-size:12px; width:20%;border:1px solid">Moneda</th>
            </tr>
           <tr>
               <td style="text-align: center; font-size:12px">{{$data->id}}</td>
               <td style="text-align: center; font-size:12px">{{$data->requestQuoteTutor->request->parametric->p_text}}</td>
               <td style="text-align: center; font-size:12px">{{$data->date_quote}}</td>
               <td style="text-align: center; font-size:12px">{{$data->date_validate}}</td>
               <td style="text-align: center; font-size:12px">{{$data->requestQuoteTutor->request->users->coins->c_type_currency}} - {{$data->requestQuoteTutor->request->users->coins->c_currency}}
            </td>
           </tr>
        </table>
        <br>
        <br>
        <br>
        <p>
            Sr@, {{$data->requestQuoteTutor->request->users->u_nickname}}
            <br>
            <br>
            {{$data->requestQuoteTutor->request->users->country->c_name}}
            <br>
            <br>
            <br>
            Gracias por Contactarnos,<br>
            De acuerdo a su solicitud envío nuestra propuesta comercial.
        </p>
      
        <table id="table1" width="100%" style=" border: 1px solid black; border-collapse: collapse;">
            <tr style="background-color: #dcd9d9;border:1px solid">
                <th style="text-align: center; font-size:12px; width:10%;border:1px solid">N°</th>
                <th style="text-align: center; font-size:12px; width:30%;border:1px solid">Descripción</th>
                <th style="text-align: center; font-size:12px; width:20%;border:1px solid">Valor</th>
                <th style="text-align: center; font-size:12px; width:20%;border:1px solid">Total</th>
            </tr>
            @php
                $i = 1;
                $valor_t = 0;
            @endphp
            <tr>
                <td style="text-align: center; font-size:10px;border:1px solid">
                    {{$i}}
                </td>
                <td style="text-align: left; font-size:10px;border:1px solid">
                    @if(isset($data->requestQuoteTutor->request->requestResponses))
                        <p>Preguntas:</p>
                        <ul> 
                            @foreach($data->requestQuoteTutor->request->requestResponses as $key => $value)
                                <li>
                                    {{$value->requestQuestion->question}}: {{$value->response}}
                                </li>
                            @endforeach
                        </ul>
                    @endif
                    @if(isset($data->requestQuoteTutor->request->requestLanguages))
                    <p>Idiomas:</p>
                        <ul>
                            @foreach($data->requestQuoteTutor->request->requestLanguages as $lang)
                                <li>
                                    {{$lang->tutorLanguage->p_text}}
                                </li>
                            @endforeach
                        </ul>
                    @endif
                    @if(isset($data->requestQuoteTutor->request->requestSystems))
                    <p>Sistemas:</p>
                        <ul>
                            @foreach($data->requestQuoteTutor->request->requestSystems as $system)
                                <li>
                                    {{$system->tutorSystem->p_text}}
                                </li>
                            @endforeach
                        </ul>
                    @endif
                    @if(isset($data->requestQuoteTutor->request->requestTopics))
                    <p>Temas:</p>
                        <ul>
                            @foreach($data->requestQuoteTutor->request->requestTopics as $topic)
                                <li>
                                    {{$topic->topics->subject->area->a_name}}/{{$topic->topics->subject->s_name}}/{{$topic->topics->t_name}}
                                </li>
                            @endforeach
                        </ul>
                    @endif
                    @if(isset($data->requestQuoteTutor->request->requestFiles))
                    <p>Temas:</p>
                        <ul>
                            @foreach($data->requestQuoteTutor->request->requestFiles as $file)
                                <li>
                                    {{$file->file}}
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </td>
                <td style="text-align: center; font-size:10px;border:1px solid">
                    <p>
                        {{number_format($data->value)}}
                    </p>
                </td>
                <td style="text-align: center; font-size:10px;border:1px solid">
                    <p>{{$data->requestQuoteTutor->request->users->coins->c_type_currency}} - {{$data->requestQuoteTutor->request->users->coins->c_currency}}</p>
                </td>
                <td style="text-align: center; font-size:10px;border:1px solid">
                    <p><b>{{number_format($data->value)}}</b></p>
                </td>
            </tr>
            @php
                $i++;
                $valor_t = $valor_t + $data->value;
            @endphp
            @if(isset($data->requestBond))
                <tr>
                    <td style="text-align: center; font-size:10px;border:1px solid">
                        {{$i}}
                    </td>
                    <td style="text-align: center; font-size:10px;border:1px solid">
                      <p>{{$data->requestBond->bond->type_bond->p_text}}  -  {{$data->requestBond->bond->value_bond->p_text}}</p>  
                    </td>
                    <td style="text-align: center; font-size:10px;border:1px solid">
                        {{number_format((float)$data->requestBond->value_bond)}}
                    </td>
                    <td style="text-align: center; font-size:10px;border:1px solid">
                       <p><b>{{number_format((float)$data->requestBond->value_bond *(-1))}}</b></p> 
                    </td>
                </tr>
                @php
                    $valor_t = $valor_t - (float)$data->requestBond->value_bond;
                @endphp
            @endif
            <tr style="background-color: #dcd9d9;border:1px solid">
                <td colspan="3"></td>
                <td style="text-align: right; font-size:10px;border:1px solid">Sub Total</td>
                <td style="text-align: center; font-size:10px;border:1px solid"><b>{{number_format($valor_t)}}</b></td>
            </tr>
            <tr style="background-color: #dcd9d9;border:1px solid">
                <td colspan="3"></td>
                <td style="text-align: right; font-size:10px;border:1px solid">IVA @ 19.00%</td>
                <td style="text-align: center; font-size:10px;border:1px solid"><b>{{number_format(0)}}</b></td>
            </tr>
            <tr style="background-color: #dcd9d9;border:1px solid">
                <td colspan="3"></td>
                <td style="text-align: right; font-size:10px;border:1px solid">Total</td>
                <td style="text-align: center; font-size:10px;border:1px solid"><b>{{number_format($valor_t)}}</b></td>
            </tr>
        </table>
        <br>
        <p>
            <b>Observaciones:</b> <br>
            {{$data->observation}}
        </p>
        <p>
            Un Cordial saludo, <br><br>
            Departamento Comercial - TusTareas<br>
            Celular: +57 3123456789<br>
            ventas@TusTareas.com
        </p>
    </body>
</html>