@extends('board_layout')

@section('style')
@parent
<style type="text/css">
    body { background: white !important;  } /* Adding !important forces the browser to overwrite the default style applied by Bootstrap */
    .top-nav { background: white !important;  }
    .navbar { background: white !important;  }
    .side-nav { background: white !important;  }
</style>
@stop



@section('sidebar_menu')
@parent
<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
<div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav">
        <li>
            <a href="{{route('psychologist.profile')}}"><i class="fa fa-fw fa-desktop fa-lg" aria-hidden="true"></i> ESCRITORIO</a>
        </li>
        <li>
            <a href="{{route('psychologist.groups.index')}}"><i class="fa fa-fw fa-users fa-lg" aria-hidden="true"></i> GRUPOS</a>
        </li>
        <li>
            <a href="{{route('psychologist.users.index')}}"><i class="fa fa-male fa-lg" aria-hidden="true"></i><i class="fa fa-female fa-lg"
                                                                              aria-hidden="true"></i> USUARIOS</a>
        </li>
        <li>
            <a href="#"><i class="fa fa-fw fa-file-text-o fa-lg" aria-hidden="true"></i> TEST</a>
        </li>

    </ul>
</div>
<!-- /.navbar-collapse -->
@stop
