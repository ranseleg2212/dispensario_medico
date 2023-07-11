@extends('layouts.app')

@section('template_title')
    Medicamento
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Medicamento') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('medicamentos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                    @if (session('query'))
    <pre>{{ session('query') }}</pre>
@endif


                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

										<th>Nombre</th>
										<th>Cantidad</th>
										<th>Precio Compra</th>
										<th>Precio Venta</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($medicamentos as $medicamento)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $medicamento->nombre }}</td>
											<td>{{ $medicamento->cantidad }}</td>
											<td>RD${{ number_format($medicamento->precio_compra,2) }}</td>
											<td>RD${{ number_format($medicamento->precio_venta,2) }}</td>

                                            <td>
                                                <form action="{{ route('medicamentos.destroy',$medicamento->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('medicamentos.show',$medicamento->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('medicamentos.edit',$medicamento->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $medicamentos->links() !!}
            </div>
        </div>
    </div>
@endsection
