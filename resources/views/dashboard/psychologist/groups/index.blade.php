@extends('boards/b_psicologo')

@section('content_user')
    @if (Auth::check())
        {{ Auth::user()->nombre}}
    @else
        Nada
    @endif
@endsection

@section('content')

    <div class="row">
        <h1 class="page-header">Grupos</h1>
    </div>

    <div class="row">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="table-responsive">
                        <div class="form-group pull-right">
                            <input type="text" class="search form-control" placeholder="What you looking for?">
                        </div>
                        <span class="counter pull-right"></span>
                        <table class="table table-hover table-bordered table-striped results">
                            <thead>
                            <tr>
                                <th>Codigo</th>
                                <th>Clasificacion</th>
                                <th>Jornada</th>
                                <th>Grado</th>
                                <th>Institucion</th>
                            </tr>
                            <tr class="warning no-result">
                                <td colspan="6"><i class="fa fa-warning"></i> No result</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($grupos as $grupo)
                                <tr>
                                    <th scope="row">{{$grupo->codigoGrupo}}</th>
                                    <td>{{$grupo->clasificacion}}</td>
                                    <td>{{$grupo->jornada}}</td>
                                    <td>{{$grupo->grado}}</td>
                                    <td>{{$grupo->institucion_codigoInstitucion}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {!!$grupos->render() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection