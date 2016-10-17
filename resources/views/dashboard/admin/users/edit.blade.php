@extends('boards/b_admin')

@section('title','Plataforma PTTI - Modificar Usuario')

@section('content_user')
    @if (Auth::check())
        {{ Auth::user()->nombre}}
    @else
        Nada
    @endif
@endsection

@section('content')
<!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        <div style="text-align: center;"> <i class="fa fa-fw fa-cog fa-1g"></i>Modificar Usuario</div>
                    </h1>
                </div>
            </div>

    {!! Form::open(['route'=>['admin.users.update',$user], 'method' => 'PUT']) !!}

    <div class="form-group">
        {!! Form::label('Número Documento') !!}
        {!! Form::text('id',$user->id,['class' => 'form-control', 'required'=>'required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Tipo de Documento') !!}
        {!! Form::select('tipoDocumento',['CC','TI','NIT','Pasaporte'],$user->tipoDocumento,['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Nombre') !!}
        {!! Form::text('nombre',$user->nombre,['class' => 'form-control', 'required'=>'required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Apellido') !!}
        {!! Form::text('apellido',$user->apellido,['class' => 'form-control', 'required'=>'required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Correo electrónico') !!}
        {!! Form::text('email',$user->email,['class' => 'form-control', 'required'=>'required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Fecha de nacimiento') !!}
        {!! Form::text('fechaNacimiento',$user->fechaNacimiento,['class' => 'form-control', 'required'=>'required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Genero') !!}
        {!! Form::select('genero', ['M' => 'Masculino', 'F' => 'Femenino'],$user->genero,['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Teléfono') !!}
        {!! Form::text('telefono',$user->telefono,['class' => 'form-control', 'required'=>'required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Tipo de Usuario') !!}
        {!! Form::select('tipoUsuario_codigoTipoUsuario',$tiposUsuario, $user->tipoUsuario_codigoTipoUsuario ,['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Institución') !!}
        {!! Form::select('institucion_codigoInstitucion',$Instituciones, $user->institucion_codigoInstitucion ,['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Grupo') !!}
        {!! Form::select('grupo_codigoGrupon',$grupos, $user->grupo_codigoGrupo ,['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Modificar',['class' => 'btn btn-success']) !!}
    </div>

    {!! Form::close() !!}

@endsection