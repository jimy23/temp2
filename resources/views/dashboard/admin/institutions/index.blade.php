@extends('boards/b_admin')

@section('content_user')
    @if (Auth::check())
        {{ Auth::user()->nombre}}
    @else
        Nada
    @endif
@endsection

@section('content')

    <div class="row">
        <h1 class="page-header">Gestión de instituciones</h1>
    </div>
    <p>
        <a class="btn btn-primary" href="{{route('admin.institutions.create')}}">Añadir Institucion</a>
    </p>
    <div class="row">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="table-responsive">
                        <div class="form-group pull-right">
                            <input type="text" class="search form-control" placeholder="What you looking for?">
                        </div>
                        <span class="counter pull-right"></span>
                        <table class="table table-bordered table-hover table-striped results">
                            <thead>
                            <tr>
                                <th>NIT</th>
                                <th>Nombre</th>
                                <th>Direccion</th>
                                <th>telefono</th>
                                <th>Sitio web</th>
                                <th>Ciudad</th>
                                <th>Opciones</th>
                            </tr>
                            <tr class="warning no-result">
                                <td colspan="6"><i class="fa fa-warning"></i> No result</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($instituciones as $institucion)
                                <tr>
                                    <th scope="row">{{$institucion->codigoInstitucion}}</th>
                                    <td>{{$institucion->nombre}}</td>
                                    <td>{{$institucion->direccion}}</td>
                                    <td>{{$institucion->telefono}}</td>
                                    <td>{{$institucion->sitioWeb}}</td>
                                    <td>{{$institucion->ciudad}}</td>
                                    <td>
                                        <a href="{{ route('admin.institutions.edit',$institucion->codigoInstitucion) }}" class="btn btn-primary"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span></a>
                                        <a href="{{ route('admin.institutions.destroy',$institucion->codigoInstitucion) }}" onclick="return confirm('¿Seguro que deseas eliminarla?')" class="btn btn-danger"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {!!$instituciones->render() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection