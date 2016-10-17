@extends('boards/b_admin')

@section('title','Plataforma PTTI - Modificar Grupos')

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
                        <div style="text-align: center;"> <i class="fa fa-fw fa-cog fa-1g"></i>Modificar Grupo</div>
                    </h1>
                </div>
            </div>
    
    @include('partials.errors')

    {!! Form::open(['route'=>['admin.groups.update',$grupo], 'method' => 'PUT']) !!}

    <div class="form-group">
        {!! Form::label('Código Grupo') !!}
        {!! Form::text('codigoGrupo',$grupo->codigoGrupo,['class' => 'form-control', 'required'=>'required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Clasificación') !!}
        {!! Form::text('clasificacion',$grupo->clasificacion,['class' => 'form-control', 'required'=>'required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Jornada') !!}
        {!! Form::select('jornada',['Mañana'=>'Mañana','Tarde'=>'Tarde','Noche'=>'Noche'],$grupo->jornada,['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Grado') !!}
        {!! Form::text('grado',$grupo->grado,['class' => 'form-control', 'required'=>'required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Institución') !!}
        {!! Form::select('institucion_codigoInstitucion',$Instituciones,$grupo->institucion_codigoInstitucion,['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Modificar',['class' => 'btn btn-success']) !!}
    </div>

    {!! Form::close() !!}

@endsection