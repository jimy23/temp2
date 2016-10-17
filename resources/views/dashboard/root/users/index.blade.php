@extends('boards/b_root')

@section('content_user')
    @if (Auth::check())
        {{ Auth::user()->nombre}}
    @else
        Nada
    @endif
@endsection

@section('content')

    <div class="row">
        <h1 class="page-header">Usuarios</h1>
    </div>
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
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Doc.</th>
                        <th>Fecha Nacimiento</th>
                        <th>Telefono</th>
                        <th>Institución</th>
                        <th>Grupo</th>
                        <th>Tipo de Usuario</th>
                    </tr>
                    <tr class="warning no-result">
                        <td colspan="11"><i class="fa fa-warning"></i> No result</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $usuario)
                        <tr>
                            <td scope="row">{{$usuario->id}}</td>
                            <td>{{$usuario->nombre}} {{$usuario->apellido}}</td>
                            <td>{{$usuario->email}}</td>
                            <td>{{$usuario->tipoDocumento}}</td>
                            <td>{{$usuario->fechaNacimiento}}</td>
                            <td>{{$usuario->telefono}}</td>
                            <?php $inst = \App\Models\Institucion::where('codigoInstitucion', $usuario->institucion_codigoInstitucion)->first(); ?>
                            <td>{{$inst['nombre']}}</td>
                            <?php
                                $grupo = \App\Models\Grupo::where('institucion_codigoInstitucion', $inst['codigoInstitucion'])
                                        ->where('codigoGrupo', $usuario->grupo_codigoGrupo)
                                        ->get();
                            ?>
                            <td>{{$grupo[0]->codigoGrupo}}</td>
                            <?php
                                $tipo_usuarios = \App\Models\Tipousuario::where('codigoTipoUsuario', $usuario->tipoUsuario_codigoTipoUsuario)->get();
                            ?>
                            <td>{{$tipo_usuarios[0]->nombre}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {!!$users->render() !!}
            </div>
        </div>
    </div>
    </div>
    </div>


    {!! Html::script('js/jquery-1.12.3.js') !!}
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
@endsection