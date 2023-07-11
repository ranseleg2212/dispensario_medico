@extends('layouts.app')

@section('template_title')
    Paciente
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Paciente') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('pacientes.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

										<th>Nombre</th>
										<th>Apellido</th>
										<th>DNI</th>
										<th>Nacimiento</th>
										<th>Genero</th>
										<th>Direccion</th>
										<th>Telefono</th>
										<th>Email</th>
										<th>Alergias</th>
										<th>Condiciones</th>
                                    </tr>
                                </thead>
                                <tbody >
                                    @foreach ($pacientes as $paciente)
                                        <tr>
                                            <td>{{ ++$i }}</td>
											<td><a href="{{ route('pacientes.show',$paciente->id) }}" style="text-decoration: none">{{ $paciente->nombre }}</a></td>
											<td>{{ $paciente->apellido }}</td>
											<td>{{ $paciente->identificacion }}</td>
											<td>{{ $paciente->fecha_nacimiento }}</td>
											<td>{{ $paciente->genero }}</td>
											<td>{{ $paciente->direccion }}</td>
											<td>{{ $paciente->telefono }}</td>
											<td>{{ $paciente->email }}</td>
											<td>{{ $paciente->alergias }}</td>
											<td>{{ $paciente->condiciones }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $pacientes->links() !!}
            </div>
        </div>
    </div>
@endsection
