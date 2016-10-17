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
                        <div style="text-align: center;"> <i class="fa fa-fw fa-cog fa-1g"></i>Modificar Institución</div>
                    </h1>
                </div>
            </div>

	{!! Form::open(['route'=>['admin.institutions.update',$institucion], 'method' => 'PUT']) !!}

	<div class="form-group">
		{!! Form::label('Código Institución') !!}
		{!! Form::text('codigoInstitucion',$institucion->codigoInstitucion,['class' => 'form-control', 'required'=>'required']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('Nombre') !!}
		{!! Form::text('direccion',$institucion->direccion,['class' => 'form-control','required'=>'required']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('Teléfono') !!}
		{!! Form::text('telefono',$institucion->telefono,['class' => 'form-control', 'required'=>'required']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('Sitio Web') !!}
		{!! Form::text('sitioWeb',$institucion->sitioWeb,['class' => 'form-control', 'required'=>'required']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('Ciudad') !!}
		{!! Form::text('ciudad',$institucion->ciudad,['class' => 'form-control', 'required'=>'required']) !!}
	</div>
	
	<div class="form-group">
		{!! Form::submit('Modificar',['class' => 'btn btn-success']) !!}
	</div>

	{!! Form::close() !!}

@endsection