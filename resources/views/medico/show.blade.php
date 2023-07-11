@extends('layouts.app')

@section('template_title')
{{-- {{ $medico->nombre }} --}}
@endsection

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-left">
                        <span class="card-title">{{ __('Show') }} Medico</span>
                    </div>
                    <div class="float-right">
                        <a class="btn btn-primary" href="{{ route('medicos.index') }}"> {{ __('Back') }}</a>
                    </div>
                </div>

                <div class="card-body">

                    <div class="form-group">
                        <strong>Nombre:</strong>
                        {{ $medico->nombre }}
                    </div>
                    <div class="form-group">
                        <strong>Apellido:</strong>
                        {{ $medico->apellido }}
                    </div>
                    <div class="form-group">
                        <strong>Identificacion:</strong>
                        {{ $medico->identificacion }}
                    </div>
                    <div class="form-group">
                        <strong>Especialidad:</strong>
                        {{ $medico->especialidad }}
                    </div>
                    <div class="form-group">
                        <strong>Direccion:</strong>
                        {{ $medico->direccion }}
                    </div>
                    <div class="form-group">
                        <strong>Telefono:</strong>
                        {{ $medico->telefono }}
                    </div>
                    <div class="form-group">
                        <strong>Email:</strong>
                        {{ $medico->email }}
                    </div>
                    <div class="form-group">
                        <strong>Usuario:</strong>
                        {{ $medico->user->id }} - {{$medico->user->name}} - {{$medico->user->email}} - {{$medico->user->rol}}
                    </div>
                    @if(Auth::user()->rol == 'admin')
                    <div class="form-group"><form action="{{ route('medicos.destroy',$medico->id) }}" method="POST">
                        <a class="btn btn-sm btn-success" href="{{ route('medicos.edit',$medico->id) }}"><i
                                class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{
                            __('Delete') }}</button>
                    </form>
                </div>
                @else

                @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
