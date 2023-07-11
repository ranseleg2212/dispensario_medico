@extends('layouts.app')

@section('template_title')
{{-- {{ $receta->name ?? "{{ __('Show') Receta" }} --}}
@endsection

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-left">
                        <span class="card-title">{{ __('Show') }} Receta</span>
                    </div>
                    <div class="float-right">
                        <a class="btn btn-primary" href="{{ route('recetas.index') }}"> {{ __('Back') }}</a>
                    </div>
                </div>

                <div class="card-body">

                    <div class="form-group">
                        <strong>Paciente:</strong>
                        {{ $receta->paciente_id }}, {{$receta->paciente->nombre}} {{$receta->paciente->apellido}}
                    </div>
                    <div class="form-group">
                        <strong>Medico:</strong>
                        {{ $receta->medico_id }}, {{$receta->medico->nombre}} {{$receta->medico->apellido}}
                    </div>
                    <div class="form-group">
                        <strong>Descripcion:</strong>
                        {{ $receta->descripcion }}
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
                        <span class="card-title">{{ __('Show') }} Medicamentos</span>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Cantidad</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($receta->medicamentos as $medicamento)
                                <tr>
                                    <th scope="row">{{$medicamento->id}}</th>
                                    <td>{{$medicamento->nombre}}</td>
                                    <td>{{ $medicamento->pivot->cantidad }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
