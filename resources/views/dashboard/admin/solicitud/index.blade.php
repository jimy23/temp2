@extends('boards/b_admin')

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
                        <div style="text-align: center;"> <i class="fa fa-fw fa-list-ol fa-1g"></i>Solicitudes </div>
                    </h1>
                </div>
            </div>

<hr>

<table class="table table-striped responsive">
    <thead>
        <th>Solicitud</th>
        <th>Opciones</th>
    </thead>
    <tbody>
        @foreach($solicitudes as $solicitud)
            <tr>
                <td>{{ $solicitud->email}}</td>

                <td>
                    <a href="{{ route('admin.solicitudes.create',$solicitud->id) }}" class="btn btn-primary"><span class="glyphicon glyphicon-check" aria-hidden="true"></span></a>
                    <a href="{{ route('admin.solicitudes.destroy',$solicitud->id) }}" onclick="return confirm('¿Seguro que deseas cancelar la solicitud?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
{!!$solicitudes->render() !!}

@endsection