@extends('boards/b_root')

@section('title','Root')

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
                        <div style="text-align: center;"> <i class="fa fa-fw fa-user fa-1g"></i>Perfil Root </div>
                    </h1>
                </div>
            </div>
<!-- /.row -->

{!! Form::open(['route'=>['root.profile.update',Auth::user()], 'method' => 'PUT']) !!}

<div class="form-group row">
	<div class="col-md-3"></div>
	<div class="col-md-2">
		<h4>{!! Form::label('Tipo de Documento') !!}</h4>
	</div>
	<div class="col-md-4">
		{!! Form::select('tipoDocumento',['CC','TI','NIT','Pasaporte'],Auth::user()->tipoDocumento,['class' => 'form-control']) !!}
	</div>
</div>

<div class="form-group row">
	<div class="col-md-3"></div>
	<div class="col-md-2">
		<h4>{!! Form::label('Número Documento') !!}</h4>
	</div>
	<div class="col-md-4">
		{!! Form::text('id',Auth::user()->id,['class' => 'form-control', 'required'=>'required']) !!}
	</div>
</div>

<div class="form-group row">
	<div class="col-md-3"></div>
	<div class="col-md-2">
		<h4>{!! Form::label('Nombre') !!}</h4>
	</div>
	<div class="col-md-4">
		{!! Form::text('nombre',Auth::user()->nombre,['class' => 'form-control', 'required'=>'required']) !!}
	</div>
</div>

<div class="form-group row">
	<div class="col-md-3"></div>
	<div class="col-md-2">
		<h4>{!! Form::label('Apellido') !!}</h4>
	</div>
	<div class="col-md-4">
		{!! Form::text('apellido',Auth::user()->apellido,['class' => 'form-control', 'required'=>'required']) !!}
	</div>
</div>

<div class="form-group row">
	<div class="col-md-3"></div>
	<div class="col-md-2">
		<h4>{!! Form::label('Fecha de nacimiento') !!}</h4>
	</div>
	<div class="col-md-1">
		{!! Form::text('fechaNacimiento',Auth::user()->fechaNacimiento,['class' => 'form-control', 'required'=>'required']) !!}
	</div>
	<div class="col-md-1">
		<h4>{!! Form::label('Genero') !!}</h4>
	</div>
	<div class="col-md-2">
		{!! Form::select('genero', ['M' => 'Masculino', 'F' => 'Femenino'],Auth::user()->genero,['class' => 'form-control']) !!}
	</div>
</div>

<div class="form-group row">
	<div class="col-md-3"></div>
	<div class="col-md-2">
		<h4>{!! Form::label('Teléfono') !!}</h4>
	</div>
	<div class="col-md-4">
		{!! Form::text('telefono',Auth::user()->telefono,['class' => 'form-control', 'required'=>'required']) !!}
	</div>
</div>

<div class="form-group row">
	<div class="col-md-3"></div>
	<div class="col-md-2">
		<h4>{!! Form::label('Correo electrónico') !!}</h4>
	</div>
	<div class="col-md-4">
		{!! Form::text('email',Auth::user()->email,['class' => 'form-control', 'required'=>'required']) !!}
	</div>
</div>

<div class="form-group row">
	<div class="col-md-3"></div>
	<div class="col-md-2">
		<h4>{!! Form::label('Institución') !!}</h4>
	</div>
	<div class="col-md-4">
		{!! Form::select('institucion_codigoInstitucion',$Instituciones, Auth::user()->institucion_codigoInstitucion ,['class' => 'form-control']) !!}
	</div>
</div>

<div class="form-group buttonHolder">
	{!! Form::submit('Modificar',['class' => 'btn btn-success', 'align' => 'center']) !!}
</div>

	{!! Form::close() !!}


@endsection