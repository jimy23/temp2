<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Plataforma PTTI</title>

    <!-- Bootstrap Core CSS-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <link rel="stylesheet prefetch" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

    <link rel="stylesheet prefetch" href="{{asset('js/tablas.css')}}">

    @section('style')

    @show

    <!-- Custom CSS -->
    <link rel="stylesheet" href="https://blackrockdigital.github.io/startbootstrap-sb-admin/css/sb-admin.css"/>

    <!-- Morris Charts CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css"
          integrity="sha256-szHusaozbQctTn4FX+3l5E0A5zoxz7+ne4fr8NgWJlw=" crossorigin="anonymous"/>

    <!-- Custom Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css"
          integrity="sha256-AIodEDkC8V/bHBkfyxzolUMw57jeQ9CauwhVW6YJ9CA=" crossorigin="anonymous"/>



    <style>
        .buttonHolder{ text-align: center; }
    </style>
</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">PTTI</a>
        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> @yield('content_user')
                    <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="{{url('home')}}"><i class="fa fa-fw fa-user"></i> Profile</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="{{url('auth/logout')}}"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        @section('sidebar_menu')
        @show
        <!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <!--<h1 class="page-header">
                        <div style="text-align: center;"> <i class="fa fa-fw fa-user fa-1g"></i>Perfil Administrador </div>
                    </h1>
                    <ol class="breadcrumb">
                        <li class="active">

                        </li>
                    </ol>-->
                    @include('flash::message')
                    @yield('content')
                </div>
            </div>
            <!-- /.row -->

        </div>

        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->

    <!--<div class="section superior" id="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <a href="#"><img src="http://media.utp.edu.co/img/optimized/ministerioeducacion.png" class="displayed"></a>
                </div>
                <div class="col-md-4">
                    <a href="#"><img src="http://media.utp.edu.co/img/optimized/marca_UTP.png" class="displayed"></a>
                </div>
            </div>
        </div>
    </div>-->

</div>


<div class="icon-bar" >
    <h1>
        <div style="text-align: center;">
            <a href="http://www.mineducacion.gov.co/1621/w3-channel.html" title="Ministerio de Educacion"
               target="_blank">
                <img src="http://media.utp.edu.co/img/optimized/ministerioeducacion.png" class="displayed">
            </a>
            <a href="http://www.utp.edu.co" title="Universidad Tecnológica de Pereira" target="_blank">
                <img src="http://media.utp.edu.co/img/optimized/marca_UTP.png"
                     alt="Escudo Universidad Tecnologica de Pereira" class="displayed">

            </a>
        </div>
    </h1>
</div>
<!-- /#wrapper -->



<!-- jQuery -->
<script src="https://blackrockdigital.github.io/startbootstrap-sb-admin/js/jquery.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="{{asset('js/form-control.js')}}"></script>


<!-- Bootstrap Core JavaScript-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>

<!-- Morris Charts JavaScript -->
<script src="https://blackrockdigital.github.io/startbootstrap-sb-admin/js/plugins/morris/raphael.min.js"></script>
<script src="https://blackrockdigital.github.io/startbootstrap-sb-admin/js/plugins/morris/morris.min.js"></script>
<script src="https://blackrockdigital.github.io/startbootstrap-sb-admin/js/plugins/morris/morris-data.js"></script>
{!! Html::script('js/dropdown_users.js') !!}

</body>

</html>
