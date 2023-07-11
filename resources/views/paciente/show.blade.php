@extends('layouts.app')

@section('template_title')
{{-- {{ $paciente->name ?? "{{ __('Show') Paciente" }} --}}
@endsection

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-left">
                        <span class="card-title">{{ __('Show') }} Paciente</span>
                    </div>
                    <br>
                    <div class="float-left">
                        <a class="btn btn-primary" href="{{ route('pacientes.index') }}"> {{ __('Back') }}</a>
                    </div>
                </div>

                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr class="bg-secondary">
                                    <th scope="col" colspan="7" class="text-light font-bold text-center">Personales</th>
                                </tr>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Apellido</th>
                                    <th scope="col">DNI</th>
                                    <th scope="col">Edad</th>
                                    <th scope="col">Nacimiento</th>
                                    <th scope="col">Sexo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">{{$paciente->id}}</th>
                                    <td>{{$paciente->nombre}}</td>
                                    <td>{{$paciente->apellido}}</td>
                                    <td>{{$paciente->identificacion}}</td>
                                    <td>{{$paciente->edad}}</td>
                                    <td>{{$paciente->fecha_nacimiento}}</td>
                                    <td>{{$paciente->genero}}</td>
                                </tr>
                                <tr class="bg-secondary">
                                    <th scope="col" colspan="7" class="text-light font-bold text-center">Part. 2</th>
                                </tr>
                                <tr>
                                    <th scope="col" colspan="2">Direccion</th>
                                    <th scope="col">Edad</th>
                                    <th scope="col">Telefono</th>
                                    <th scope="col">Ocupacion</th>
                                    <th scope="col" colspan="2">Email</th>
                                </tr>
                                <tr>
                                    <td colspan="2">{{$paciente->direccion}}</td>
                                    <td>{{$paciente->edad}}</td>
                                    <td>{{$paciente->telefono}}</td>
                                    <td>{{$paciente->ocupacion}}</td>
                                    <td colspan="2">{{$paciente->email}}</td>
                                </tr>
                                <tr class="bg-secondary">
                                    <th scope="col" colspan="7" class="text-light font-bold text-center">Datos medicos
                                    </th>
                                </tr>
                                <tr>
                                    <th scope="col" colspan="4">Alergias</th>
                                    <th scope="col" colspan="3">Condiciones</th>
                                </tr>
                                <tr>
                                    <td colspan="4">{{$paciente->alergias}}</td>
                                    <td colspan="3">{{$paciente->condiciones}}</td>
                                </tr>
                                <tr class="bg-secondary">
                                    <th scope="col" colspan="7" class="text-light font-bold text-center">Habitos
                                        antecedentes</th>
                                </tr>
                                <tr>
                                    <th scope="col" colspan="2">Tabaco</th>
                                    <th scope="col" colspan="2">Drogas</th>
                                    <th scope="col" colspan="2">Infusiones</th>
                                    <th scope="col">Alcohol</th>
                                </tr>
                                <tr>
                                    <td colspan="2">{{ $paciente->tabaco }}</td>
                                    <td colspan="2">{{ $paciente->drogas }}</td>
                                    <td colspan="2">{{ $paciente->infusiones }}</td>
                                    <td>{{$paciente->alcohol}}</td>
                                </tr>
                                <tr class="bg-secondary">
                                    <th scope="col" colspan="7" class="text-light font-bold text-center">Comentario</th>
                                </tr>
                                <tr>
                                    <td colspan="7" class="text-center">{{ $paciente->tabaco }}</td>
                                </tr>
                                <tr class="bg-secondary">
                                    <th scope="col" colspan="7" class="text-light font-bold text-center">Antecedentes
                                        familiares</th>
                                </tr>
                                <tr>
                                    <td colspan="7" class="text-center"> {{ $paciente->antecedentes_fam }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    @if(Auth::user()->rol == 'admin')
                    <div class="form-group row">
                        <form action="{{ route('pacientes.destroy',$paciente->id) }}" method="POST">
                            <a class="btn btn-sm btn-success col-6"
                                href="{{ route('pacientes.edit',$paciente->id) }}"><i class="fa fa-fw fa-edit"></i> {{
                                __('Edit') }}</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm bg-red-700 col-5"><i
                                    class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                        </form>
                    </div>
                    @else
                    @endif
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-left">
                        <span class="card-title">{{ __('Show') }} Historial Clínico de las Consultas</span>
                        <br>
                        <div class="float-left">
                            <a href="{{ route('historials.create',$paciente->id) }}"
                                class="btn btn-primary btn-sm float-right" data-placement="left">
                                {{ __('Create New') }}
                            </a>
                        </div>
                    </div>
                </div>
                @php
                $contador = 1;
                @endphp
                <div class="card-body">
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        @foreach ($historiales as $historial)
                        {{-- ! --}}
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapse{{ $contador }}" aria-expanded="false"
                                    aria-controls="flush-collapse{{ $contador }}">
                                    <strong
                                        style="color:darkblue">#{{$historial->id}}</strong>--{{$historial->created_at}}--{{$historial->medico->nombre}}
                                    {{$historial->medico->apellido}}, {{$historial->medico->id}}
                                </button>
                            </h2>
                            <div id="flush-collapse{{ $contador }}" class="accordion-collapse collapse"
                                aria-labelledby="flush-heading" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Sintomas</th>
                                                    <th scope="col">Tratamiento</th>
                                                    <th scope="col">Pruebas</th>
                                                    <th scope="col">Observaciones</th>
                                                    <th scope="col">Presión</th>
                                                    <th scope="col">Temperatura</th>
                                                    <th scope="col">Sat.Oxigeno</th>
                                                    <th scope="col">Aus.Pulmonar</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope="row">{{$historial->id}}</th>
                                                    <td>{{$historial->diagnostico}}</td>
                                                    <td>{{$historial->tratamiento}}</td>
                                                    <td>{{$historial->pruebas}}</td>
                                                    <td>{{$historial->observaciones}}</td>
                                                    <td>{{$historial->presion}}</td>
                                                    <td>{{$historial->temperatura}}</td>
                                                    <td>{{$historial->saturacion}}</td>
                                                    <td>{{$historial->auscultacion}}</td>
                                                </tr>
                                                <tr class="bg-secondary text-light">
                                                    <th scope="col" colspan="9" class="text-center">Consultas de
                                                        seguimiento</th>
                                                </tr>
                                                @foreach ($historial->seguimientos as $seguimiento)
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col" colspan="2">Comentario</th>
                                                    <th scope="col">Diagnostico definitivo</th>
                                                    <th scope="col" colspan="3">Resultado</th>
                                                    <th scope="col" colspan="2">Fecha</th>
                                                </tr>
                                                <tr>
                                                    <th scope="row">{{$seguimiento->id}}</th>
                                                    <td colspan="2">{{$seguimiento->comentario}}</td>
                                                    <td>{{$seguimiento->diagnostico_definitivo}}</td>
                                                    <td colspan="3">{{$seguimiento->resultado}}</td>
                                                    <td colspan="2">{{$seguimiento->created_at}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <a class="btn btn-sm btn-success col-12"
                                    href="{{ route('seguimientos.create',['historial'=>$historial->id]) }}"><i
                                        class="fa fa-fw fa-edit"></i> {{ __('Seguimiento') }}</a>
                            </div>
                        </div>
                        @php
                        $contador++;
                        @endphp
                        @endforeach
                        {{-- ! --}}
                    </div>
                </div>

            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-left">
                        <span class="card-title">{{ __('Show') }} Receta</span>
                        <br>
                        <div class="float-left">
                            <a href="{{ route('recetas.create',$paciente->id) }}"
                                class="btn btn-primary btn-sm float-right" data-placement="left">
                                {{ __('Create New') }}
                            </a>
                        </div>
                    </div>
                </div>
                @php
                $contadorreceta = 459;
                @endphp
                <div class="card-body">
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        @foreach ($recetas as $receta)
                        {{-- ! --}}
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseres{{ $contadorreceta }}" aria-expanded="false"
                                    aria-controls="flush-collapseres{{ $contadorreceta }}">
                                    <strong
                                        style="color:darkblue">#{{$receta->id}}</strong>--{{$receta->created_at}}--{{$receta->medico->nombre}}
                                    {{$receta->medico->apellido}}, {{$receta->medico->id}}
                                </button>
                            </h2>
                            <div id="flush-collapseres{{ $contadorreceta }}" class="accordion-collapse collapse"
                                aria-labelledby="flush-heading" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Medicamento</th>
                                                    <th scope="col">Cantidad</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($receta->medicamentos as $medicamento)
                                                <tr>
                                                    <th scope="row">{{ $medicamento->id }}</th>
                                                    <td>{{ $medicamento->nombre }}</td>
                                                    <td>{{$medicamento->pivot->cantidad}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @php
                        $contadorreceta++;
                        @endphp
                        @endforeach
                        {{-- ! --}}
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection
